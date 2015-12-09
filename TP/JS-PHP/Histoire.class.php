<?php
class Histoire {
	private $hist_num;
	private $hist_libelle;

	public function __construct($valeurs = array()) {
		if (! empty ( $valeurs )) {
			$this->affecte ( $valeurs );
		}
	}

	public function affecte($donnees) {
		foreach ( $donnees as $attribut => $valeurs ) {
			switch ($attribut) {
				case 'hist_num' :
					$this->setNum ( $valeurs );
					break;
				case 'hist_libelle':
					$this->setLibelle($valeurs);
					break;
			}
		}
	}

	public function getNum() {
		return $this->hist_num;
	}

	public function setNum($num) {
		$this->hist_num = $num;
	}

  public function getLibelle() {
    return $this->hist_libelle;
  }

  public function setLibelle($libelle) {
    $this->hist_libelle = $libelle;
  }
}
