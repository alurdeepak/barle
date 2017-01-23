<?php

include 'openDB.php';
include 'dquestions.php';
//$ADD_REGS="insert into dat_regs(fname,lname,email,mobile,pwd,num_of_adults,num_of_kids) values('";
//echo  $ADD_REGS . "<br>";
//echo $_REQUEST['fname']. "<br>";
date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());


  $SQL_GET_USER_BY_LOGIN=$GET_USER_BY_LOGIN . "'" . $_REQUEST['inputEmail'] . "'";

$result = mysql_query($SQL_GET_USER_BY_LOGIN) or die ("Checking emp data failed" . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);

     if($row){
         //   echo "user exists";
         $_SESSION['msg']="Email is already registered. Please try with differant email.";
	header("Location: /register.php");
        }
    


?>