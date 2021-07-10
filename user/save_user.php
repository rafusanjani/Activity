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

$gateway    = new AfricasTalkingGateway("sandbox", "ead2dd2d483793037244cdfe3bab580f5b881fd39d36fa4cddd0c8d427a02f64");

$gateway->sendMessage("+256786964345", $message); 

header("Location:list_of_users.php");