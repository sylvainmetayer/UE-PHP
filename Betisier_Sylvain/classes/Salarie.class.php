<?php
class Salarie extends Personne {
  private $per_num;
  private $sal_telprof;
  private $fon_num;

  /*
  Constructeur
  */
  public function __construct($valeurs = array()) {
  //  var_dump($valeurs);
    parent::__construct($valeurs);
    if (! empty ( $valeurs )) {
      $this->affecte ( $valeurs );
    }
    var_dump($this);
  }

  public function affecte($donnees) {
		foreach ( $donnees as $attribut => $valeurs ) {
			switch ($attribut) {
        //TODO Logiquement, A VERIFIER, per_num devrait être géré par le Constructeur parent (Personne)
				case 'sal_telprof' :
          $this->setSalTelprof ( $valeurs );
					break;
				case 'fon_num' :
					$this->setFonNum ( $valeurs );
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

	public function getSalTelprof(){
		return $this->sal_telprof;
	}

	public function setSalTelprof($salTelprof){
		$this->sal_telprof = $salTelprof;
	}

	public function getFonNum(){
		return $this->fon_num;
	}

	public function setFonNum($fonNum){
		$this->fon_num = $fonNum;
	}
}
