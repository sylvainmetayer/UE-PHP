<?php
class Salarie extends Personne {
  private $per_num;
  private $sal_telprof;
  private $fon_num;

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
    if (!$this->ctrlSaisie->isCorrectEntier($perNum)) {
      throw new ExceptionPerso(ControleurSaisie::ERR_NUMERIC_LIBELLE, ControleurSaisie::ERR_NUMERIC);
    }
		$this->per_num = $perNum;
	}

	public function getSalTelprof(){
		return $this->sal_telprof;
	}

	public function setSalTelprof($salTelprof){
    if (!$this->ctrlSaisie->isCorrectNumeroDeTelephone($salTelprof)) {
      throw new ExceptionPerso(ControleurSaisie::ERR_TEL_LIBELLE, ControleurSaisie::ERR_TEL);
    }
    $this->sal_telprof = $salTelprof;
	}

	public function getFonNum(){
		return $this->fon_num;
	}

	public function setFonNum($fonNum){
    if (!$this->ctrlSaisie->isCorrectEntier($fonNum)) {
      throw new ExceptionPerso(ControleurSaisie::ERR_NUMERIC_LIBELLE, ControleurSaisie::ERR_NUMERIC);
    }
    $this->fon_num = $fonNum;
	}
}
