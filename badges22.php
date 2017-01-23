 <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery-3.1.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
    


<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//include 'header1.php';
include 'openDB.php';
include 'dquestions.php';
include('./phpqrcode/qrlib.php'); 
    include('./phpqrcode/qrconfig.php'); 
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
    // how to build raw content - QRCode with simple Business Card (VCard) 
     
    $tempDir = "./tmp/"; 

//$GET_ALL_PAID_ATTENDEES="SELECT t3.afname,t3.alname,t3.age,t3.price,t1.status,t1.paid_on FROM dat_payments t1,lkp_payments_attendees t2, dat_attendees t3 WHERE t1.id=t2.payment_id_fk AND t3.id=t2.attendee_id_fk and t1.status='Credit'";

$result = mysql_query($GET_ALL_PAID_ATTENDEES) or die ("Getting entries failed" . mysql_error());


  $count=1;
$old="";
$col_count=1;
$img_num=11;
$buffer="";
$parent_num="";
while($row = mysql_fetch_array($result)){

    if($row['age'] <10){
        $old="Kid";
        $parent_num=getParentNumber($row['id']);
    }else{
        $old="Adult";
    }
  
   

       
  
       
 
    
    
    echo "<div class=\"row\"><div class=\"col-sm-". "4\"></div><div class=\"col-sm-". "4\">";
    
    if($row['age'] <10){
   
            $dest = imagecreatefrompng('img_temp.png');
//$src = imagecreatefrompng($tempDir. $img_num .".png");

        
imagealphablending($dest, false);
imagesavealpha($dest, true);
$text_colour = imagecolorallocate($dest, 0, 0, 0 );
        imagestring($dest,5, 7, 85, $row['afname']. " ".$row['alname'], $text_colour );
imagestring($dest, 5, 7, 105, "(Emergency Contact: ". $parent_num . ")", $text_colour ); 
//imagecopymerge($dest, $src, 105,59, 0, 0, 155, 125, 100); //have to play with these numbers for it to work for you, etc.
  
        
header('Content-Type: image/png');
imagepng($dest,"./imgs/".$img_num .".png");
        
        
        echo " <table border=1 width=25% class=\"table table-striped\"><tr><td align=\"center\"><img src=48logo.png></td><td align=\"center\"><h4>UKSL - 2017</h4></td></tr><tr><td align=\"center\"><h4>" . $row['afname'] . "</h4><h4>".$row['alname']."</h4><h5>".$old."</h5><h5>(Emergency Contact:". $parent_num .")</h5></td><td align=\"center\"><img width=100 height=100 src=" . $tempDir . $img_num .".png />" ."</td></tr></table></div><div class=\"col-sm-". "4\"></div></div>"; 
        
        
    }else{
        
        if($row['mobile']!="" && $row['mobile']!=""){
            //generate QR code only if phone and email are present
        $name = $row['afname'];; 
    $phone = $row['mobile']; 
     
    // we building raw data 
    $codeContents  = 'BEGIN:VCARD'."\n"; 
    $codeContents .= 'FN:'.$name."\n"; 
    $codeContents .= 'TEL;WORK;VOICE:'.$phone."\n"; 
        $codeContents .= 'EMAIL;WORK:'.$row['email']."\n"; 
    $codeContents .= 'END:VCARD';     
    QRcode::png($codeContents, $tempDir. $img_num .".png", QR_ECLEVEL_L, 3);   
        
        $dest = imagecreatefrompng('img_temp.png');
$src = imagecreatefrompng($tempDir. $img_num .".png");

imagealphablending($dest, false);
imagesavealpha($dest, true);
$text_colour = imagecolorallocate($dest, 0, 0, 0 );
        imagestring($dest, 5, 10, 165, $row['afname']. " ".$row['alname'], $text_colour );
//imagecopymerge($dest, $src, 105,59, 0, 0, 125, 125, 100); //have to play with these numbers for it to work for you, etc.
imagecopyresized($dest, $src,105,59,0,0,105,105,135,135);
header('Content-Type: image/png');
imagepng($dest,"./imgs/".$img_num .".png");
            
        }//if
       else{
           $dest = imagecreatefrompng('img_temp.png');

imagealphablending($dest, false);
imagesavealpha($dest, true);
$text_colour = imagecolorallocate($dest, 0, 0, 0 );
        imagestring($dest, 5, 7, 75, $row['afname']. " ".$row['alname'], $text_colour );

header('Content-Type: image/png');
imagepng($dest,"./imgs/".$img_num .".png");
           
       }//else
    }
   
        
  //$buffer="";
        $img_num++;
        $count++;
    
      
  
        
        $col_count++;
 
 
  
  
    
 
    
}//while

function getParentNumber($kidID){
    include 'openDB.php';
include 'dquestions.php';
    //$GET_PARENT_ID="SELECT * FROM dat_attendees WHERE id=(SELECT parent_id_fk FROM dat_attendees WHERE id=";
    $SQL_GET_PARENT_ID=$GET_PARENT_ID . $kidID . ")";
   //echo $SQL_GET_PARENT_ID;
    $result = mysql_query($SQL_GET_PARENT_ID) or die ("Getting entries failed" . mysql_error());
    
    $row = mysql_fetch_array($result);
    return $row['mobile'];
}


?>
     

