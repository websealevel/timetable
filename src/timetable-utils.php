<?php

namespace Websealevel\TimeTable;


use Websealevel\TimeTable\Models\UnitTimetable;
use Websealevel\TimeTable\Models\DayTimetable;


/**
 * Retourne l'horaire unitaire formaté
 *
 * @param UnitTimetable l'horaire à formater
 * @param string $start_end Formater le DateTime du matin ('am'), de l'apres-midi ('am') ou les deux ('am_pm').
 * @param string $format Format du DateTime.
 * @param string $separator Optional Le séparateur entre l'horaire unitaire du matin et de l'après-midi, si $start_end est égal à 'start_end'.
 * @return string
 */
function format_UnitTimetable(UnitTimetable $time_table = new UnitTimetable(), string $start_end = 'start_end', string $format = 'H:i', string $separator = '-'): string
{

    return match ($start_end) {
        'start' => $time_table->start->format($format),
        'end' => $time_table->end->format($format),
        'start_end' => $time_table->start->format($format) . ' ' . $separator . ' ' . $time_table->end->format($format),
        default => 'Not found'
    };
}

/**
 * Retourne l'horaire jour formaté
 *
 * @param DayTimetable $day L'horaire de journée à formatter
 * @param string $am_pm Formater le DateTime du matin ('am'), de l'apres-midi ('am') ou les deux ('am_pm').
 * @param string $format Format du DateTime.
 * @param string $separator_am_pm Optional Le séparateur entre l'horaire unitaire du matin et de l'après-midi, si $start_end est égal à 'start_end'.
 * @param string $separator_start_end Optional Le séparateur entre le début et la fin si $start_end est égal à 'start_end'.
 * @param string $formater_unit_time_table Une fonction pour formater un UnitTimetable
 * @return string
 */
function format_DayTimetable(DayTimetable $day = new DayTimetable(), string $formater_unit_time_table = __NAMESPACE__ . '\format_UnitTimetable', string $am_pm = 'am_pm', string $format = 'H:i', string $separator_am_pm = ' ', string $separator_start_end = '-',): string|array
{

    if ($day->is_off)
        return 'Fermé';

    return match ($am_pm) {

        'am' => call_user_func($formater_unit_time_table, time_table: $day->am, format: $format, separator: $separator_start_end),
        'pm' => call_user_func($formater_unit_time_table, time_table: $day->pm, format: $format, separator: $separator_start_end),
        'am_pm' => array(
            'am' => call_user_func($formater_unit_time_table, time_table: $day->am, format: $format, separator: $separator_start_end),
            'pm' => call_user_func($formater_unit_time_table, time_table: $day->pm, format: $format, separator: $separator_start_end),
            'separator' => $separator_am_pm
        ),
        default => 'Not found'
    };
}

/**
 * Retourne un tableau des horaires formaté
 * @param DayTimetable[] $timeTable
 */
function show_time_table(array $timeTable = array())
{

    $result = array();

    foreach ($timeTable as $day) {
        $result[$day->label] = format_DayTimetable($day, __NAMESPACE__ . '\format_UnitTimetable');
    }

    return $result;
}
