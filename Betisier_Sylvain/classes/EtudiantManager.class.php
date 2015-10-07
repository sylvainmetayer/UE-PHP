<?php
//TODO changer tout mes query en prepare
class EtudiantManager {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function getEtudiant($per_num) {
    $sql = 'SELECT * FROM ETUDIANT e JOIN PERSONNE p ON p.per_num=e.per_num WHERE e.per_num='.$per_num;
    //TODO virer le * par ce qui est nécessaire ?

    $requete = $this->db->prepare($sql);
    $requete->execute();

    $ligne = $requete->fetch(PDO::FETCH_OBJ));
    $personne = new Etudiant($ligne);

    $requete->closeCursor();
    return $personne;

  }

}
?>
