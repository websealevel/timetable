<?php

namespace Websealevel\TimeTable\Models;

use DateTimeImmutable;

/**
 * Modéle d'un horaire unitaire, couple DateTime (début - fin)
 */
class Unit_Timetable
{
    /**
     * Constructeur.
     *
     * @param string $start Horaire du début dans un format valide.
     * @param string $end Horaire de fin dans un format valide.
     */
    public function __construct(string $start, string $end)
    {
        $this->start = new DateTimeImmutable($start);
        $this->end = new DateTimeImmutable($end);
    }
}
