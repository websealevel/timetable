# timetable

This package provides a simple implementation of timetables. It provides three additional functions to format the timetables for displaying them in your (web) application.

## Installation

Install this package with `composer`. It requires no other package.

~~~bash
compose require websealevel/timetable
~~~

## Test

~~~bash
vendor/bin/phpunit -c phpunit.xml
~~~

## Description

The timetable package provides two simple models

- `UnitTimetable`, which is simply a pair of `DateTimeImmutable` describing starting and finishing datetimes. It can be seen as an atomic model for timetables.
- `DayTimetable`, which is simply a pair of `UnitTimetable`, describing *a-m* and *p-m* timetables for a day

Three additional functions are embeded in the package to *format* our timetables, and prepare them ready for any kind of output.

## Usage

~~~php
use Websealevel\TimeTable\Models\DayTimetable;
use function Websealevel\TimeTable\show_time_table;

$week_time_table = array(
	new DayTimetable(
		'monday',
		'8:0',
		'12:0',
		'13:30',
		'17:0'
	),
	new DayTimetable(
		'tuesday',
		'8:0',
		'12:0',
		'13:30',
		'17:0'
	),
	new DayTimetable(
		'wednesday',
		'8:0',
		'12:0',
		'13:30',
		'17:0'
	),
	new DayTimetable(
		'thursday',
		'8:0',
		'12:0',
		'13:30',
		'17:0'
	),
	new DayTimetable(
		'friday',
		'8:0',
		'12:0',
		'13:30',
		'17:0'
	),
	new DayTimetable(
		'saturday',
		closed: Closed::yes
	),
	new DayTimetable(
		'sunday',
		closed: Closed::yes
	),
);

$formated = show_time_table($week_time_table);

var_dump($formated);
~~~


