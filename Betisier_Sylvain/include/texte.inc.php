<div id="texte">
<?php
if (!empty($_GET["page"])){
	$page=$_GET["page"];}
	else
	{$page=0;
	}
switch ($page) {
//
// Personnes
//

case ACCUEIL:
	// inclure ici la page accueil photo
	include_once('pages/accueil.inc.php');
	break;
case AJOUT_PERSONNE:
	// inclure ici la page insertion nouvelle personne
	include("pages/ajouterPersonne.inc.php");
    break;

case LISTER_PERSONNES:
	// inclure ici la page liste des personnes
	try {
			include_once('pages/listerPersonnes.inc.php');
	} catch (ExceptionPerso $e) {
			?>
			<h3 class='erreur'> <?php echo $e->getMessage(); ?> <h3>
			<p>
				<a href="index.php?page=<?php echo LISTER_PERSONNES; ?>"> <b>Lister à nouveau ?</b> </a>
			</p>
		 <?php
	}

    break;
case MODIFIER_PERSONNE:
	// inclure ici la page modification des personnes
	include("pages/ModifierPersonne.inc.php");
    break;
case SUPPRIMER_PERSONNE:
	// inclure ici la page suppression personnes
	include_once('pages/supprimerPersonne.inc.php');
    break;
//
// Citations
//
case AJOUTER_CITATION:
	// inclure ici la page ajouter citations
    include("pages/ajouterCitation.inc.php");
    break;

case LISTER_CITATIONS:
	// inclure ici la page liste des citations
	include("pages/listerCitation.inc.php");
    break;
//
// Villes
//

case AJOUTER_VILLE:
	// inclure ici la page ajouter ville
	include("pages/ajouterVille.inc.php");
    break;

case LISTER_VILLES:
// inclure ici la page lister  ville
	include("pages/listerVilles.inc.php");
    break;

//

//
case CONNEXION:
	// inclure ici la page de connexion
		include('pages/connexion.inc.php');
    break;
case 10:
	// inclure ici la page....
    break;

case 11:
	// inclure ici la page...
    break;

case 12:
	// inclure ici la page...
    break;

default : 	include_once('pages/accueil.inc.php');
//TODO inclure page erreur 404
}

?>
</div>
