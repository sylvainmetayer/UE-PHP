<?php session_start();
//Non stylisé
?>
<!DOCTYPE html>
<html lang='fr'>
<head>
<meta charset="utf-8"/>
<title>Achats de cartouches d'encre</title>
</head>

<body>

<h1>Choix de consommables </h1>
<?php $db = mysqli_connect("localhost", "bd", "bede"); mysqli_select_db($db, "td2"); ?>

<?php if (empty($_POST['cons']) && empty($_POST['imp'])) {
  //CAS VIDE ?>
  <form action='#' method="post">
    <label for "cons">Constructeur</label>
    <select name="cons">
      <?php
      $sql = "SELECT no_cons, nom_cons FROM constructeur";
      $resu = mysqli_query($db,$sql);
      while ($ligne = mysqli_fetch_array($resu, MYSQL_ASSOC)) {
        ?><option value="<?php echo $ligne['no_cons']; ?>"> <?php echo $ligne['nom_cons']; ?> </option> <?php
      }
      ?>
    </select>
    <input type="submit" value="Valider">
  </form>
<?php } //FIN CAS VIDE ?>

<?php if (!empty($_POST['cons']) && empty($_POST['imp'])) {
  //CAS INTERMEDIAIRE ?>
  <form action='#' method="post">
    <?php
    $sql = "SELECT nom_cons FROM constructeur WHERE no_cons='".$_POST['cons']."'";
    $resu = mysqli_query($db,$sql);
    $ligne = mysqli_fetch_array($resu, MYSQL_ASSOC);
    $constructeurNom = $ligne['nom_cons'];
    ?>
    <input type="hidden" name="constructeurNom" value="<?php echo $constructeurNom; ?>">
    <input type="hidden" name="constructeurNumero" value="<?php echo $_POST['cons']; ?>">

    <label for "imp">Constructeur pour imprimante : <b><?php echo $constructeurNom; ?></b></label>
    <select name="imp">
      <?php
      $sql = "SELECT no_impr, desi_impr FROM IMPRIMANTE i JOIN CONSTRUCTEUR c on c.no_cons=i.no_cons WHERE i.no_cons='".$_POST['cons']."'";
      echo $sql;
      $resu = mysqli_query($db,$sql);
      while ($ligne = mysqli_fetch_array($resu, MYSQL_ASSOC)) {
        ?><option value="<?php echo $ligne['no_impr']; ?>"> <?php echo $ligne['desi_impr']; ?> </option> <?php
      }
      ?>
    </select>
    <input type="submit" value="Valider">
  </form>
<?php } //FIN CAS INTERMEDIAIRE ?>

<?php if (empty($_POST['cons']) && !empty($_POST['imp'])) {
  //CAS FINAL ?>
  <form action='#' method="post">
    <?php
    $sql = "SELECT desi_impr FROM IMPRIMANTE WHERE no_impr='".$_POST['imp']."'";
    $resu = mysqli_query($db,$sql);
    $ligne = mysqli_fetch_array($resu, MYSQL_ASSOC);
    $imprimanteNom = $ligne['desi_impr'];
    $constructeurNom = $_POST['constructeurNom'];

    ?>

    <h2> pour imprimante : <?php echo "$imprimanteNom ($constructeurNom)"; ?> </h2>

    <table>
      <tr>
        <th>Designation</th>
        <th>Couleur</th>
        <th>Prix</th>
        <th>Type</th>
        <th>Fabricant</th>
      </tr>

      <?php
      $sql = "SELECT desi_cart, couleur_cart, prix_cart, libelle_type_cart, nom_cons FROM CARTOUCHE ca JOIN CONSTRUCTEUR c on c.no_cons=ca.no_cons JOIN TYPE_CART t on t.no_type_cart=ca.no_type_cart JOIN EST_LIVREE e on e.no_cart=ca.no_cart WHERE e.no_impr='".$_POST['imp']."' AND ca.no_cons='".$_POST['constructeurNumero']."'";
      //echo $sql;
      $resu = mysqli_query($db,$sql);
      while ($ligne = mysqli_fetch_array($resu, MYSQL_ASSOC)) {
        ?><tr> <td><?php echo $ligne['desi_cart']; ?></td>
          <td><?php echo $ligne['couleur_cart']; ?></td>
          <td><?php echo $ligne['prix_cart']; ?></td>
          <td><?php echo $ligne['libelle_type_cart']; ?></td>
          <td><?php echo $ligne['nom_cons']; ?></td> </tr> <?php
      }
      ?>
    </table>

  </form>
<?php } //FIN CAS FINAL ?>

</body>
