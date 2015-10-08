<?php
//TODO controle avant les adds.
class Personne {
  private $per_num;
  private $per_nom;
  private $per_prenom;
  private $per_tel;
  private $per_mail;
  private $per_admin;
  private $per_login;
  private $per_pwd;

	private $ctrlSaisie;

  /*
  Constructeur
  */
  public function __construct($valeurs = array()) {
    if (! empty ( $valeurs )) {
      $this->affecte ( $valeurs );
    }
    //unset($this->ctrlSaisie);
  }

  public function affecte($donnees) {
    $this->ctrlSaisie = new ControleurSaisie();
    foreach ( $donnees as $attribut => $valeurs ) {
      switch ($attribut) {
        case 'per_num' :
          $this->setPerNum ( $valeurs );
          break;
        case 'per_nom':
          $this->setPerNom($valeurs);
          break;
        case 'per_prenom':
          $this->setPerPrenom ( $valeurs );
          break;
        case 'per_tel':
          $this->setPerTel($valeurs);
          break;
        case 'per_mail':
          $this->setPerMail($valeurs);
          break;
        case 'per_admin':
          $this->setPerAdmin($valeurs);
          break;
        case 'per_login':
          $this->setPerLogin($valeurs);
          break;
        case 'per_pwd':
          $this->setPerPwd($valeurs);
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

	public function getPerNom(){
		return $this->per_nom;
	}

	public function setPerNom($perNom){
		$this->per_nom = $perNom;
	}

	public function getPerPrenom(){
		return $this->per_prenom;
	}

	public function setPerPrenom($perPrenom){
		$this->per_prenom = $perPrenom;
	}

	public function getPerTel(){
		return $this->per_tel;
	}

	public function setPerTel($perTel){
    if (!$this->ctrlSaisie->isCorrectNumeroDeTelephone($perTel)) {
			throw new ExceptionPerso(ControleurSaisie::ERR_TEL_LIBELLE, ControleurSaisie::ERR_TEL);
		}
		$this->per_tel = $perTel;
	}

	public function getPerMail(){
		return $this->per_mail;
	}

	public function setPerMail($perMail){
		$this->per_mail = $perMail;
	}

	public function getPerLogin(){
		return $this->per_login;
	}

	public function setPerLogin($perLogin){
		$this->per_login = $perLogin;
	}

	public function getPerPwd(){
		return $this->per_pwd;
	}

	public function setPerPwd($perPwd){
		$this->per_pwd = $perPwd;
	}

  public function getPerAdmin(){
    return $this->per_admin;
  }

  public function setPerAdmin($perAdmin){
    $this->per_admin = $perAdmin;
  }
}
?>
