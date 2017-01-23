<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//include 'header1.php';
include 'openDB.php';
include 'dquestions.php';

session_start();


$sql="update dat_regs set fname='" . $_REQUEST['fname'] . "',lname='" . $_REQUEST['lname'] . "',email='" . $_REQUEST['inputEmail']. "',mobile='" . $_REQUEST['mobnum'] . "',pwd='" . $_REQUEST['inputPassword'].  "',address=\"" .$_REQUEST['address']."\",pincode='" . $_REQUEST['pcode'] ."',nativeplace='" . $_REQUEST['nplace'] . "',college='" . $_REQUEST['college'] . "',yop='" $_REQUEST['yop'] . "',intro='" . $_REQUEST['intro'] . "',expect='" . $_REQUEST['expect']. "',contribute='" . $_REQUEST['contri'] ."' where id=". $_SESSION['userdbid'];

//echo $sql;
$result = mysql_query($sql) or die ("Getting entries failed" . mysql_error());


if($result){
$_SESSION['msg']="Update aatu, " . $_SESSION['LOGIN'];
	header("Location: /myprofile.php");
}else{
$_SESSION['msg']="Update failed. Please try again.";
	header("Location: /myprofile.php");
}
?>