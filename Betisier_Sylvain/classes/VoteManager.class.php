<?php
class VoteManager {
  private $db;

  /* Constructeur */
  public function __construct($db) {
    $this->db = $db;
  }


  /** Cette fonction retourne la valeur de vote d'une citation.
  Retourne la valeur directement
  */
  public function getMoyenneVote($cit_num) {
    $sql = 'SELECT AVG(vot_valeur) as valeurVote FROM VOTE WHERE cit_num='.$cit_num;
    $resultat = $this->db->query($sql);
    $retour = $resultat->fetch(PDO::FETCH_ASSOC);
    //var_dump($retour);
    return $retour['valeurVote'];
  }
}
?>
