<?php
class Etudiant extends Personne {
  private $per_num;
  private $dep_num;
  private $div_num;

  /*
  Constructeur
  */
  public function __construct($valeurs = array()) {
    parent::__construct;
    if (! empty ( $valeurs )) {
      $this->affecte ( $valeurs );
    }
  }

  public function affecte($donnees) {
		foreach ( $donnees as $attribut => $valeurs ) {
			switch ($attribut) {
        //TODO Logiquement, A VERIFIER, per_num devrait être géré par le Constructeur parent (Personne)
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
		return $this->perNum;
	}

	public function setPerNum($perNum){
		$this->perNum = $perNum;
	}

	public function getDepNum(){
		return $this->depNum;
	}

	public function setDepNum($depNum){
		$this->depNum = $depNum;
	}

	public function getDivNum(){
		return $this->divNum;
	}

	public function setDivNum($divNum){
		$this->divNum = $divNum;
	}

}
