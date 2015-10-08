<?php
class Fonction {
	private $fon_num;
	private $fon_libelle;
	
	private $ctrlSaisie;

  /*
  Constructeur
  */
	public function __construct($valeurs = array()) {
		$this->ctrlSaisie = new ControleurSaisie();
		if (! empty ( $valeurs )) {
			$this->affecte ( $valeurs );
		}
		unset($this->ctrlSaisie);
	}

	public function affecte($donnees) {
		foreach ( $donnees as $attribut => $valeurs ) {
			switch ($attribut) {
				case 'fon_num' :
          $this->setFonNum ( $valeurs );
					break;
				case 'fon_libelle' :
					$this->setFonLibelle ( $valeurs );
					break;
			}
		}
	}

  public function setFonNum($fon_num) {
		if (!$this->ctrlSaisie->isCorrectEntier($perNum)) {
      throw new ExceptionPerso(ControleurSaisie::ERR_NUMERIC_LIBELLE, ControleurSaisie::ERR_NUMERIC);
    }
    $this->fon_num = $fon_num;
  }

  public function getFonNum() {
    return $this->fon_num;
  }

  public function setFonLibelle($fon_libelle) {
    $this->fon_libelle = $fon_libelle;
  }

  public function getFonLibelle() {
    return $this->fon_libelle;
  }
}
