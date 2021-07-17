<?php
require('sql_connection.php');
require('../AfricasTalkingGateway.php');

$pName = $_POST['person_name'];

$pNumber = $_POST['phone_number'];

$emailAddress = $_POST['email_address'];

$district = $_POST['district_id'];

$user_password = md5($_POST['user_password']);

$confirm_user_password = md5($_POST['confirm_user_password']);

if($user_password != $confirm_user_password) {

	echo "Passwords did not match";

	exit();
	
}

$sql_connection->query("INSERT INTO users(NAME,DISTRICT_ID,PHONE_NUMBER,PASSWORD,EMAIL_ADDRESS)VALUES('$pName','$district','$pNumber','$user_password','$emailAddress')");

$message = "Hello ".$pName.", Thank you for creating an account with NEMA tree tracker. You will login with your email and your password, Our team leader will contact you shortly for more information" ; 

$gateway    = new AfricasTalkingGateway("sandbox", "19ed6b3869b3084e38f880d4d4ec287d576011b978afc5493fa96f91c56a1f80");

$gateway->sendMessage("+256786964345", $message); 

header("Location:list_of_users.php");