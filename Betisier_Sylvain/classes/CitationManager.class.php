<?php
class CitationManager {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  /*
  Cette fonction liste
  */
  public function listerNCitations($n) {
    $listeCitations = array();
    //$sql = 'SELECT cit_num, per_nom, cit_libelle, cit_date FROM CITATION c JOIN PERSONNE p on p.per_num=c.per_num WHERE cit_valide=1 AND cit_date_valide is not null ORDER BY cit_date desc';
    $sql = 'SELECT * FROM CITATION c JOIN PERSONNE p on p.per_num=c.per_num WHERE cit_valide=1 AND cit_date_valide is not null ORDER BY cit_date desc limit '.$n;
    //A tester voir si ça marche avec * puis passer ensuite au cas par cas.
    $requete = $this->db->prepare($sql);
    $requete->execute();
    while ($citation = $requete->fetch(PDO::FETCH_OBJ)) {
      $listeCitations[] = new Citation($citation);
    }
    $requete->closeCursor();
    //var_dump($listeCitations);
    return $listeCitations;
  }

  /*
    Cette fonction permet de lister toutes les citations.
    Retourne un tableau d'objet Citation
  */
  public function listerAllCitations() {
    //self:: fait référence à la classe elle meme 
    $listeCitations = self::listerNCitations(self::getNbCitations());
    return $listeCitations;
  }



  /* Cette fonction permet de savoir le nombre de citations présentes dans la base de données.
  Retourne le résultat directement
  */
  public function getNbCitations() {
    $sql = "SELECT count(*) as nbCitation FROM CITATION";

    $resultat = $this->db->query($sql);
    $retour = $resultat->fetch(PDO::FETCH_ASSOC);
    //var_dump($retour);
    return $retour['nbCitation'];
  }

}
?>
