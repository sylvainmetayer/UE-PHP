<?php
//TODO changer tout mes query en prepare
class PersonneManager {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  /* Cette fonction permet d'obtenir le nom et le prenom d'une personne par son per_num.
  Retourne un tableau associatif avec 'nom' et 'prenom'.
  */
  public function getNomPersonne($per_num) {
      $sql = "SELECT per_prenom as prenom, per_nom as nom FROM PERSONNE WHERE per_num=".$per_num;
      //echo $sql;

      $resultat = $this->db->query($sql);
      $retour = $resultat->fetch(PDO::FETCH_ASSOC);
      //var_dump($retour);
      return $retour;
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
}
?>
