<?php
class Ville {
	private $vil_num;
	private $vil_nom;

  private $ctrlSaisie;

  /*
  Constructeur
  */
	public function __construct($valeurs = array()) {
		//var_dump($valeurs);
		$this->ctrlSaisie = new ControleurSaisie();
		if (! empty ( $valeurs )) {
			$this->affecte ( $valeurs );
		}
		unset($this->ctrlSaisie);
	}

	public function affecte($donnees) {
		foreach ( $donnees as $attribut => $valeurs ) {
			switch ($attribut) {
				case 'vil_nom' :
          $this->setVilleNom ( $valeurs );
					break;
				case 'vil_num' :
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
		if (!$this->ctrlSaisie->isCorrectEntier($vil_num)) {
			//TODO erreur lors du lancement d'ExceptionPerso
			throw new ExceptionPerso(ExceptionPerso::ERR_NUMERIC_LIBELLE, ExceptionPerso::ERR_NUMERIC);
		}
    $this->vil_num = $vil_num;
  }
}
  /* Fin Ville.class.php */
