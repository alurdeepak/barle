<?php

//session_start();

date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());
$data = $_POST;

//echo "MAC mismatch";
    include 'openDB.php';
include 'dquestions.php';
//include 'lindex.php';
   
    
$mac_provided = $data['mac'];  // Get the MAC from the POST data
unset($data['mac']);  // Remove the MAC key from the data.
$ver = explode('.', phpversion());
$major = (int) $ver[0];
$minor = (int) $ver[1];
if($major >= 5 and $minor >= 4){
     ksort($data, SORT_STRING | SORT_FLAG_CASE);
}
else{
     uksort($data, 'strcasecmp');
}

$mac_calculated = hash_hmac("sha1", implode("|", $data), "d0a1e85ada8744098919ffa3454151ca");
if($mac_provided == $mac_calculated){
    $link = mysqli_connect("localhost", "barle2", "toor", "barle");
    
    // $sql="insert into mas_logins(log) values('" . $today . " " . $data['amount'] . "')" ;
//$result22 = mysqli_query($link,$sql) or die ("local payment update failed" . mysql_error());
//       include 'openDB.php';
include 'dquestions.php';

$SQL_UPD_PAYMENT1="insert into dat_payments (amt,paid_by_email,paid_by_name,phone,currency,insta_ded,lurl,purpose,shorturl,status,updated_on,payment_id) values(". $data['amount']. ",'" . $data['buyer'] . "','" . $data['buyer_name'] . "','" . $data['buyer_phone'] . "','" . $data['currency'] . "'," .  $data['fees'] . ",'" . $data['longurl'] . "','" . $data['purpose'] . "','" . $data['shorturl'] ."','" . $data['status'] . "','" . $today . "','". $data['payment_id']. "')";
    

//$SQL_UPD_PAYMENT1="update dat_payments SET amt=" . $data['amount']. ",paid_by_email='" . $data['buyer'] . "',paid_by_name='". $data['buyer_name']. "',phone='". $data['buyer_phone']. "',currency='" . $data['currency'] . "',insta_ded=" . $data['fees'] . ",lurl='" . $data['longurl'] . "',purpose='" . $data['purpose'] . "',shorturl='" . $data['shorturl'] . "',status='". $data['status'] . "',updated_on='" . $today. "' WHERE payment_id='" . $data['payment_id']. "'";

    //$sql66="insert into mas_logins(log) values('" . $INS_SQL . "')" ;
//$result66 = mysqli_query($link,$sql66) or die ("local payment update failed" . mysql_error());    

    try{
$result22 = mysqli_query($link,$SQL_UPD_PAYMENT1) or die ("local payment insert update failed" . mysql_error());
    
    }catch(Exception $e){
        $sql661="insert into mas_logins(log) values('" . "error ".$e . "')" ;
$result661 = mysqli_query($link,$sql661) or die ("local payment update failed" . mysql_error());    
        
        
    }
   
//echo $result2;

        
}
else{
    //echo "MAC mismatch";
    include 'openDB.php';
include 'dquestions.php';
//include 'lindex.php';
    $sql="insert into mas_logins(log) values('" . "mac mismatch in else" . "')" ;
$result22 = mysql_query($sql) or die ("local payment update failed" . mysql_error());
    
}
?>