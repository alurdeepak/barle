<?php
include 'openDB.php';
include 'dquestions.php';
//$ADD_REGS="insert into dat_regs(fname,lname,email,mobile,pwd,num_of_adults,num_of_kids) values('";
//echo  $ADD_REGS . "<br>";
//echo $_REQUEST['fname']. "<br>";
date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());



    //check if the user already exist
    $SQL_GET_USER_BY_LOGIN=$GET_USER_BY_LOGIN . "'" . $_REQUEST['inputEmail'] . "'";

$result99 = mysql_query($SQL_GET_USER_BY_LOGIN) or die ("Checking emp data failed" . mysql_error());
$user_exists=0;
while($row99 = mysql_fetch_array($result99)){
$user_exists++;
    
}

echo $user_exists;

     if($user_exists!=0){
         //   echo "user exists";
         session_start();
         $_SESSION['msg']="Email is already registered. Please try with differant email.";
	header("Location: /register.php");
        }else{
    




$SQL_ADD_REGS=$ADD_REGS . $_REQUEST['fname'] . "','" . $_REQUEST['lname'] . "','" . $_REQUEST['inputEmail'] . "','" . $_REQUEST['mobnum']. "','" . $_REQUEST['inputPassword'] . "','" . $today . "','" .$_SERVER['REMOTE_ADDR'] . "',\"" . $_REQUEST['address']. "\",'". $_REQUEST['pcode']. "','". $_REQUEST['nplace'] . "','" . $_REQUEST['college'] . "','" . $_REQUEST['yop'] . "','" . $_REQUEST['intro'] . "','" . $_REQUEST['expect'] . "','" . $_REQUEST['contri'].   "')";

//echo $SQL_ADD_REGS;

//$ADD_ATTENDEE='insert into dat_attendees(afname,alname,age,gender,created_on,parent_id_fk) values(';





$result = mysql_query($SQL_ADD_REGS) or die ("insert request  failed" . mysql_error());
$dbid=mysql_insert_id();

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


$SQL_ADD_ATTENDEE=$ADD_ATTENDEE . "'" .$_REQUEST['fname'] . "','" . $_REQUEST['lname'] . "','" . $_REQUEST['age'] . "','" .  $_REQUEST['gender'] . "','" . $today . "'," . $dbid . ",'" . $_REQUEST['mobnum']. "','" . $_REQUEST['inputEmail'] . "',". $price .")";

if($result){ 
    $result2 = mysql_query($SQL_ADD_ATTENDEE) or die ("insert attendees request  failed" . mysql_error());
    session_start();
$_SESSION['LOGIN']=$_REQUEST['fname'];
    
$_SESSION['userdbid']=$dbid;
    
}

	$username = 'deepak@alur.in';
	$API = 'T4uQWfS1CXk-fYphQPqEmgSCpf22GDLlZOhv8fWF7L';
	
	// Message details
	$numbers = array($_REQUEST['mobnum']);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode('UK-G2G: Thank you for registering. We will contact you soon - www.barle.in');
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('username' => $username, 'apiKey' => $API, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('http://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;



if($result){
$_SESSION['msg']="Thank you, you can now add your family members and proceed for payment.";
	header("Location: /myattendees.php");
}else{
$_SESSION['msg']="Update failed. Please try again.";
	header("Location: /register.php");
}
     }//else

?>