<?php
require 'class.phpmailer.php';
require 'class.smtp.php';

    
   $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'pharmaultimate.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'sscserver@pharmaultimate.net';                 // SMTP username
$mail->Password = 'Shreenivas@1234_';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

$mail->setFrom('sscserver@pharmaultimate.net', 'Veena Compant');
   // echo $row['email'];
$mail->addAddress("Deepak.a@technologiaworld.com", "Kapeed");     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Barle.inn - Password Reset';
$mail->Body    = ', Namaskar re pa, </b><br><br> As requested, here is the new password - <br><br><b>' . "new_pwd" . "</b><br><br>Inte Nimma,<br>UKSL IT Team - www.barle.in<br><br>" ;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
  echo " Sorry re pa, couldnot send mail. Please try after some time.";

$sfurl="Location: /login.php";
	//header($sfurl);
} else {
  echo "Ree  Your new password has been mailed to you, ";

$sfurl="Location: /login.php";
	//header($sfurl);
}
    

    
?>