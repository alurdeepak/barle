<?php
session_start();
include 'openDB.php';
include 'dquestions.php';


//$DEL_MEMBER="delete from dat_attendees where id=";
$SQL_DEL_MEMBER=$DEL_MEMBER . $_REQUEST['mid'];

$result = mysql_query($SQL_DEL_MEMBER) or die ("Deleting Member Failed" . mysql_error());

if($result){
    
    $_SESSION['msg']="Successfully deleted, " .$_SESSION['LOGIN'] . " :-) " ;

$sfurl="Location: /myattendees.php";
	header($sfurl);
    
}else{
 
$_SESSION['msg']="Sorry" .$_SESSION['LOGIN'] .", please try again.";

$sfurl="Location: /myattendees.php";
	header($sfurl);

   
}

?>