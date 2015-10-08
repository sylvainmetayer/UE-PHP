<?php
//TODO changer tout mes query en prepare
class PersonneManager {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  /*
  Cette fonction permet de savoir si un utilisateur a
  le droit de se connecter, en passant un mot de passe en clair, et un nom d'utilisateur.
  Une vérification est alors effectuée en comparant les paramètres et ceux stocké en base (en cryptant le mot de passe).
  Retourne true ou false selon que la connexion est autorisée ou non.
  */
  public function isConnexionAutorisee($login, $pwd) {
    $sql = "SELECT per_login, per_pwd FROM PERSONNE WHERE per_login=:login AND per_pwd=:pwd";

    $requete = $this->db->prepare($sql);
    $requete->bindValue(':login', $login);
    $requete->bindValue(':pwd', $pwd);
    $requete->execute();

    echo $sql;

    $resultat = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();
    echo "<br/>DEBUG Affichage de personne dans isConnexionAutorisee : ";
    var_dump($resultat);
    if ($resultat != NULL) {
      return true;
    } else {
      return false;
    }
  }

  /*
  Cette fonction retourne une personne en fonction de son per_num.
  Retourne un objet Personne ou null si le numero n'identifie aucune personne.
  */
  public function getPersonne($per_num) {
    $sql = "SELECT * FROM PERSONNE WHERE per_num=".$per_num;
    //echo $sql;
    //a changer TODO

    $requete = $this->db->prepare($sql);
    $requete->execute();

    $ligne = $requete->fetch(PDO::FETCH_OBJ);
    $personne = new Personne($ligne);
    $requete->closeCursor();
    return $personne;
  }

  /*
  Cette fonction permet de récupérer les informations d'une personne en fonction de son login.
  Retourne un objet Personne ou null si la personne n'existe pas.
  */
  public function getPersonneByLogin($per_login) {
    $sql = "SELECT * FROM PERSONNE WHERE per_login='".$per_login."'";
    //echo $sql;
    //a changer TODO

    $requete = $this->db->prepare($sql);
    $requete->execute();

    $ligne = $requete->fetch(PDO::FETCH_OBJ);
    $personne = new Personne($ligne);
    $requete->closeCursor();
    return $personne;
  }

  /*
  Fonction qui permet de lister toutes les personnes présente dans la base de données.
  Retourne un tableau d'objet Personne
  */
  public function getAllPersonnes() {
    $listePersonnes = array();

    $sql = 'SELECT * FROM PERSONNE';
    //TODO à modifier en autre chose que * ?

    $requete = $this->db->prepare($sql);
    $requete->execute();

    while ($personne = $requete->fetch(PDO::FETCH_OBJ)) {
      $listePersonnes[] = new Personne($personne);
    }
    $requete->closeCursor();
    return $listePersonnes;
  }

  public function isEtudiant($per_num) {
    $requete = $this->db->prepare ( 'SELECT per_num FROM ETUDIANT WHERE per_num=' . $per_num );
		$retour = $requete->execute ();
		if ($ligne = $requete->fetch ( PDO::FETCH_ASSOC )) {
			$retour = true;
		} else {
			$retour = false;
		}
		$requete->closeCursor ();
		return $retour;
  }


  /* Cette fonction permet d'obtenir le nom et le prenom d'une personne par son per_num.
  Retourne un tableau associatif avec 'nom' et 'prenom'.
  OBSELETE
  */
  public function getNomPersonne($per_num) {
      $sql = "SELECT per_prenom as prenom, per_nom as nom FROM PERSONNE WHERE per_num=".$per_num;
      //echo $sql;

      $resultat = $this->db->query($sql);
      $retour = $resultat->fetch(PDO::FETCH_ASSOC);
      //var_dump($retour);
      return $retour;
  }
}
?>
