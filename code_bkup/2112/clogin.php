
<?php



//ob_start();
//include 'header1.php';

//include 'index.php';
?>
<?php
session_start();
include 'openDB.php';
include 'dquestions.php';
//validates login Info
//include ('LogManager.php');
//$log=new LogManager();

$email=$_REQUEST['email'];
$empcode=$_REQUEST['code'];



//$GET_USER_BY_LOGIN='select * from at_user where username=';

$SQL_GET_USER_BY_LOGIN=$GET_USER_BY_LOGIN . "'" . $email . "'";

$result = mysql_query($SQL_GET_USER_BY_LOGIN) or die ("Checking emp data failed" . mysql_error());
$count=0;
$row_id=0;
$row = mysql_fetch_array($result, MYSQL_ASSOC);

//echo "DB " .$row['md5_password']. "<br>";
//echo "online " . $md5_code. "<br>";


if($row['pwd']==$empcode){
//echo "pwd matches ";
session_start();
$_SESSION['LOGIN']=$row['fname'];
$_SESSION['userdbid']=$row['id'];
//$_SESSION['empname']=$row['first_name'];
$sfurl="Location: /myattendees.php";
	header($sfurl);

}else{
$_SESSION['msg']="Authentication Failed. Please try again.";

$sfurl="Location: /login.php";
	header($sfurl);

}




?>