<?php
$pdo = new Mypdo();
$citationManager = new CitationManager($pdo);
$citations = $citationManager->listerNCitations(2);
$nbCitations = $citationManager->getNbCitations();
$personneManager = new PersonneManager($pdo);
$voteManager = new VoteManager($pdo);
?>

	<h1>Liste des citations déposées</h1>

	<p> Actuellement, <?php echo $nbCitations; ?> citations sont enregistrées. <br>Seules les 2 premières seront listées ici. </p>

	<table>
		<tr>
			<th>Nom de l'enseignant</th>
			<th>Libellé</th>
			<th>Date</th>
			<th>Moyenne des notes</th>
		</tr>
		<?php
		foreach ($citations as $citation) {
			//var_dump($citation);
			$detailsNomPrenom = $personneManager->getNomPersonne($citation->getCitationPerNum());
			?> <tr>
					<td> <?php echo $detailsNomPrenom['nom']." ". $detailsNomPrenom['prenom']; ?> </td>
					<td> <?php echo $citation->getCitationLibelle(); ?> </td>
					<td> <?php echo $citation->getCitationDate(); ?> </td>
					<td> <?php echo $voteManager->getMoyenneVote($citation->getCitationNum()); //TODO point de maintenance ? ?> </td>
				</tr>
		<?php } ?>
	</table>
