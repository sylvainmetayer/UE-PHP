<?php
$pdo = new Mypdo();
$personneManager = new PersonneManager($pdo);
$personnes = $personneManager->getAllPersonnes();
?>



<?php
	if (empty ( $_GET ['id'] )) {
		//id non renseigné, on affiche toutes les personnes.
		?>
			<h1>Liste des personnes enregistrées</h1>
			<?php if ($personnes == null) { // Pas de personnes enregistrées
					?>
					<p> D&eacute;sol&eacute;, aucune personne n'est enregistr&eacute;e. <br /> <strong> <a href='index.php?page=<?php echo AJOUT_PERSONNE; ?>'>Ajouter une personne ?</a></strong>
					<?php
				} else { // Des personnes sont enregistrées ?>
					<p> Actuellement, <?php echo count($personnes); ?> personnes sont enregistr&eacute;es. </p>
				<?php } ?>
		<table>
			<tr>
				<th>Numero</th>
				<th>Nom</th>
				<th>Prenom</th>
			</tr>
			<?php
			foreach ($personnes as $personne) {
				?> <tr>
						<td> <b> <a href="index.php?page=<?php echo LISTER_PERSONNES; ?>&id=<?php echo  $personne->getPerNum(); ?>" > <?php echo $personne->getPerNum(); ?> </a> </b> </td>
						<td> <?php echo $personne->getPerNom(); ?> </td>
						<td> <?php echo $personne->getPerPrenom(); ?> </td>
					</tr>
			<?php } ?>
		</table>
	<?php
	} else {
			//Cas ou l'id est renseigné
			$id = $_GET['id'];
			if (!is_numeric($id)) {
				throw new ExceptionPerso("Merci de ne pas modifier l'url dans la barre d'adresse !", ERR_NUMERIC);
			}

			if ($personneManager->isEtudiant($id)) {
				//requis pour l'étudiant
				$etudiantManager = new EtudiantManager($pdo);
				$departementManager = new DepartementManager($pdo);

				$detailPersonne = $etudiantManager->getEtudiant($id);

				$detailsDepartement = $departementManager->getDetailsDepartement($detailPersonne->getDepNum());
				?> <h1> D&eacute;tail sur l'étudiant <?php echo $detailPersonne->getPerNom(); ?> </h1><?php
			} else {
				//requis pour le salarie
				$salarieManager = new SalarieManager($pdo);
				$fonctionManager = new FonctionManager($pdo);

				$detailPersonne = $salarieManager->getSalarie($id);

				$fonction = $fonctionManager->getFonctionLibelle($detailPersonne->getFonNum());
				?> <h1> D&eacute;tail sur le salari&eacute; <?php echo $detailPersonne->getPerNom(); ?> </h1><?php
			}
			?>
			<table>
				<tr>
					<th>Pr&eacute;nom</th>
					<th>Mail</th>
					<th>T&eacute;l&eacute;phone</th>
					<?php if ($personneManager->isEtudiant($id)) {
						?>
						<th>D&eacute;partement</th>
						<th>Ville</th>
					<?php } else {
						?>
							<th>T&eacute;l&eacute;phone professionnel</th>
							<th>Fonction</th>
						<?php
					} ?>
				</tr>
				<tr>
					<td> <?php echo $detailPersonne->getPerPrenom(); ?> </td>
					<td> <?php echo $detailPersonne->getPerMail(); ?> </td>
					<td> <?php echo $detailPersonne->getPerTel(); ?> </td>
					<?php if ($personneManager->isEtudiant($id)) {
						?>
							<td> <?php echo $detailsDepartement['dep_nom']; ?> </td>
							<td> <?php echo $detailsDepartement['vil_nom']; ?> </td>
						<?php } else {
							?>
							<td> <?php echo $detailPersonne->getSalTelprof(); ?> </td>
							<td> <?php echo $fonction; ?> </td>
							<?php } ?>
				</tr>
			</table>
		<?php
	}
?>
