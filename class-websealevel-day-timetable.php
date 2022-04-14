<?php

namespace Websealevel\TimeTable\Models;

/**
 * Modèle d'un horaire d'une journée, couple de Unit_Timetable (Horaire unitaire matin, Horaire unitaire après-midi)
 * 
 * @see Unit_Timetable
 */
class Day_Timetable
{
	/**
	 * Constructeur.
	 *
	 * @param string $label Un label pour identifier la journée (par ex 'lundi')
	 * @param string $am_start Horaire du matin début.
	 * @param string $am_end Horaire du matin fin.
	 * @param string $pm_start Horaire de l'après-midi début.
	 * @param string $pm_end Horaire de l'après-mid fin.
	 */
	public function __construct(
		public string $label = '',
		public string $am_start = 'now',
		public string $am_end = 'now',
		public string $pm_start = 'now',
		public string $pm_end = 'now'
	) {
		$this->am = new Unit_Timetable($am_start, $am_end);
		$this->pm = new Unit_Timetable($pm_start, $pm_end);
	}
}
