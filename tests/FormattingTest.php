<?php


declare(strict_types = 1)
;

use PHPUnit\Framework\TestCase;
use Websealevel\TimeTable\Models\DayTimetable;


class FormattingTest extends TestCase
{
    public function testDayTimetableIsNotOffByDefault()
    {
        $day = new DayTimetable();
        $this->assertTrue(false === $day->is_off, 'Ok');

    }
}
