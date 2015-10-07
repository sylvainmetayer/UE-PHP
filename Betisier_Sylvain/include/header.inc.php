<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <?php
		$title = "Bienvenue sur le site du bétisier de l'IUT.";?>
		<title>
		<?php echo $title ?>
		</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />

</head>
	<body>
	<div id="header">
		<div id="connect">
      <!-- Penser à modifier pour gérer le cas ou la personne est connectée ! -->
      <a href="index.php?page=<?php echo CONNEXION ?>">Connexion</a>
		</div>
		<div id="entete">
			<div id="logo">
        <!-- Penser à modifier pour gérer le cas ou la personne est connectée ! -->
        <a href="index.php?page=<?php echo ACCUEIL; ?>"> <img src="image/lebetisier.gif" alt="Le Betiser"/> </a>
			</div>
			<div id="titre">
				Le bétisier de l'IUT,<br />Partagez les meilleures perles !!!
			</div>
		</div>
	</div>
