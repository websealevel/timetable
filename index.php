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
            'start' => $this->start->format($format),
            'end' => $this->end->format($format),
            'start_end' => $this->start->format($format) . ' ' . $separator . ' ' . $this->end->format($format),
            default => 'Not found'
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
	) {}
	/**
	 * Retourne l'horaire formaté
	 *
	 * @param string $am_pm Formater le DateTime du matin ('am'), de l'apres-midi ('am') ou les deux ('am_pm').
	 * @param string $format Format du DateTime.
	 * @param string $separator Optional Le séparateur entre le début et la fin si $start_end est égal à 'start_end'.
	 * @return string
	 */
	public function format( string $am_pm = 'am', string $format = 'H:i', string $separator = ' ' ): string {

		return match ($am_pm) {
			'am' => $this->am->format( format: $format ),
			'pm' => $this->pm->format( format: $format ),
			'am_pm' => $this->am->format( $format ) . ' ' . $separator . ' ' . $this->pm->format( $format ),
            default => 'Not found'
		};
	}
}

$lundi = new WSL_Day_Timetable();
var_dump($lundi->format(am_pm: 'am_pm',format:'H:i', separator:'-'));