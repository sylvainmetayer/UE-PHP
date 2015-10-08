<?php
class Citation {
	private $cit_num;
	private $per_num;
	private $per_num_valide;
	private $per_num_etu;
	private $cit_libelle;
	private $cit_date;
	private $cit_valide;
	private $cit_date_valide;
	private $cit_date_depo;

	public $ctrlSaisie;

  /*
  Constructeur
  */
	public function __construct($valeurs = array()) {
		if (! empty ( $valeurs )) {
			$this->ctrlSaisie = new ControleurSaisie();
			//var_dump($this->ctrlSaisie);
			$this->affecte ( $valeurs );
		}
		unset($this->ctrlSaisie);
	}

	public function affecte($donnees) {
		foreach ( $donnees as $attribut => $valeurs ) {
			switch ($attribut) {
				case 'cit_num' :
					$this->setCitationNum ( $valeurs );
					break;
				case 'per_num' :
					$this->setCitationPerNum ( $valeurs );
					break;
				case 'per_num_valide':
					$this->setCitationPerNumValide ( $valeurs );
					break;
				case 'per_num_etu':
					$this->setCitationPerNumEtu ( $valeurs );
					break;
				case 'cit_libelle':
					// Penser aux controle dans le manager !!
					$this->setCitationLibelle($valeurs);
					break;
				case 'cit_date':
					$this->setCitationDate($valeurs);
					break;
				case 'cit_valide':
					$this->setCitationValide($valeurs);
					break;
				case 'cit_date_valide':
					$this->setCitationDateValide($valeurs);
					break;
				case 'cit_date_depo':
					$this->setCitationDateDepot($valeurs);
					break;
			}
		}
	}

  /*
  Getter - Setter
  */

	public function setCitationDateValide($valeur) {
		if (!$this->ctrlSaisie->isCorrectDate($valeur)) {
				throw new ExceptionPerso(ControleurSaisie::ERR_DATE_LIBELLE, ControleurSaisie::ERR_DATE);
		}
		$this->cit_date_valide = $valeur;
	}

	public function getCitationDateValide() {
		return $this->cit_date_valide;
	}

	public function setCitationNum($valeur) {
		//var_dump($this->ctrlSaisie);
		if (!$this->ctrlSaisie->isCorrectEntier($valeur)) {
			throw new ExceptionPerso(ControleurSaisie::ERR_NUMERIC_LIBELLE, ControleurSaisie::ERR_NUMERIC);
		}
		$this->cit_num = $valeur;
	}

	public function getCitationNum() {
		return $this->cit_num;
	}

	public function setCitationDate($valeur) {
		if (!$this->ctrlSaisie->isCorrectDate($valeur)) {
			throw new ExceptionPerso(ControleurSaisie::ERR_DATE_LIBELLE, ControleurSaisie::ERR_DATE);
		}
		$this->cit_date = $valeur;
	}

	public function getCitationDate() {
		return $this->cit_date;
	}

	public function setCitationPerNum($valeur) {
		if (!$this->ctrlSaisie->isCorrectEntier($valeur)) {
			throw new ExceptionPerso(ControleurSaisie::ERR_NUMERIC_LIBELLE, ControleurSaisie::ERR_NUMERIC);
		}
		$this->per_num = $valeur;
	}

	public function getCitationPerNum() {
		return $this->per_num;
	}

	public function setCitationValide($valeur) {
		$this->cit_valide = $valeur;
	}

	public function getCitationValide() {
		return $this->cit_valide;
	}

	public function setCitationPerNumEtu($valeur) {
		if (!$this->ctrlSaisie->isCorrectEntier($valeur)) {
			throw new ExceptionPerso(ControleurSaisie::ERR_NUMERIC_LIBELLE, ControleurSaisie::ERR_NUMERIC);
		}
		$this->per_num_etu = $valeur;
	}

	public function getCitationPerNumEtu() {
		return $this->per_num_etu;
	}

	public function setCitationDateDepot($valeur) {
		if (!$this->ctrlSaisie->isCorrectDate($valeur)) {
			throw new ExceptionPerso(ControleurSaisie::ERR_DATE_LIBELLE, ControleurSaisie::ERR_DATE);
		}
		$this->cit_date_depo = $valeur;
	}

	public function getcitationDateDepot() {
		return $this->cit_date_depo;
	}

	public function setCitationPerNumValide($valeur) {
		if (!$this->ctrlSaisie->isCorrectEntier($valeur)) {
			throw new ExceptionPerso(ControleurSaisie::ERR_NUMERIC_LIBELLE, ControleurSaisie::ERR_NUMERIC);
		}
		$this->per_num_valide = $valeur;
	}

	public function getCitationPerNumValide() {
		return $this->per_num_valide;
	}

	public function setCitationLibelle($valeur) {
		$this->cit_libelle = $valeur;
	}

	public function getCitationLibelle() {
		return $this->cit_libelle;
	}
}
/* Fin Citation.class.php */
