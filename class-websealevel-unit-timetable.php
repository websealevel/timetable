<?php
namespace Websealevel\TimeTable\Models;

use DateTimeImmutable;

/**
 * Modéle d'un horaire unitaire (début - fin)
 */
class Unit_Timetable
{
    /**
     * Constructeur.
     *
     * @param DateTimeImmutable $start Horaire du début.
     * @param DateTimeImmutable $end Horaire de fin.
     */
    public function __construct(
        public DateTimeImmutable $start = new DateTimeImmutable(),
        public DateTimeImmutable $end = new DateTimeImmutable()
    ) {
    }
}
