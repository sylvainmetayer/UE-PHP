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

/*
Définitions personnelles
*/

//Gestion des erreurs
define('ERR_NUMERIC', 0);

?>
