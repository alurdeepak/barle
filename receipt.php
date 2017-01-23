<?php

//session_start();


$data = $_POST;


$SQL_UPD_PAYMENT1="update payments_status SET amt=" . $data['amount']. ", paid_by_email='" . $data['buyer'] . "', paid_by_name='". $data['buyer_name']. "', phone='". $data['buyer_phone']. "', currency='" . $data['currency'] . "', insta_ded=" . $data['fees'] . ", purpose='" . $data['purpose'] . "', status='". $data['status'] . "', updated_on='" . $today. "' WHERE payment_id='" . $data['payment_id']. "'";

 
?>