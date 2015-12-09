<?php
require_once("Histoire.class.php");
require_once("Mypdo.class.php");
class HistoireManager {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function getRandomStories($num) {
    $sql = "SELECT hist_num, hist_libelle FROM histoire WHERE hist_num=:num";

    $requete = $this->db->prepare($sql);
    $requete->bindValue(":num", $num);

    $requete->execute();

    $resultat = $requete->fetch ( PDO::FETCH_OBJ );
    if ($resultat != null)
    {
      return new histoire ( $resultat );
    } else {
      return null;
    }

  }

}
