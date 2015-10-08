<?php
class Vote {
  private $cit_num;
  private $per_num;
  private $vot_valeur;

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
        case 'cit_num' :
          if (!is_numeric($valeurs)) {
              throw new ExceptionPerso("Le numéro de la citation doit être numérique.", ERR_NUMERIC);
          }
          $this->setCitNum ( $valeurs );
          break;
        case 'per_num' :
          $this->setPerNum ( $valeurs );
          break;
        case 'vot_valeur' :
          if (!is_numeric($valeurs)) {
              throw new ExceptionPerso("La valeur du vote doit être numérique.", ERR_NUMERIC);
            }
            $this->setVoteValeur ( $valeurs );
            break;
      }
    }
  }

  public function setCitNum($valeur) {
    if (!$this->ctrlDate->isCorrectEntier($valeur)) {
      throw new ExceptionPerso(ExceptionPerso::ERR_NUMERIC_LIBELLE, ExceptionPerso::ERR_NUMERIC);
    }
    $this->cit_num = $valeur;
  }

  public function getCitNum() {
    return $this->cit_num;
  }

  public function setPerNum($valeur) {
    if (!$this->ctrlDate->isCorrectEntier($valeur)) {
      throw new ExceptionPerso(ExceptionPerso::ERR_NUMERIC_LIBELLE, ExceptionPerso::ERR_NUMERIC);
    }
    $this->per_num = $valeur;
  }

  public function getPerNum() {
    return $this->per_num;
  }

  public function setVoteValeur($valeur) {
    if (!$this->ctrlDate->isCorrectEntier($valeur)) {
      throw new ExceptionPerso(ExceptionPerso::ERR_NUMERIC_LIBELLE, ExceptionPerso::ERR_NUMERIC);
    }
    $this->vot_valeur = $valeur;
  }

}
?>
