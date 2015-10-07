<?php
class DepartementManager {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  /*Retourne un tableau associatif avec le nom de departement et le nom de la ville associée */
  public function getDetailsDepartement($dep_num) {
    $sql = 'SELECT dep_nom, vil_nom FROM DEPARTEMENT d JOIN VILLE v on v.vil_num=d.vil_num WHERE dep_num='.$dep_num;

    $requete = $this->db->prepare($sql);
    $requete->execute();

    $ligne = $requete->fetch(PDO::FETCH_ASSOC));

    $requete->closeCursor();
    return $ligne;
  }



}
