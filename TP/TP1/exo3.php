<!DOCTYPE html>
<html lang='fr'>
<head>
<meta charset="utf-8"/>
<link href="css/exo1.css" rel="stylesheet" type="text/css"/>
<title>Exo 3</title>
</head>

<body>
<h1>Affichage des clients </h1>
<table>
<?php
$db = mysqli_connect("localhost","bd","bede");
mysqli_select_db($db,"tp1");

$req = "SELECT nom_client, prenom_client, mail_client, inscrit_client FROM CLIENT";
$resu = mysqli_query($db,$req);
?>
<tr>
  <td>Nom</td>
  <td>Prenom</td>
  <td>Mail</td>
  <td>Inscrit</td>
</tr>
<?php while($ligne = mysqli_fetch_array($resu, MYSQLI_ASSOC)) { ?>
  <tr>
    <td> <?php echo $ligne['nom_client']; ?> </td>
    <td> <?php echo $ligne['prenom_client']; ?> </td>
    <td> <?php echo $ligne['mail_client']; ?> </td>
    <?php
      if ($ligne['inscrit_client']==0) {
        $inscrit = "oui";
      } else {
        $inscrit = "non";
      }
    ?>
    <td> <?php echo $inscrit; ?> </td>
  </tr>
<?php } ?>
</table>

</body>
</html>
