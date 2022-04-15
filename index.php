<?php

use Websealevel\TimeTable\Models\Day_Timetable;
use function Websealevel\TimeTable\show_time_table;

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
		is_off: true
	),
	new Day_Timetable(
		'dimanche',
		is_off: true
	),
);


var_dump(show_time_table($time_table));
