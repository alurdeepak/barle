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

while($row = mysql_fetch_array($result)){

    if($row['age'] <10){
        $old="Kid";
    }else{
        $old="Adult";
    }
  
   

       
  
       
 
        $name = $row['afname'];; 
    $phone = $row['mobile']; 
     
    // we building raw data 
    $codeContents  = 'BEGIN:VCARD'."\n"; 
    $codeContents .= 'FN:'.$name."\n"; 
    $codeContents .= 'TEL;WORK;VOICE:'.$phone."\n"; 
        $codeContents .= 'EMAIL;WORK:'.$row['email']."\n"; 
    $codeContents .= 'END:VCARD';     
    QRcode::png($codeContents, $tempDir. $img_num .".png", QR_ECLEVEL_L, 3);   
    
    if($count % 2 !=0){
     $buffer= "<div class=\"row\"><div class=\"col-sm-". "1\"></div><div class=\"col-sm-". "10\"><table border=0 width=100%><tr><td>";
    $buffer= $buffer . " <table border=1 width=30% class=\"table table-striped\"><tr><td colspan=\"2\" align=\"center\"><h3>UKSL - 2017</h3></td></tr><tr><td><h4>" . $row['afname'] . "</h4><h6>".$row['alname']."</h6></td><td><img src=" . $tempDir . $img_num .".png />" ."</td></tr><tr><td colspan=\"2\" align=\"center\">". $old. "</td></tr></table></td><td></td>"; 
        
    }else{
        
        echo $buffer;
        echo " <td><table width=30% border=1 class=\"table table-striped\"><tr><td colspan=\"2\" align=\"center\"><h3>UKSL - 2017</h3></td></tr><tr><td><h4>" . $row['afname'] . "</h4><h6>".$row['alname']."</h6></td><td><img src=" . $tempDir . $img_num .".png />" ."</td></tr><tr><td colspan=\"2\" align=\"center\">". $old. "</td></tr></table></td></tr></table>";
     echo "</div><div class=\"col-sm-". "1\"></div></div>";   
    }
        
  //$buffer="";
        $img_num++;
        $count++;
    
      
  
        
        $col_count++;
 
 
  
  
    
 
    
}//while


?>
     

