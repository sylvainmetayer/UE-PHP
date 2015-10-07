<?php
class VilleManager {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }


  /* Cette fonction permet de savoir le nombre de citations présentes dans la base de données.
  Retourne le résultat directement
  */
  public function getNbVilles() {
    $sql = "SELECT count(*) as nbCitation FROM CITATION";

    $resultat = $this->db->query($sql);
    $retour = $resultat->fetch(PDO::FETCH_ASSOC);
    //var_dump($retour);
    return $retour['nbCitation'];
  }

}
?>
