<!DOCTYPE html>
<html lang='fr'>
<head>
<meta charset="utf-8"/>
<link href="css/exo1.css" rel="stylesheet" type="text/css"/>
<title>Exo 2</title>
</head>
<body>

<h1> Recapitulatif des infos recues : </h1>

Nom : <?php
if (isset($_POST['nom'])) {
	echo $_POST['nom'];
} else {
	echo "Pas de données recues";
}?><br/>

Prenom : <?php
if (isset($_POST['prenom'] )) {
	echo $_POST['prenom'];
} else {
	echo "Pas de données recues";
}?><br/>

Mail : <?php
if (isset($_POST['mail'])) {
	echo $_POST['mail'];
} else {
	echo "Pas de données recues";
}?><br/>

Abonné aux diffusion : <?php
if (isset($_POST['check'])) {
	echo "oui";
	$estInscrit = "1";
} else {
	echo "non";
	$estInscrit = "0";
}?><br/>

<?php
//$db = mysqli_connect("164.81.120.5", "bd", "bede"); //pour connexion sur serveur php du prof
$db = mysqli_connect("localhost", "bd", "bede");
$mysql = mysqli_select_db($db, "tp1");

$req="INSERT INTO CLIENT (nom_client, prenom_client, mail_client, inscrit_client) VALUES ('".$_POST['nom']."', '".$_POST['prenom']."', '".$_POST['mail']."', '$estInscrit');";
$resu = mysqli_query($db,$req);

if ($resu!=0) {
 echo "insertion OK";
} else {
	echo "erreur.";
}

 ?>
 </body>
</html>
