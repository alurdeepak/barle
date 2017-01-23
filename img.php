<?php
//$my_img = imagecreate( 360, 180 );
//$background = imagecolorallocate( $my_img, 255, 255, 255 );
//$text_colour = imagecolorallocate( $my_img, 255, 255, 0 );
//$line_colour = imagecolorallocate( $my_img, 128, 255, 0 );
//imagestring( $my_img, 4, 30, 25, "thesitewizard.com", $text_colour );
//imagesetthickness ( $my_img, 5 );
//imageline( $my_img, 30, 45, 165, 45, $line_colour );
//
//header( "Content-type: image/png" );
//imagepng( $my_img );
//imagecolordeallocate( $line_color );
//imagecolordeallocate( $text_color );
//imagecolordeallocate( $background );
//imagedestroy( $my_img );

include('./phpqrcode/qrlib.php'); 
    include('./phpqrcode/qrconfig.php'); 

$stamp = imagecreatefrompng('img_temp.png');
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);
//imagesetthickness ($stamp, 5 );
 // we building raw data 
    $codeContents  = 'BEGIN:VCARD'."\n"; 
    $codeContents .= 'FN:'."Deepak"."\n"; 
    $codeContents .= 'TEL;WORK;VOICE:'."99809 21451"."\n"; 
        $codeContents .= 'EMAIL;WORK:'."Deepak@Alur.in"."\n"; 
    $codeContents .= 'END:VCARD';     
    QRcode::png($codeContents, "1.png", QR_ECLEVEL_L, 3);   
    
$im1 = imagecreatefrompng('1.png');
//imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
imagecopy($stamp, $im1);

header( "Content-type: image/png" );
imagepng($stamp );
imagedestroy($stamp);

?>
<h2>Gen Image</h2>
<img src="1.png">