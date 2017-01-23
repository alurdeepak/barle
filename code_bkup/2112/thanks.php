<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
include 'openDB.php';
include 'dquestions.php';
include 'lindex.php';

//now update DB
session_start();

date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());

//$ADD_PMT='insert into dat_payments(attendee_id_fk,payment_id,payment_request_id,paid_on,status) values(';
$SQL_ADD_PMT=$ADD_PMT . $_SESSION['userdbid'] . ",'" . $_REQUEST['payment_id'] . "','" . $_REQUEST['payment_request_id'] . "','" . $today ."','". "Payment Made - Awaiting Confirmation')";
//echo $SQL_ADD_PMT;
$result2 = mysql_query($SQL_ADD_PMT) or die ("local payment update failed" . mysql_error());
$row_id=mysql_insert_id();

//now update the payment ID for EACH attendee 
//first get all the attendees for the payment and thenn update the table with same payment ID

//$GET_MY_FAMILY_DETS='select t1.afname, t1.alname, t1.age,t1.gender, t1.created_on, t2.fname,t2.lname, t2.email, t2.mobile, t2.regon from dat_attendees t1,dat_regs t2 where t2.id=t1.parent_id_fk';
//session_start();

$SQL_GET_MY_FAMILY_DETS=$GET_MY_FAMILY_DETS . " and t2.id=" . $_SESSION['userdbid'];
//echo $SQL_GET_MY_FAMILY_DETS;

$result3 = mysql_query($SQL_GET_MY_FAMILY_DETS) or die ("Getting entries failed" . mysql_error());

//if payment is made 2nd time by the same user, then update lkp table with the new entry only
//first get all existing entries in lkp table for the same attendee id

function checkUserExists($aid){
    
$SQL="select * from lkp_payments_attendees where attendee_id_fk=".$aid;    
    
    $result3 = mysql_query($SQL) or die ("Getting lkp entries failed" . mysql_error());
    $user_exists=0;
while($row3 = mysql_fetch_array($result3)){
$user_exists++;
    
}
    if($user_exists==0){
        //user doesnot exist
        return false;
    }else{
        return true;
    }
    
}//function


while($row3 = mysql_fetch_array($result3)){

//$ADD_PAYMENT_ATTENDEES='insert into lkp_payments_attendees (attendee_id_fk,payment_id_fk) values(';
if(!checkUserExists($row3['mid'])){
    $SQL_ADD_PAYMENT_ATTENDEES=$ADD_PAYMENT_ATTENDEES . $row3['mid'] . "," .$row_id. ",'" .$_SERVER['REMOTE_ADDR'] ."')";
    $result4 = mysql_query($SQL_ADD_PAYMENT_ATTENDEES) or die ("insert payment lkp failed" . mysql_error());
}

}//while
    
if($result2){
    
    $_SESSION['msg']="Successfully Paid, " .$_SESSION['LOGIN'] . " :-) Tappada Barre!" ;

$sfurl="Location: /myattendees.php";
	header($sfurl);
    
}else{
 
$_SESSION['msg']="Sorry" .$_SESSION['LOGIN'] .", please try again.";

$sfurl="Location: /myattendees.php";
	header($sfurl);

   
}
    

?>