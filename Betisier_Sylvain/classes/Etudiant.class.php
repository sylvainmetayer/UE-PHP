<?php
class Etudiant extends Personne {
  private $per_num;
  private $dep_num;
  private $div_num;

	private $ctrlSaisie;

  /*
  Constructeur
  */
  public function __construct($valeurs = array()) {
    if (! empty ( $valeurs )) {
      $this->ctrlSaisie = new ControleurSaisie();
      parent::affecte($valeurs);
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
				case 'div_num' :
					$this->setDivNum ( $valeurs );
					break;
			}
		}
	}

  public function getPerNum(){
		return $this->per_num;
	}

	public function setPerNum($perNum){
    if (!$this->ctrlSaisie->isCorrectEntier($perNum)) {
      throw new ExceptionPerso(ControleurSaisie::ERR_NUMERIC_LIBELLE, ControleurSaisie::ERR_NUMERIC);
    }
		$this->per_num = $perNum;
	}

	public function getDepNum(){
		return $this->dep_num;
	}

	public function setDepNum($depNum){
    if (!$this->ctrlSaisie->isCorrectEntier($depNum)) {
      throw new ExceptionPerso(ControleurSaisie::ERR_NUMERIC_LIBELLE, ControleurSaisie::ERR_NUMERIC);
    }
		$this->dep_num = $depNum;
	}

	public function getDivNum(){
		return $this->div_num;
	}

	public function setDivNum($divNum){
    if (!$this->ctrlSaisie->isCorrectEntier($divNum)) {
      throw new ExceptionPerso(ControleurSaisie::ERR_NUMERIC_LIBELLE, ControleurSaisie::ERR_NUMERIC);
    }
		$this->div_num = $divNum;
	}

}
