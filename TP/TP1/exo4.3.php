<!DOCTYPE html>
<html lang='fr'>
<head>
<meta charset="utf-8"/>
<link href="css/exo1.css" rel="stylesheet" type="text/css"/>
<title>Exo 4</title>
</head>

<body>

<?php
$db = mysqli_connect("localhost", "bd", "bede");
mysqli_select_db($db,"tp1");
?>
<h1> Recapitulatif des infos recues : </h1>

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

<?php

$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$id = $_POST['numero'];
$req="UPDATE CLIENT SET prenom_client='$prenom', mail_client='$mail' WHERE no_client='$id' ;";
$resu = mysqli_query($db,$req);

if ($resu!=0) {
 echo "Donn&eacute;es modifi&eacute;es !";
} else {
	echo "erreur !";
}
?>
</body>
