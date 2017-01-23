<?php
$dest = imagecreatefrompng('img_temp.png');
$src = imagecreatefrompng('1.png');

imagealphablending($dest, false);
imagesavealpha($dest, true);
$text_colour = imagecolorallocate($dest, 0, 0, 0 );
imagecopymerge($dest, $src, 230,69, 0, 0, 155, 125, 100); //have to play with these numbers for it to work for you, etc.
imagestring($dest, 6, 60, 85, "Deepak ALUR", $text_colour );
header('Content-Type: image/png');
imagepng($dest,"./imgs/2.png");

?>