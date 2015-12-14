<?php
header("Content-Type: image/png");
$im = @imagecreatetruecolor (110, 20)
    or die("Impossible d'initialiser la bibliothèque GD");
$background_color = imagecolorallocate($im, 255, 255, 255);
$text_color = imagecolorallocate($im, 135, 206, 235);
imagestring($im, 1, 25, 5,  $_GET["num"], $text_color);
imagepng($im, null, 9, PNG_ALL_FILTERS);
imagedestroy($im);

?>
