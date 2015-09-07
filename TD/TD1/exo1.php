<?php
$chaine = "Une chaine quelconque";
$resultat = "";

for ($i = strlen($chaine) - 1;$i>=0;$i--) {
  $resultat = $resultat.substr($chaine, $i, 1);
}

echo "Chaine originale : $chaine <br/>Chaine finale : $resultat";
?>
