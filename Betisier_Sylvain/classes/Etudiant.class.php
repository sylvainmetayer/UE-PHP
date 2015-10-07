<?php
class Etudiant extends Personne {
  private $per_num;
  private $dep_num;
  private $div_num;

  /*
  Constructeur
  */
  public function __construct($valeurs = array()) {
    //  var_dump($valeurs);
      if (! empty ( $valeurs )) {
        parent::affecte($valeurs);
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
		return $this->per_num;
	}

	public function setPerNum($perNum){
		$this->per_num = $perNum;
	}

	public function getDepNum(){
		return $this->dep_num;
	}

	public function setDepNum($depNum){
		$this->dep_num = $depNum;
	}

	public function getDivNum(){
		return $this->div_num;
	}

	public function setDivNum($divNum){
		$this->div_num = $divNum;
	}

}
