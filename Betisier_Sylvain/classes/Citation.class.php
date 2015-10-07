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

  /*
  Constructeur
  */
	public function __construct($valeurs = array()) {
		if (! empty ( $valeurs )) {
			$this->affecte ( $valeurs );
		}
	}

	public function affecte($donnees) {
		foreach ( $donnees as $attribut => $valeurs ) {
			switch ($attribut) {
				case 'cit_num' :
          if (!is_numeric($valeurs)) {
						throw new ExceptionPerso("Le numero de la citation doit etre numérique.", ERR_NUMERIC);
          }
					$this->setCitationNum ( $valeurs );
					break;
				case 'per_num' :
					if (!is_numeric($valeurs)) {
						throw new ExceptionPerso("Le numero de la personne doit etre numérique.", ERR_NUMERIC);
					}
					$this->setCitationPerNum ( $valeurs );
					break;
				case 'per_num_valide':
					if (!is_numeric($valeurs)) {
						throw new ExceptionPerso("Le numero de la personne doit etre numérique.", ERR_NUMERIC);
					}
					$this->setCitationPerNumValide ( $valeurs );
					break;
				case 'per_num_etu':
					if (!is_numeric($valeurs)) {
						throw new ExceptionPerso("Le numero de la personne etudiant doit etre numérique.", ERR_NUMERIC);
					}
					$this->setCitationPerNumEtu ( $valeurs );
					break;
				case 'cit_libelle':
					// Penser aux controle dans le manager !!
					$this->setCitationLibelle();
					break;
				case 'cit_date':
					$this->setCitationDate();
					break;
				case 'cit_valide':
					$this->setCitationValide();
					break;
				case 'cit_date_valide':
					$this->setCitationDateValide();
					break;
				case 'cit_date_depo':
					$this->setCitationDateDepot();
					break;
			}
		}
	}

  /*
  Getter - Setter
  */

	public function setCitationDateValide($valeur) {
		$this->cit_date_valide = $valeur;
	}

	public function getCitationDateValide() {
		return $this->cit_date_valide;
	}

	public function setCitationNum($valeur) {
		$this->cit_num = $valeur;
	}

	public function getCitationNum() {
		return $this->cit_num;
	}

	public function setCitationDate($valeur) {
		$this->cit_date = $valeur;
	}

	public function getCitationDate() {
		return $this->cit_date;
	}

	public function setCitationPerNum($valeur) {
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
		$this->per_num_etu = $valeur;
	}

	public function getCitationPerNumEtu() {
		return $this->per_num_etu;
	}

	public function setCitationDateDepot($valeur) {
		$this->cit_date_depo = $valeur;
	}

	public function getcitationDateDepot() {
		return $this->cit_date_depo;
	}

	public function setCitationPerNumValide($valeur) {
		$this->per_num_valide = $valeur;
	}

	public function getCitationPerNumValide() {
		return $this->per_num_valide;
	}

	public function setCitationLibelle($valeur) {
		$this->cit_libelle = $valeur;
	}
}
/* Fin Citation.class.php */
