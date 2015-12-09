function ajouteEvent(objet, typeEvent, nomFonction, typePropagation){
	if (objet.addEventListener){
		objet.addEventListener(typeEvent, nomFonction, typePropagation);
		}else if (objet.attachEvent)
		{ objet.attachEvent('on'+typeEvent, nomFonction);
		}
}

function chargePage(){
 ajouteEvent (window, 'load', machineEcr(), false);
 }
 
 window.onload=function () {
 	// initialisation des variables
 delai=150;
 message= 'Placez, svp, votre texte ici';
 chaine = "";
 
 chargePage();
 }
 
function machineEcr(){

	if (chaine.length == 0) { // Initialisation pour chaque 'premierS' appelS -->
					// Quand toute la phrase est parcouru chaine redevient vide -->
		chaine = " ";
		messageFunc = message;
		chainePart = "";
		}
	else {		
		chainePart = chainePart + chaine;
		chaine = messageFunc.substring(0, 1); // on récupère le premier caractere de messageFunc -->	
		messageFunc = messageFunc.substring(1, messageFunc.length);
		// on diminue la chaîne d'1 caractère -->
	}
	document.getElementById("Affich").value = chainePart + chaine;
	window.setTimeout('machineEcr()',delai); 
	// On appelle à nouveau la fonction -->
}
