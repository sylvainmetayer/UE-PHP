<?php
$pdo = new Mypdo();
$villeManager = new VilleManager($pdo);
$villes = $villeManager->getAllVilles();
$nbVilles = $villeManager->getNbVilles();
?>

	<h1>Liste des villes</h1>

	<p> Actuellement, <?php echo $nbVilles; ?> villes sont enregistrées. </p>

	<table>
		<tr>
			<th>Numero</th>
			<th>Nom</th>
		</tr>
		<?php
		foreach ($villes as $ville) {
			?> <tr>
					<td> <?php echo $ville->getVilleNum(); ?> </td>
					<td> <?php echo $ville->getVilleNom(); ?> </td>
				</tr>
		<?php } ?>
	</table>
