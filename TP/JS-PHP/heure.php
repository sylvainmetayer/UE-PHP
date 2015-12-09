<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>

  <?php if (empty($_POST["heure"])) { ?>
    <form action="#" method="post">
      <input type="text" name="heure" id="heure">
      <input type="submit"  value="OK">
    </form>

    <script type="text/javascript">
      var d = new Date();
      var heure = d.getDate() + "/" + (d.getMonth()+1) + "/" + d.getFullYear() + " " + d.getHours() + ":" + d.getMinutes() +":" + d.getSeconds();//"<?php echo date("d/m/Y H:i:s"); ?>";
      console.log(d);
      document.getElementById("heure").value=heure;
    </script>

  <?php } else {
    $date = date("d/m/Y H:i:s");
    $recup = $_POST['heure'];

    $diff = abs(strtotime($date) - strtotime($recup));

    echo "Date serveur : ".$date." <br/> <br/>Date donnée :".$recup;

    $resu = convert($diff);

    echo "<br/><br/>Différence de temps : ".$resu['heures']." h ".$resu['minutes']." m ".$resu['secondes'] ."s";
  } ?>

</body>
<?php

function convert($diff) {
  $min= 0;
  $sec = 0;
  $heure = 0;
  while ($diff >= 60) {
    $min++;
    if ($min >=60) {
      $heure++;$min=0;
    }
    $diff-=60;
  }
  $sec = $diff;

  $resu["heures"] = $heure;
  $resu["minutes"] = $min;
  $resu["secondes"] = $sec;
  return $resu;
}
?>
