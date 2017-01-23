<?php
include 'openDB.php';
include 'dquestions.php';
//$ADD_REGS="insert into dat_regs(fname,lname,email,mobile,pwd,num_of_adults,num_of_kids) values('";
//echo  $ADD_REGS . "<br>";
//echo $_REQUEST['fname']. "<br>";
date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());
session_start();

//first get price for the age mentioned
$result3 = mysql_query($GET_PRICES) or die ("Getting prices failed" . mysql_error());
$row3 = mysql_fetch_array($result3);

$price=0;
        
        if( $_REQUEST['age']>10){
        $price=$row3['Adult'];
        
    }
    
      if( $_REQUEST['age']>5 &&  $_REQUEST['age'] < 11){
        $price=$row3['Children'];
        
    }
    
      if( $_REQUEST['age']<6){
        $price=$row3['Infant'];
        
    }
    
    

$SQL_ADD_ATTENDEE=$ADD_ATTENDEE . "'" .$_REQUEST['fname'] . "','" . $_REQUEST['lname'] . "','" . $_REQUEST['age'] . "','" .  $_REQUEST['gender'] . "','" . $today . "'," . $_SESSION['userdbid'] . ",'',''," .$price .")";


    $result2 = mysql_query($SQL_ADD_ATTENDEE) or die ("insert attendees request  failed" . mysql_error());
    
if($result2){
    
    $_SESSION['msg']="Successfully enrolled, " .$_SESSION['LOGIN'] . " :-) " ;

$sfurl="Location: /myattendees.php";
	header($sfurl);
    
}else{
 
$_SESSION['msg']="Sorry" .$_SESSION['LOGIN'] .", please try again.";

$sfurl="Location: /myattendees.php";
	header($sfurl);

   
}



?>