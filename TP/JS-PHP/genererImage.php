<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wouhou, je génère des images ! </title>
    <script type ="text/javascript"  src="image.js"></script>
</head>
<body>
  <div>
    <?php  $tel = "0643738482"; ?>

    <input type="hidden" id="monSuperTexte" value="<?php echo $tel; ?>">
    <img src="tel.png" id="affichTel" width=100 height=100 alt="Telephone" />
  </div>

</body>
