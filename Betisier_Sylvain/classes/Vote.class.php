<?php
class Vote {
  private $cit_num;
  private $per_num;
  private $vot_valeur;

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
              throw new ExceptionPerso("Le numéro de la citation doit être numérique.", ERR_NUMERIC);
          }
          $this->setCitationNum ( $valeurs );
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

  

}
?>
