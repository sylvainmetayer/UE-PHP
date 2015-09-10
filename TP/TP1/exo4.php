<!DOCTYPE html>
<html lang='fr'>
<head>
<meta charset="utf-8"/>
<link href="css/exo1.css" rel="stylesheet" type="text/css"/>
<title>Exo 4</title>
</head>

<body>
<h1>Modifier une personne</h1>
<form action="exo4.2.php" method="post">
  <label for="choix">Nom : </label>
  <select name="choix">
    <?php
      $db  = mysqli_connect("localhost", "bd", "bede");
      mysqli_select_db($db,"tp1");

      $req = "SELECT no_client, prenom_client FROM CLIENT";
      $resu = mysqli_query($db, $req);

      while ($ligne = mysqli_fetch_array($resu)) {
        ?><option value="<?php echo $ligne['no_client']; ?>"> <?php echo $ligne['prenom_client']; ?></option> <?php
      }
    ?>
  </select>

  <input type="submit" value="Modifier">

</form>

</body>
