<?php

// $start = new DateTimeImmutable('8:0');
// $end = new DateTimeImmutable('12:0');
// var_dump($start->format('H:i'));
// var_dump($end->format('H:i'));


namespace Websealevel\TimeTable;

/**
 * Modéle d'un horaire unitaire (début - fin)
 */
class Unit_Timetable {
    /**
	 * Constructeur.
	 *
	 * @param DateTimeImmutable $start Horaire du début.
	 * @param DateTimeImmutable $end Horaire de fin.
	 */
	public function __construct(
		public DateTimeImmutable $start = new DateTimeImmutable(),
		public DateTimeImmutable $end = new DateTimeImmutable()
	) {}
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
function wsl_format_Unit_Timetable(Unit_Timetable $time_table = new Day_Timetable(), string $start_end = 'start_end', string $format = 'H:i', string $separator = '-' ){

	return match($start_end){
		'start' => $time_table->start->format($format),
		'end' => $time_table->end->format($format),
		'start_end' => $time_table->start->format($format) . ' ' . $separator . ' ' . $time_table->end->format($format),
		default => 'Not found'
	};
}


var_dump(wsl_format_Unit_Timetable(new Unit_Timetable(new DateTimeImmutable('7:0'), new DateTimeImmutable('12:0'))));

/**
 * Modèle d'un horaire d'une journée (Horaire unitaire matin, Horaire unitaire après-midi)
 */
class Day_Timetable {
	/**
	 * Constructeur.
	 *
	 * @param string $label Un label pour identifier la journée (par ex 'lundi')
	 * @param Unit_Timetable $am Horaire du matin.
	 * @param Unit_Timetable $pm Horaire de l'apres midi.
	 */
	public function __construct(
		readonly public string $label = '', 
		readonly public Unit_Timetable $am = new Unit_Timetable(),
		readonly public Unit_Timetable $pm = new Unit_Timetable()
	) {}
}


	/**
	 * Retourne l'horaire formaté
	 *
	 * @param Day_Timetable $day L'horaire de journée à formatter
	 * @param string $am_pm Formater le DateTime du matin ('am'), de l'apres-midi ('am') ou les deux ('am_pm').
	 * @param string $format Format du DateTime.
	 * @param string $separator_am_pm Optional Le séparateur entre l'horaire unitaire du matin et de l'après-midi, si $start_end est égal à 'start_end'.
	 * @param string $separator_start_end Optional Le séparateur entre le début et la fin si $start_end est égal à 'start_end'.
	 * @param callable $format_unit_time_table Une fonction pour formater un Unit_Timetable
	 * @return string
	 */
	 function wsl_format_day_timetable(Day_Timetable $day = new Day_Timetable(), callable $format_unit_time_table, string $am_pm = 'am_pm', string $format = 'H:i', string $separator_am_pm = ' ', string $separator_start_end = '-',  ): string|array {


		return match ($am_pm) {

			'am' => $format_unit_time_table(time_table: $day->am, format: $format, separator:$separator_start_end ),

			'pm' => $format_unit_time_table(time_table: $day->pm, format: $format, separator:$separator_start_end ),

			'am_pm' => array( 
                'am' => $format_unit_time_table(time_table: $day->am, format: $format),
                'pm' => $format_unit_time_table(time_table: $day->pm, format: $format),
                'separator' => $separator_am_pm
            ), 
            default => 'Not found'
		};
	}

	var_dump(wsl_format_day_timetable(day: new Day_Timetable(), format_unit_time_table: 'wsl_format_Unit_Timetable'));



$time_table = array(
	new Day_Timetable(
		'lundi', 
		new Unit_Timetable(
			new DateTimeImmutable('8:0'), 
			new DateTimeImmutable('12:0')
		),
		new Unit_Timetable(
			new DateTimeImmutable('13:30'), 
			new DateTimeImmutable('17:0')
		)),
);

/**
 * Retourne un tableau des horaires formatés
 * @param Day_Timetable[] $timeTable
 */
function show_time_table(array $timeTable = array()){

	$result = array();

	foreach($timeTable as $day){
		$result[$day->label] = wsl_format_day_timetable($day, 'wsl_format_Unit_Timetable');
	}

	return $result;
}

var_dump(show_time_table($time_table));