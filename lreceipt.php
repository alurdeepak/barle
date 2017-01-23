<?php

//session_start();

date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());
$data = $_REQUEST;

//echo "MAC mismatch";
    include 'openDB.php';
include 'dquestions.php';
//include 'lindex.php';
   

    $link = mysqli_connect("localhost", "root", "toor", "barle");
    
     $sql="insert into mas_logins(log) values('" . $today . " " . $data['amount'] . "')" ;
$result22 = mysqli_query($link,$sql) or die ("local payment update failed" . mysql_error());
//       include 'openDB.php';
include 'dquestions.php';

//$INS_SQL="insert into dat_payments (amt,paid_by_email,paid_by_name,phone,currency,insta_ded,lurl,purpose,shorturl,status,updated_on) values(". $data['amount']. ",'" . $data['buyer'] . "','" . $data['buyer_name'] . "','" . $data['buyer_phone'] . "','" . $data['currency'] . "'," .  $data['fees'] . ",'" . $data['longurl'] . "','" . $data['purpose'] . "','" . $data['shorturl'] ."','" . $data['status'] . "','" . $today . "')";
    
//echo $INS_SQL;
$mac_provided="maced";
//$SQL_UPD_PAYMENT1="update dat_payments SET amt=" . $data['amount']. ", paid_by_email='" . $data['buyer'] . "', paid_by_name='". $data['buyer_name']. "', phone='". $data['buyer_phone']. "', currency='" . $data['currency'] . "', insta_ded=" . $data['fees'] . ", purpose='" . $data['purpose'] . "', status='". $data['status'] . "', updated_on='" . $today. "' WHERE payment_id='" . $data['payment_id']. "'";


$SQL_UPD_PAYMENT1="update dat_payments SET insta_ded=" . $data['fees'] . ", purpose='" . $data['purpose'] . "', status='". $data['status'] . "', updated_on='" . $today. "' WHERE payment_id='" . $data['payment_id']. "'";
echo $SQL_UPD_PAYMENT1;


    //$sql66="insert into mas_logins(log) values('" . $INS_SQL . "')" ;
//$result66 = mysqli_query($link,$sql66) or die ("local payment update failed" . mysql_error());    

    try{
$result22 = mysqli_query($link,$SQL_UPD_PAYMENT1) or die ("local payment insert update failed" . mysql_error());
    
    }catch(Exception $e){
        $sql661="insert into mas_logins(log) values('" . "error ".$e . "')" ;
$result661 = mysqli_query($link,$sql661) or die ("local payment update failed" . mysql_error());    
        
        
    }
   
//echo $result2;


?>