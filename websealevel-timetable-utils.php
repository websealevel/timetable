<?php

namespace Websealevel\TimeTable;

use Websealevel\TimeTable\Models\Unit_Timetable;
use Websealevel\TimeTable\Models\Day_Timetable;

/**
 * Retourne l'horaire jour formaté
 *
 * @param Day_Timetable $day L'horaire de journée à formatter
 * @param string $am_pm Formater le DateTime du matin ('am'), de l'apres-midi ('am') ou les deux ('am_pm').
 * @param string $format Format du DateTime.
 * @param string $separator_am_pm Optional Le séparateur entre l'horaire unitaire du matin et de l'après-midi, si $start_end est égal à 'start_end'.
 * @param string $separator_start_end Optional Le séparateur entre le début et la fin si $start_end est égal à 'start_end'.
 * @param callable $format_unit_time_table Une fonction pour formater un Unit_Timetable
 * @return string
 */
function format_day_timetable(Day_Timetable $day = new Day_Timetable(), callable $format_unit_time_table, string $am_pm = 'am_pm', string $format = 'H:i', string $separator_am_pm = ' ', string $separator_start_end = '-',): string|array
{
    return match ($am_pm) {

        'am' => $format_unit_time_table(time_table: $day->am, format: $format, separator: $separator_start_end),

        'pm' => $format_unit_time_table(time_table: $day->pm, format: $format, separator: $separator_start_end),

        'am_pm' => array(
            'am' => $format_unit_time_table(time_table: $day->am, format: $format),
            'pm' => $format_unit_time_table(time_table: $day->pm, format: $format),
            'separator' => $separator_am_pm
        ),
        default => 'Not found'
    };
}


/**
 * Retourne l'horaire unitaire formaté
 *
 * @param Unit_Timetable l'horaire à formater
 * @param string $start_end Formater le DateTime du matin ('am'), de l'apres-midi ('am') ou les deux ('am_pm').
 * @param string $format Format du DateTime.
 * @param string $separator Optional Le séparateur entre l'horaire unitaire du matin et de l'après-midi, si $start_end est égal à 'start_end'.
 * @return string
 */
function format_Unit_Timetable(Unit_Timetable $time_table = new Unit_Timetable(), string $start_end = 'start_end', string $format = 'H:i', string $separator = '-')
{

    return match ($start_end) {
        'start' => $time_table->start->format($format),
        'end' => $time_table->end->format($format),
        'start_end' => $time_table->start->format($format) . ' ' . $separator . ' ' . $time_table->end->format($format),
        default => 'Not found'
    };
}

/**
 * Retourne un tableau des horaires formaté
 * @param Day_Timetable[] $timeTable
 */
function show_time_table(array $timeTable = array())
{

    $result = array();

    foreach ($timeTable as $day) {
        $result[$day->label] = format_day_timetable($day, 'wsl_format_Unit_Timetable');
    }

    return $result;
}
