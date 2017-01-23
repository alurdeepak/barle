<?php

$files=scandir("./bad_imgs");

$zip = new ZipArchive();
$zip->open('badgess.zip',ZIPARCHIVE::CREATE);

for($i=2;$i==sizeof($files);$i++){
    echo $files[$i]. "<br>";
$zip->addFile($files[$i]);    
    
}

    $zip->close();
?>