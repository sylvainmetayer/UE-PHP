<?php
class VilleManager {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  /*
  Fonction qui permet de lister toutes les villes présente dans la base de données.
  Retourne un tableau d'objet Ville
  */
  public function getAllVilles() {
    $listeVilles = array();

    $sql = 'SELECT vil_num, vil_nom FROM VILLE';

    $requete = $this->db->prepare($sql);
    $requete->execute();

    while ($ville = $requete->fetch(PDO::FETCH_OBJ)) {
      $listeVilles[] = new Ville($ville);
    }
    $requete->closeCursor();
    return $listeVilles;
  }

  /*
  Cette fonction permet de savoir le nombre de villes présentes dans la base de données.
  Retourne directement la valeur.
  */
  public function getNbVilles() {
    $sql = "SELECT count(*) as nbVille FROM VILLE";

    $resultat = $this->db->query($sql);
    $retour = $resultat->fetch(PDO::FETCH_ASSOC);
    //var_dump($retour);
    return $retour['nbVille'];
  }
}
?>
