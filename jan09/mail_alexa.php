<?php
require 'class.phpmailer.php';
require 'class.smtp.php';
session_start();
include 'openDB.php';


//$email="Deepak.a@technologiaworld.com";
$email="Deepak@alur.in";



//$GET_USER_BY_LOGIN='select * from at_user where username=';

$SQL_GET_USER_BY_LOGIN="select balance, revenue,margin, receivables from dat_alexa";

$result = mysql_query($SQL_GET_USER_BY_LOGIN) or die ("Checking emp data failed" . mysql_error());

$row = mysql_fetch_array($result, MYSQL_ASSOC);

   $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'ssl://sharedlinux.cloudhostdns.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'admin@uksl.org';                 // SMTP username
$mail->Password = 'Huduga@23@';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('Alexa@Etisalat', 'Etisalat Robot');
    //echo $row['email'];
$mail->addAddress($email, " Muammer");     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Etisalat Robot - Finance';
$mail->Body    =  "Hello Muammar,<br><br> Revenue is " . $row['revenue']. ", margin is " . $row['margin']. ", Balance in bank is " . $row['balance']. " and receivables is " . $row['receivables']. "<br><br>Regards,<br>Etisalat Robot<br>";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
  $_SESSION['msg']= " Sorry re pa, couldnot send mail. Please try after some time.";

echo "could not send";
} else {
  echo "Mail sent";
}
    

    
?>