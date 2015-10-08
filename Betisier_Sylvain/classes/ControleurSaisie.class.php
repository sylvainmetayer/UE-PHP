<?php
class ControleurSaisie {

  //Gestion des erreurs
  const ERR_NUMERIC = 0;
  const ERR_NUMERIC_LIBELLE = "Le numero saisi doit etre numerique";
  const ERR_DATE = 1;
  const ERR_DATE_LIBELLE = "La date saisie doit etre saise correctement et ne peut etre supérieure à la date du jour.";
  const ERR_TEL = 2;
  const ERR_TEL_LIBELLE = "Le numero de telephone doit etre sur 10 chiffres. ";

  public function __construct() {
  }

  public function isCorrectDate($date) {
    return true; //TODO fix it
    /* axe de reflexion
    <?php
    // Supposons que j'ai un tableau de données issues de ma base de données contenu dans la variable $data
    $aujourdhui = new DateTime();
    $lancement  = new DateTime($data['date_lancement']);
    // On obtient la différence ainsi,
    //diff fait le calcul et retourne le DateInterval donc on peut l'afficher avec format
    echo $aujourdhui->diff($lancement)->format('Lancé il y a : %d jours');
    */
    $ctrlDate = new DateTime($date);
    if ($ctrlDate < new DateTime()) {
      return false;
    }
    return true;
  }

  public function isCorrectEntier($valeur) {
    if (!is_numeric($valeur)) {
      return false;
    }
    return true;
  }

  public function isCorrectNumeroDeTelephone($tel) {
      return true; //TODO
  }
}
