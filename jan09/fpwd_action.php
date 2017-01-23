<?php
require 'class.phpmailer.php';
require 'class.smtp.php';
session_start();
include 'openDB.php';
include 'dquestions.php';


$email=$_REQUEST['email'];




//$GET_USER_BY_LOGIN='select * from at_user where username=';

$SQL_GET_USER_BY_LOGIN=$GET_USER_BY_LOGIN . "'" . $email . "' limit 1";

$result = mysql_query($SQL_GET_USER_BY_LOGIN) or die ("Checking emp data failed" . mysql_error());

$row = mysql_fetch_array($result, MYSQL_ASSOC);
$rows_returned=mysql_num_rows($result);
//echo $rows_returned;
if($rows_returned==0){

$_SESSION['msg']="Sorry, we donot have any login with the mentioned email - " . $email;

$sfurl="Location: /fpwd.php";
	header($sfurl);

}else{
    
 //now create a new password and mail it.
    $fname=$row['fname'];
    date_default_timezone_set ("Asia/Calcutta"); 
$today = date('ms',time());
    
    $new_pwd=$fname . "@". $today;
    
    $SQL_UPDATE_NEW_PWD="update dat_regs set pwd='" . $new_pwd . "' where id=". $row['id'];
    //echo $SQL_UPDATE_NEW_PWD;
    $result2 = mysql_query($SQL_UPDATE_NEW_PWD) or die ("Checking emp data failed" . mysql_error());

$row2 = mysql_fetch_array($result2, MYSQL_ASSOC);
    
   $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'ssl://sharedlinux.cloudhostdns.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'admin@uksl.org';                 // SMTP username
$mail->Password = 'Huduga@23@';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('Admin@uksl.org', 'UK Sneha Loka');
    echo $row['email'];
$mail->addAddress($row['email'], $row['fname']);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Barle.in - Password Reset';
$mail->Body    = $row['fname']. ', Namaskar re pa, </b><br><br> As requested, here is the new password - <br><br><b>' . $new_pwd . "</b><br><br>Inte Nimma,<br>UKSL IT Team - www.barle.in<br><br>" ;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
  $_SESSION['msg']=$row['fname'] . " Sorry re pa, couldnot send mail. Please try after some time.";

$sfurl="Location: /login.php";
	header($sfurl);
} else {
  $_SESSION['msg']="Your new password has been mailed to you, " . $row['fname'];

$sfurl="Location: /login.php";
	header($sfurl);
}
    
}
    
?>