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

if (isset($_POST['choix'])) {
    $idClient = $_POST['choix'];
} else {
  $idClient = 0; //Auto-increment partant de 1, donc si 0, on aura pas de resultat, et permet de le gérer.
}

$req = "SELECT prenom_client, mail_client FROM CLIENT where no_client=$idClient";
$resu = mysqli_query($db, $req);
if ($resu==false) {
  echo "<b>Erreur lors du chargement des donn&eacute;es !</b>";
} else {
$ligne = mysqli_fetch_array($resu, MYSQL_ASSOC);
$prenom = $ligne['prenom_client'];
$mail = $ligne['mail_client'];
?>

<h1>Modification des informations de <?php echo $prenom ?></h1>

<form action="exo4.3.php" method="post">

  <label for="prenom">Prenom</label>
  <input type="text" name="prenom" value="<?php echo $prenom; ?>"><br/>

  <input type="hidden" name="numero" value="<?php echo $idClient ?>">

  <label for="mail">Mail</label>
  <input type="mail" name="mail" value="<?php echo $mail; ?>"><br/>

  <input type="submit" value="OK">
  <input type="reset" value="Effacer">
</form>
<?php } ?>
</body>
</html>
