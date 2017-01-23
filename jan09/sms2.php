<?php

	$username = 'deepak@alur.in';
	$API = 'T4uQWfS1CXk-fYphQPqEmgSCpf22GDLlZOhv8fWF7L';
	
	// Message details
	$numbers = array(919886216714);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode('UK-G2G: Thank you for registering. We will contact you soon.');
 
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
?>