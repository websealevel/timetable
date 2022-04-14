<?php

include './websealevel-timetable-utils.php';

use Websealevel\TimeTable\Models\Day_Timetable;
use Websealevel\TimeTable\Models\Unit_Timetable;

use function Websealevel\TimeTable\format_day_timetable;
use function Websealevel\TimeTable\format_unit_timetable;
use function Websealevel\TimeTable\show_time_table;

// $start = new DateTimeImmutable('8:0');
// $end = new DateTimeImmutable('12:0');
// var_dump($start->format('H:i'));
// var_dump($end->format('H:i'));

//Tests

$time_table = array(
	new Day_Timetable(
		'lundi',
		'8:0',
		'12:0',
		'13:30',
		'17:0'
	),
	new Day_Timetable(
		'mardi',
		'8:0',
		'12:0',
		'13:30',
		'17:0'
	),
	new Day_Timetable(
		'mercredi',
		'8:0',
		'12:0',
		'13:30',
		'17:0'
	),
	new Day_Timetable(
		'jeudi',
		'8:0',
		'12:0',
		'13:30',
		'17:0'
	),
	new Day_Timetable(
		'vendredi',
		'8:0',
		'12:0',
		'13:30',
		'17:0'
	),
	new Day_Timetable(
		'samedi',
		'8:0',
		'12:0',
		'13:30',
		'17:0'
	),
	new Day_Timetable(
		'dimanche',
		'8:0',
		'12:0',
		'13:30',
		'17:0'
	),
);



var_dump(show_time_table($time_table));
