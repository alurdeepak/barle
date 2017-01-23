<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:354419b8216fda7ec8978589ff8afe15","X-Auth-Token:53e2c6ba1dbec37ecd08926033dddef3"));
$payload = Array('purpose' => 'UK-G2G Jan 2016','amount' => '25','phone' => '9980921451','buyer_name' => 'Deepak ALUR','redirect_url' => 'http://www.example.com/redirect/', 'send_email' => false,'webhook' => 'http://www.example.com/webhook/', 'send_sms' => false, 'email' => 'Deepak@Alur.in','allow_repeated_payments' => false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
//echo $ch;
curl_close($ch); 

$decoded_json = json_decode($response);

echo $decoded_json->payment_request->longurl; //donut


echo "<br>resp is ".$response;

?>
<script>

location.href ="<?php echo  $decoded_json->payment_request->longurl ?>";
</script>