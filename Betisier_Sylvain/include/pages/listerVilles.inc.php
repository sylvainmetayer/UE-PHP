<?php
$pdo = new Mypdo();
$villeManager = new VilleManager($pdo);
$villes = $villeManager->getAllVilles();
?>

	<h1>Liste des villes</h1>

	<p> Actuellement, <?php echo count($villes); ?> villes sont enregistrées. </p>

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
