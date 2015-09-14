<!DOCTYPE html>
<html lang='fr'>
<head>
<meta charset="utf-8"/>
<link href="css/exo1.css" rel="stylesheet" type="text/css"/>
<title>Exo 5</title>
</head>

<body>
<?php
$db = mysqli_connect("localhost", "bd", "bede");
mysqli_select_db($db,"tp1");

if (isset($_POST['choix'])) {
    $idClient = $_POST['choix'];
} else {
  $idClient = null;
}

if ($idClient!=null) {
  //formulaire rempli et correct, on supprimmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmme !
  $req = "DELETE FROM CLIENT WHERE no_client=$idClient";
  $resu = mysqli_query($db,$req);
  if ($resu==false) {
    //erreur
    echo "Erreur lors de la suppression";
  } else {
    echo "Suppression termin&eacute;e !";
  }
} else {
  echo "Erreur inconnue, le client n'existe pas.";
}
?>
<a href="./exo5.php"><br/>Supprimer un autre client ?</a>
</body>

</html>
