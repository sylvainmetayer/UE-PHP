<!DOCTYPE HTML>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title> TD de PHP + JS </title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
  if (empty($_POST["ok"])) { ?>
    <form action="#" method="post">
      <input type="submit" name="ok" value="Cliquez pour une nouvelle blague !">
    </form>

  <?php } else {
    require("Mypdo.class.php");
    require("Histoire.class.php");
    require("HistoireManager.class.php");
    $pdo = new Mypdo();
    $histoireManager = new histoireManager($pdo);

    $nb = rand(1,25);
    $resu = $histoireManager->getRandomStories($nb);
    echo $resu->getNum().":  ".$resu->getLibelle()."<br/>";


    echo "<br/><br/>ALL STORIES :<br/>";
    for($i=1;$i<25;$i++) {
      $resu = $histoireManager->getRandomStories($i);

      echo $resu->getNum().":  ".$resu->getLibelle()."<br/>";
    }

    ?>
      <form action="#" method="post">
        <p>Une autre histoire ?</p>
        <input type="submit" name="ok" value="OUI !">
      </form>
    <?php

  }  ?>

</body>
</html>
