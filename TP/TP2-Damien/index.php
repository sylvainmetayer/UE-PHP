<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
		    <link rel="stylesheet" href="style.css" />
        <title>Commande</title>
    </head>
<body>
<?php
  $db = mysqli_connect("localhost", "root","")
  or die("Echec de la connexion");

  mysqli_select_db($db, "tp1") or die("Accès impossible à la base");
?>
    <h1>Détail de la commande d'un client </h1>
<?php

  if(empty($_POST['no_client']) && empty($_SESSION['no_client'])){
?>
  <form action="#" method="post">

    <label>N° client </label>

    <select name="no_client">
      <?php
        $req="Select no_client, nom_client FROM Client";
        $resu=mysqli_query($db, $req);
        while($lign=mysqli_fetch_array($resu, MYSQL_ASSOC)){
          ?><option value="<?php echo $lign['no_client'] ?>"><?php echo $lign['nom_client']; ?></option> <?php
        }
      ?>
    </select>
    <input type="submit" value="Ok" />
  </form>

<?php
  }
  if(!empty($_POST['no_client'])){
    $_SESSION['no_client']=$_POST['no_client'];
    $req="SELECT nom_client FROM Client WHERE no_client=".$_POST['no_client'];
    $resu=mysqli_query($db, $req);

  ?>

  <form action="#" method="post">
    <p>Nom client :
      <?php
        $lign=mysqli_fetch_array($resu, MYSQL_ASSOC);
        echo $lign['nom_client'];
      ?>
    </p>
    <label>N° commande</label>

    <select name="no_commande">
      <?php
        $req="SELECT no_commande FROM Commande WHERE no_client=".$_POST['no_client'];
        $resu=mysqli_query($db, $req);
        while($lign=mysqli_fetch_array($resu, MYSQL_ASSOC)){
          ?> <option value="<?php echo $lign['no_commande']; ?>"> <?php echo $lign['no_commande']; ?> </option> <?php
        }
       ?>
    </select>
    <input type="submit" value="Ok" />
  </form>

<?php
  }

  if((!empty($_POST['no_commande']) && !empty($_SESSION['no_client']))){
    $_SESSION['no_commande']=$_POST['no_commande'];
    $req="SELECT nom_client FROM Client WHERE no_client=".$_SESSION['no_client'];
    $resu=mysqli_query($db, $req);
?>
<form action="#" method="post">
  <p>Nom client :
    <?php
      $lign=mysqli_fetch_array($resu, MYSQL_ASSOC);
      echo $lign['nom_client'];
    ?>
  </p>

  <p>N° commande :
    <?php
      $lign=mysqli_fetch_array($resu, MYSQL_ASSOC);
      echo $_SESSION['no_commande'];
    ?>
  </p>
  <label>N° article</label>

  <select name="no_article">
    <?php
      $req="SELECT no_article FROM detail_cde WHERE no_commande='".$_SESSION['no_commande']."'";
      $resu=mysqli_query($db, $req);
      while($lign=mysqli_fetch_array($resu, MYSQL_ASSOC)){
        ?> <option value="<?php echo $lign['no_article']; ?>"> <?php echo $lign['no_article']; ?> </option> <?php
      }
     ?>
  </select>
  <input type="submit" value="Ok" />

<?php
  }
  if(!empty($_POST['no_article'])){
    $_SESSION['no_article']=$_POST['no_article'];
    $req="SELECT nom_client FROM Client WHERE no_client=".$_SESSION['no_client'];
    $resu=mysqli_query($db, $req);
  ?>
  <form action="#" method="post">
  <p>Nom client :
    <?php
      $lign=mysqli_fetch_array($resu, MYSQL_ASSOC);
      echo $lign['nom_client'];
    ?>
  </p>

  <p>N° commande :
    <?php
      $lign=mysqli_fetch_array($resu, MYSQL_ASSOC);
      echo $_SESSION['no_commande'];
    ?>
  </p>
  <p>N° article :
    <?php
      $lign=mysqli_fetch_array($resu, MYSQL_ASSOC);
      echo $_SESSION['no_article'];
    ?>
  </p>

  <?php
  $req1="SELECT LIB_ARTICLE FROM ARTICLE WHERE no_article='".$_SESSION['no_article']."'";
  $resu1=mysqli_query($db, $req1);
  $lign1=mysqli_fetch_array($resu1, MYSQL_ASSOC);

  $req2="SELECT qte_cdee, qte_livree FROM detail_cde WHERE no_article='".$_SESSION['no_article']."'";
  $resu2=mysqli_query($db, $req2);
  $lign2=mysqli_fetch_array($resu2, MYSQL_ASSOC);
  ?>
  <table>
    <tr>
      <th>N° article</th>
      <th>Nom article</th>
      <th>Quantité commandée</th>
      <th>Quantité livrée</th>
    </tr>

    <tr>
        <td><?php echo $_SESSION['no_article']; ?></td>
        <td><?php echo $lign1['LIB_ARTICLE']; ?></td>
        <td><?php echo $lign2['qte_cdee']; ?></td>
        <td><?php echo $lign2['qte_livree']; ?></td>
    </tr>

  </table>
  <?php unset($_SESSION['no_client']); ?>
  <a href="index.php">Autre recherche</a>

<?php } ?>

</body>
</html>
