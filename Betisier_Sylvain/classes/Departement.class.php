<?php
class Departement {
	private $dep_num;
	private $dep_nom;
  private $vil_num;
	
	private $ctrlSaisie;

  /*
  Constructeur
  */
	public function __construct($valeurs = array()) {
		if (! empty ( $valeurs )) {
			$this->ctrlSaisie = new ControleurSaisie();
			var_dump($this->ctrlSaisie);
			$this->affecte ( $valeurs );
		}
		unset($this->ctrlSaisie);
	}

	public function affecte($donnees) {
		foreach ( $donnees as $attribut => $valeurs ) {
			switch ($attribut) {
				case 'dep_num' :
          $this->setDepNum ( $valeurs );
					break;
				case 'dep_nom' :
					$this->setDepNom ( $valeurs );
					break;
        case 'vil_num':
          $this->setVilNum($valeurs);
          break;
			}
		}
	}

  public function setDepNum($dep_num) {
		if (!$this->ctrlSaisie->isCorrectEntier($dep_num)) {
			throw new ExceptionPerso(ControleurSaisie::ERR_NUMERIC_LIBELLE, ControleurSaisie::ERR_NUMERIC);
		}
    $this->dep_num = $dep_num;
  }

  public function getDepNum() {
    return $this->dep_num;
  }

  public function setDepNom($dep_nom) {
    $this->dep_nom = $dep_nom;
  }

  public function getDepNom() {
    return $this->dep_nom;
  }

  public function setVilNum($vil_num) {
		if (!$this->ctrlSaisie->isCorrectEntier($vil_num)) {
			throw new ExceptionPerso(ControleurSaisie::ERR_NUMERIC_LIBELLE, ControleurSaisie::ERR_NUMERIC);
		}
    $this->vil_num = $vil_num;
  }

  public function getVilNum() {
    return $this->vil_num;
  }
}
