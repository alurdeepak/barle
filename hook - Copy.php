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
// You can get the 'salt' from Instamojo's developers page(make sure to log in first): https://www.instamojo.com/developers
// Pass the 'salt' without <>
$mac_calculated = hash_hmac("sha1", implode("|", $data), "<YOUR_SALT>");
if($mac_provided == $mac_calculated){
    if($data['status'] == "Credit"){
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

$SQL_UPDATE_PAYMENT=$UPDATE_PAYMENT . urldecode($_REQUEST['amount']). ",paid_by_email='" . urldecode($_REQUEST['buyer']) . "',paid_by_name='". urldecode($_REQUEST['buyer_name']). "',phone='". urldecode($_REQUEST['buyer_phone']). "',currency='" . urldecode($_REQUEST['currency']) . "',insta_ded=" . urldecode($_REQUEST['fees']) . ",lurl='" . urldecode($_REQUEST['longurl']) ."',mac='" . urldecode($_REQUEST['mac']) . "',purpose='" . urldecode($_REQUEST['purpose']) . "',shorturl='" . urldecode($_REQUEST['shorturl']) . "',status='". urldecode($_REQUEST['status']) . "',updated_on='" . $today . "' where payment_id='" . urldecode($_REQUEST['payment_id']) . "' and payment_request_id='" . urldecode($_REQUEST['payment_request_id']) . "'";

$result2 = mysql_query($SQL_UPDATE_PAYMENT) or die ("local payment update failed" . mysql_error());
echo $result2;

        }else{
        // Payment was unsuccessful, mark it as failed in your database.
        // You can acess payment_request_id, purpose etc here.
    }
}
else{
    echo "MAC mismatch";
}
?>