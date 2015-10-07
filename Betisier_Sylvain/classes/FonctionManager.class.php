<?php
class FonctionManager {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  /*Retourne le libelle directement */
  public function getFonctionLibelle($fon_num) {
    $sql = 'SELECT fon_libelle FROM FONCTION WHERE fon_num='.$fon_num;

    $requete = $this->db->prepare($sql);
    $requete->execute();

    $ligne = $requete->fetch(PDO::FETCH_ASSOC);
    $personne = $ligne['fon_libelle'];

    $requete->closeCursor();
    return $personne;
  }



}
