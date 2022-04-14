<?php

namespace Websealevel\TimeTable\Models;

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
