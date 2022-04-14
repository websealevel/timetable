<?php

// $start = new DateTimeImmutable('8:0');
// $end = new DateTimeImmutable('12:0');
// var_dump($start->format('H:i'));
// var_dump($end->format('H:i'));

/**
 * Modéle d'un horaire unitaire (début - fin)
 */
class WSL_Unit_Timetable {

    /**
	 * Constructeur.
	 *
	 * @param DateTimeImmutable $start Horaire du début.
	 * @param DateTimeImmutable $end Horaire de fin.
	 */
	public function __construct(
		public DateTimeImmutable $start = new DateTimeImmutable(),
		public DateTimeImmutable $end = new DateTimeImmutable()
	) {}

    public function format(string $start_end = 'start_end', string $format = 'H:i', string $separator = '-'){

        return match($start_end){
            'start' => $this->am->format($format),
            'end' => $this->pm->format($format),
            'start_end' => $this->am->format($format) . ' ' . $separator . ' ' . $this->pm->format($format)
        };
    }
}

/**
 * Modèle d'un horaire d'une journée (Horaire unitaire matin, Horaire unitaire après-midi)
 */
class WSL_Day_Timetable {

	/**
	 * Constructeur.
	 *
	 * @param WSL_Unit_Timetable $am Horaire du matin.
	 * @param WSL_Unit_Timetable $pm Horaire de l'apres midi.
	 */
	public function __construct(
		public WSL_Unit_Timetable $am = new WSL_Unit_Timetable(),
		public WSL_Unit_Timetable $pm = new WSL_Unit_Timetable()
	) {
	}

    public function format(string $am_pm = 'am', string $format = 'H:i'){

        return match($am_pm){
            'am' => $this->am->format(format: $format),
            'pm' => $this->pm->format(format: $format),
        };
    }
}

$lundi = new WSL_Day_Timetable();
var_dump($lundi);
// var_dump($lundi->format(format:'H:i'));