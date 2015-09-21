<?php session_start();
//Non stylisé
?>
<!DOCTYPE html>
<html lang='fr'>
<head>
<meta charset="utf-8"/>
<title>Détails Commande </title>
</head>

<body>

<h1>Détails commande  </h1>
<?php
$db = mysqli_connect("localhost", "bd", "bede");
mysqli_select_db($db, "tp1");
?>

<?php if (empty($_POST['no_client']) && empty($_POST['no_commande']) && empty($_POST['no_article'])) {
  //CAS CLIENT ?>
  <form action='#' method="post">
    <label for="no_client">Constructeur</label>
    <select name="no_client">
      <?php
      $sql = "SELECT no_client, nom_client FROM CLIENT";
      $resu = mysqli_query($db,$sql);
      while ($ligne = mysqli_fetch_array($resu, MYSQL_ASSOC)) {
        ?><option value="<?php echo $ligne['no_client']; ?>"> <?php echo $ligne['nom_client']; ?> </option> <?php echo "\n";
      }
      ?>
    </select>
    <input type="submit" value="Valider">
  </form>
<?php } //FIN CLIENT ?>

<?php if (!empty($_POST['no_client']) && empty($_POST['no_commande']) && empty($_POST['no_article'])) {
  //CAS COMMANDE ?>
  <form action='#' method="post">
    <?php
    $sql = "SELECT nom_client FROM CLIENT WHERE no_client='".$_POST['no_client']."'";
    $resu = mysqli_query($db,$sql);
    $ligne = mysqli_fetch_array($resu, MYSQL_ASSOC);
    $clientNom = $ligne['nom_client'];
    ?>
    <input type="hidden" name="nom_client_cache" value="<?php echo $clientNom; ?>">
    <input type="hidden" name="no_client_cache" value="<?php echo $_POST['no_client']; ?>">

    <p>Nom Client : <?php echo $clientNom; ?> </p>
    <label for="no_commande">Numéro commande :</label>
    <select name="no_commande">
      <?php
      $sql = "SELECT no_commande FROM COMMANDE where no_client = ".$_POST['no_client'];
      //echo $sql;
      $resu = mysqli_query($db,$sql);
      while ($ligne = mysqli_fetch_array($resu, MYSQL_ASSOC)) {
        ?><option value="<?php echo $ligne['no_commande']; ?>"> <?php echo $ligne['no_commande']; ?> </option> <?php echo "\n";
      }
      ?>
    </select>

    <input type="submit" value="Valider">
  </form>
<?php } //FIN COMMANDE ?>

<?php if (empty($_POST['no_client']) && !empty($_POST['no_commande']) && empty($_POST['no_article'])) {
  //CAS ARTICLE
  ?>
  <form action='#' method="post">
    <?php
    $clientNom = $_POST['nom_client_cache'];
    $no_client = $_POST['no_client_cache'];
    $no_commande = $_POST['no_commande'];
    ?>

    <input type="hidden" name="nom_client_cache" value="<?php echo $clientNom; ?>">
    <input type="hidden" name="no_client_cache" value="<?php echo $no_client; ?>">
    <input type="hidden" name="no_commande_cache" value="<?php echo $no_commande; ?>">

    <p>Nom Client : <?php echo $clientNom; ?> </p>
    <p>Numero Commande : <?php echo $no_commande; ?> </p>
    <label for="no_article">Numéro Article :</label>
    <select name="no_article">
      <?php
      $sql = "SELECT no_article FROM detail_cde WHERE no_commande= '$no_commande'";
      echo $sql;
      $resu = mysqli_query($db,$sql);
      while ($ligne = mysqli_fetch_array($resu, MYSQL_ASSOC)) {
        ?><option value="<?php echo $ligne['no_article']; ?>"> <?php echo $ligne['no_article']; ?> </option> <?php echo "\n";
      }
      ?>
    </select>

    <input type="submit" value="Valider">
  </form>

<?php } //FIN CAS ARTICLE ?>

<?php if (empty($_POST['no_client']) && empty($_POST['no_commande']) && !empty($_POST['no_article'])) {
  //AFFICHAGE FINAL ?>
  <form action='#' method="post">
    <?php
    $clientNom = $_POST['nom_client_cache'];
    $no_client = $_POST['no_client_cache'];
    $no_commande = $_POST['no_commande_cache'];
    $no_article = $_POST['no_article'];
    ?>

    <p>Nom Client : <?php echo $clientNom; ?> </p>
    <p>Numero Commande : <?php echo $no_commande; ?> </p>
    <p>Numero article : <?php echo $_POST['no_article']; ?> </p>

    <?php
    $sql = "SELECT a.no_article, lib_article, qte_cdee, qte_livree FROM ARTICLE a JOIN DETAIL_CDE d on a.no_article=d.no_article WHERE a.no_article= $no_article";
    //echo $sql;
    $resu = mysqli_query($db,$sql);
    $ligne = mysqli_fetch_array($resu, MYSQL_ASSOC);

    //var_dump($ligne);
    ?>

    <table>
      <tr>
        <td>Num article</td>
        <td>Nom article</td>
        <td>Quantite commandée</td>
        <td>Quantité livrée</td>
      </tr>
      <tr>
        <td><?php echo $ligne['no_article']; ?></td>
        <td><?php echo $ligne['lib_article']; ?></td>
        <td><?php echo $ligne['qte_cdee']; ?></td>
        <td><?php echo $ligne['qte_livree']; ?></td>
      </tr>
    </table>

  </form>

  <a href="index.php">Une autre recherche ?</a>
<?php } //FIN AFFICHAGE FINAL ?>

</body>
