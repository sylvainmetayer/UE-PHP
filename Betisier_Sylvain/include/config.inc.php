<?php
// Paramètres de l'application Covoiturage
// A modifier en fonction de la configuration

define('DBHOST', "localhost");
define('DBNAME', "betisier");
define('DBUSER', "bd");
define('DBPASSWD', "bede");
define('ENV','dev');
// pour un environememnt de production remplacer 'dev' (développement) par 'prod' (production)
// les messages d'erreur du SGBD s'affichent dans l'environememnt dev mais pas en prod

define('GRAIN_SEL', "48@!alsd");

/*
Définitions personnelles
*/

//Menu, pour une meilleur compréhension.
define('ACCUEIL', 0);

define('AJOUT_PERSONNE', 1);
define('LISTER_PERSONNES', 2);
define('MODIFIER_PERSONNE', 3);
define('SUPPRIMER_PERSONNE', 4);

define('AJOUTER_CITATION', 5);
define('LISTER_CITATIONS', 6);
define('SUPPRIMER_CITATION', 10);

define('AJOUTER_VILLE', 7);
define('LISTER_VILLES', 8);
define('MODIFIER_VILLE', 11);
define('SUPPRIMER_VILLE', 12);

define('CONNEXION',9);
define('DECONNEXION', 15);

?>
