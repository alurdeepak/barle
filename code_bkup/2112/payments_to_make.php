<?php
include 'openDB.php';
include 'dquestions.php';
include 'lindex.php';
 session_start();

//$GET_PAYMENTS_TO_BE_MADE='SELECT * FROM dat_attendees t1 WHERE id NOT IN (SELECT attendee_id_fk FROM lkp_payments_attendees WHERE payment_id_fk IN (SELECT id FROM dat_payments WHERE attendee_id_fk=';
$SQL_GET_PAYMENTS_TO_BE_MADE=$GET_PAYMENTS_TO_BE_MADE . $_SESSION['userdbid'] .")) AND t1.parent_id_fk=" .$_SESSION['userdbid'];

//echo $SQL_GET_PAYMENTS_TO_BE_MADE;

$result55 = mysql_query($SQL_GET_PAYMENTS_TO_BE_MADE) or die ("Getting diff payments user failed" . mysql_error());
$pay_count=0;
$total_to_pay=0;

while($row55 = mysql_fetch_array($result55)){

    if($pay_count==0){
    echo "<br><h2>Payments To Be Made</h2><br> <div class=table-responsive><table class=table table-striped><thead><tr><th>#</th><th>First Name</th><th>Last Name</th><th>Age</th><th>Price</th></tr></thead>";
        $pay_count++;
    }
    echo "<tr><td>".$pay_count."</td><td>". $row55['afname']."</td><td>".$row55['alname']."</td><td>".$row55['age']."</td><td>".$row55['price'] ."</td></tr>";
    $total_to_pay=$total_to_pay+$row55['price'];
    $pay_count++;
}
if($pay_count!=0){
    echo "</table></div>";
}

$purl=getPaymentURL($price_total,$payment_mobile,$payment_name,$payment_email);


function getPaymentURL($amt,$payment_mobile,$payment_name,$payment_email){
    
   // echo  "$payment_mobile, $payment_name,$payment_email";
    $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:354419b8216fda7ec8978589ff8afe15","X-Auth-Token:53e2c6ba1dbec37ecd08926033dddef3"));
$payload = Array('purpose' => 'UK-G2G Jan 2016','amount' => $amt,'phone' => $payment_mobile,'buyer_name' => $payment_name,'redirect_url' => 'http://www.barle.in/thanks.php', 'send_email' => false,'webhook' => 'http://www.barle.in/hook.php', 'send_sms' => false, 'email' => $payment_email,'allow_repeated_payments' => false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
//echo $ch;
curl_close($ch); 

$decoded_json = json_decode($response);

return $decoded_json->payment_request->longurl; 
    
}//function

?>