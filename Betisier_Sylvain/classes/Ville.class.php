<?php
class Ville {
	private $vil_num;
	private $vil_nom;

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
				case 'vil_num' :
          if (!is_numeric($valeurs)) {
              throw new ExceptionPerso("Le numéro de la ville doit être numérique.", ERR_NUMERIC);
          }
          $this->setVilleNom ( $valeurs );
					break;
				case 'vil_nom' :
					$this->setVilleNum ( $valeurs );
					break;
			}
		}
	}

  /*
  Getter - Setter
  */

  public function getVilleNom() {
    return $this->vil_nom;
  }

  public function setVilleNom($vil_nom) {
    $this->vil_nom = $vil_nom;
  }

  public function getVilleNum() {
    return $this->vil_num;
  }

  public function setVilleNum($vil_num) {
    $this->vil_num = $vil_num;
  }
}
  /* Fin Ville.class.php */
