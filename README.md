# timetable

This package provides a simple implementation of timetables. It provides three additional functions to format the timetables to display in your web application.

## Installation

Install this package with `composer`. It requires no other package.

~~~bash
compose require websealevel/timetable
~~~

## Description

The timetable package provides two simple models

- `Unit_Timetable`, which is simply a pair of DateTimeImmutable describing starting and finishing datetimes. It can be seen as an atomic model for timetables.
- `Day_Timetable`, which is simply a pair of `Unit_Timetable`, describing a-m and p-m timetables for the day

Three additional functions are embeded in the package to *format* our timetables, and prepare them ready for any kind of output.

## Usage

~~~php
use Websealevel\TimeTable\Models\Day_Timetable;
use function Websealevel\TimeTable\show_time_table;

$week_time_table = array(
	new Day_Timetable(
		'monday',
		'8:0',
		'12:0',
		'13:30',
		'17:0'
	),
	new Day_Timetable(
		'tuesday',
		'8:0',
		'12:0',
		'13:30',
		'17:0'
	),
	new Day_Timetable(
		'wednesday',
		'8:0',
		'12:0',
		'13:30',
		'17:0'
	),
	new Day_Timetable(
		'thursday',
		'8:0',
		'12:0',
		'13:30',
		'17:0'
	),
	new Day_Timetable(
		'friday',
		'8:0',
		'12:0',
		'13:30',
		'17:0'
	),
	new Day_Timetable(
		'saturday',
		is_off: true
	),
	new Day_Timetable(
		'sunday',
		is_off: true
	),
);


$formated = show_time_table($week_time_table);

var_dump($formated);
~~~


