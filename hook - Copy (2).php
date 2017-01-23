<?php


$data = $_POST;
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
   
      // Payment was successful, mark it as successful in your database.
        // You can acess payment_request_id, purpose etc here.   
        
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
include 'openDB.php';
include 'dquestions.php';
//include 'lindex.php';

//now update DB
session_start();

date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());

//$UPDATE_PAYMENT='update dat_payments set amt=';
//$SQL_UPDATE_PAYMENT=$UPDATE_PAYMENT . $_REQUEST['amount']. ",paid_by_email='" . $_REQUEST['buyer'] . "',paid_by_name='". $_REQUEST['buyer_name']. "',phone='".$_REQUEST['buyer_phone']. "',currency='" . $_REQUEST['currency'] . "',insta_ded=" . $_REQUEST['fees'] . ",lurl='" . $_REQUEST['longurl'] ."',mac='" . $_REQUEST['mac'] . "',purpose='" . $_REQUEST['purpose'] . "',shorturl='" . $_REQUEST['shorturl'] . "',status='". $_REQUEST['status'] . "',updated_on='" . $today . "' where payment_id='" . $_REQUEST['payment_id'] . "' and payment_request_id='" . $_REQUEST['payment_request_id'] . "'";

$SQL_UPDATE_PAYMENT=$UPDATE_PAYMENT . urldecode($data['amount']). ",paid_by_email='" . urldecode($data['buyer']) . "',paid_by_name='". urldecode($data['buyer_name']). "',phone='". urldecode($data['buyer_phone']). "',currency='" . urldecode($data['currency']) . "',insta_ded=" . urldecode($data['fees']) . ",lurl='" . urldecode($data['longurl']) ."',mac='" . $mac_provided . "',purpose='" . urldecode($data['purpose']) . "',shorturl='" . urldecode($data['shorturl']) . "',status='". urldecode($data['status']) . "',updated_on='" . $today . "' where payment_id='" . urldecode($data['payment_id']) . "' and payment_request_id='" . urldecode($data['payment_request_id']) . "'";

$result2 = mysql_query($SQL_UPDATE_PAYMENT) or die ("local payment update failed" . mysql_error());
echo $result2;

        
}
else{
    echo "MAC mismatch";
}
?>