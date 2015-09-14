<!-- instructions : supprimer client seulement si il n'a pas commandé.
http://stackoverflow.com/questions/1233451/delete-from-two-tables-in-one-query
-->
<!DOCTYPE html>
<html lang='fr'>
<head>
<meta charset="utf-8"/>
<link href="css/exo1.css" rel="stylesheet" type="text/css"/>
<title>Exo 5</title>
</head>

<body>
  <h1>Selectionner la personne à supprimer</h1>
  <form action="exo5.2.php" method="post">
    <label for="choix">Nom : </label>
    <select name="choix">
      <?php
        $db  = mysqli_connect("localhost", "bd", "bede");
        mysqli_select_db($db,"tp1");

        $req = "SELECT no_client, prenom_client FROM CLIENT WHERE no_client NOT IN (SELECT no_client FROM COMMANDE)";
        $resu = mysqli_query($db, $req);

        while ($ligne = mysqli_fetch_array($resu)) {
          ?><option value="<?php echo $ligne['no_client']; ?>"> <?php echo $ligne['prenom_client']; ?></option> <?php
        }
      ?>
    </select>

    <input type="submit" value="Supprimer /!\ PAS DE CONFIRMATION /!\">

  </form>
</body>
