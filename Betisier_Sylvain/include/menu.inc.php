<div id="menu">
	<div id="menuInt">
		<p><a href="index.php?page=0"><img class = "icone" src="image/accueil.gif"  alt="Accueil"/>Accueil</a></p>
		<p><img class = "icone" src="image/personne.png" alt="Personne"/>Personne</p>
		<ul>
			<li><a href="index.php?page=<?php echo LISTER_PERSONNES; ?>">Lister</a></li>
			<li><a href="index.php?page=<?php echo AJOUT_PERSONNE; ?>">Ajouter</a></li>
			<li><a href="index.php?page=<?php echo SUPPRIMER_PERSONNE; ?>">Supprimer</a></li>
		</ul>
		<p><img class="icone" src="image/citation.gif"  alt="Citation"/>Citations</p>
		<ul>
			<li><a href="index.php?page=<?php echo AJOUTER_CITATION; ?>">Ajouter</a></li>
			<li><a href="index.php?page=<?php echo LISTER_CITATIONS; ?>">Lister</a></li>
			<li><a href="index.php?page=8">Rechercher</a></li>
			<li><a href="index.php?page=9">Valider</a></li>
			<li><a href="index.php?page=<?php echo SUPPRIMER_CITATION; ?>">Supprimer</a></li>
		</ul>
		<p><img class = "icone" src="image/ville.png" alt="Ville"/>Ville</p>
		<ul>
			<li><a href="index.php?page=<?php echo LISTER_VILLES; ?>">Lister</a></li>
			<li><a href="index.php?page=<?php echo AJOUTER_VILLE; ?>">Ajouter</a></li>
			<li><a href="index.php?page=<?php echo MODIFIER_VILLE; ?>">Modifier</a></li>
			<li><a href="index.php?page=<?php echo SUPPRIMER_VILLE; ?>">Supprimer</a></li>
		</ul>
	</div>
</div>
