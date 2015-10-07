<?php
//TODO changer tout mes query en prepare
class SalarieManager {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function getSalarie($per_num) {
    $sql = 'SELECT * FROM SALARIE s JOIN PERSONNE p ON p.per_num=s.per_num WHERE s.per_num='.$per_num;
    //TODO virer le * par ce qui est nécessaire ?

    $requete = $this->db->prepare($sql);
    $requete->execute();

    $ligne = $requete->fetch(PDO::FETCH_OBJ);
    $personne = new Salarie($ligne);

    $requete->closeCursor();
    return $personne;
  }

}
?>
