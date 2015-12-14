function creerImageNumero() {
  console.log("Je cree l'image");
  var image=document.getElementById("affichTel");
  image.src="./image.php?num="+document.getElementById('monSuperTexte').value;
  image.height=100;
  image.width=200;
  image.removeEventListener("click", creerImageNumero, false);
  image.addEventListener("click", cacherNumero, false);
}

function cacherNumero() {
  console.log("Je cache l'image");
  var image=document.getElementById("affichTel");
  image.src="./tel.png";
  image.height=100;
  image.width=100;
  image.removeEventListener("click", cacherNumero, false);
  image.addEventListener("click", creerImageNumero, false);
}

window.onload = function() {
  console.log("Initialisation");
  var image = document.getElementById("affichTel");
  image.addEventListener("click", creerImageNumero, false);
}
