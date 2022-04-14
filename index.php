<?php
use Websealevel\TimeTable\Models\Day_Timetable;
use Websealevel\TimeTable\Models\Unit_Timetable;
use func Websealevel\TimeTable\format_day_timetable;
use func Websealevel\TimeTable\show_time_table;

// $start = new DateTimeImmutable('8:0');
// $end = new DateTimeImmutable('12:0');
// var_dump($start->format('H:i'));
// var_dump($end->format('H:i'));


//Tests

var_dump(format_day_timetable(day: new Day_Timetable(), format_unit_time_table: 'wsl_format_Unit_Timetable'));
var_dump(format_Unit_Timetable(new Unit_Timetable(new DateTimeImmutable('7:0'), new DateTimeImmutable('12:0'))));

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
		)
	),
);



var_dump(show_time_table($time_table));
