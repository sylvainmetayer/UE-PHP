<html>

<head>

  <meta charset="utf-8" />

</head>
<body>
  <?php
    $array = array('php5@free.com','php5@orange.com','php5@free.com','php5@orange.com','php5@free.fr','php5@free.com','php5@toto.com','php5@sfr.com');

    foreach ($array as $key => $value) {
      $tmp = explode("@", $value);
      $middleTab[] = $tmp[1];
    }

    $resultat = array_count_values($middleTab);

    foreach ($resultat as $value => $nombre) {
      echo "L'operateur $value a $nombre abonnés.";
    }
  ?>


</body>
