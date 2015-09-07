<!DOCTYPE html>
<html lang='fr'>
<head>
<meta charset="utf-8"/>
<link href="css/exo1.css" rel="stylesheet" type="text/css"/>
<title>Exo 1</title>
</head>

<body>

<table>
<tr>
<?php 
for ($i=0; $i <= 9; $i++ ) {
	for ($j=0; $j<=9;$j++) {
		
		//Toute premiere case du tableau
		if ($i==0 && $j == 0) {
			?> <td></td> <?php echo "\n";
		}
		
		//premiere ligne du tableau ( de 2 à 9 )
		if ($i == 0 && $j>1) {
				?> <td ><?php echo $j; ?> </td> <?php echo "\n";
			}
		
		//premiere colonne du tableau
		if ($i>1 && $j==0) {
			?> <td ><?php echo $i; ?> </td> <?php echo "\n";
		}
		
		//remplissage brut et degueu
		if ($i>1 && $j>1) {
			$nombre=$i*$j;
			
			//paire 
			if ($i%2==0) {
				if ($i==$j) {
					//gras
					?> <td class="paire"> <b><?php echo $nombre; ?></b> </td> <?php echo "\n";
				} else {	
				?> <td class="paire"> <?php echo $nombre; ?> </td> <?php echo "\n";
				}
			} else {
				//impaire
				if ($i==$j) {
					//gras
					?> <td class="impaire"> <b><?php echo $nombre; ?></b> </td> <?php echo "\n";
				} else {
				?> <td class="impaire"> <?php echo $nombre; ?> </td> <?php echo "\n";
				}
			}
			
			
			
		}
			
		}
		?> </tr><tr> <?php 
}

?>

</table>

</body>