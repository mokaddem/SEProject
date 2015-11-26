<?php
// Check for empty fields
include "mail_helper.php";

if(empty($_POST['dest'])  		||
   empty($_POST['sujet']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$dest = $_POST['dest'];
$sujetMail = $_POST['sujet'];
$message = $_POST['message'];
	
// Create the email and send the message
$to[0] = $dest; 
$email_subject = $sujetMail;
$email_body = "You have received a new message from the staff \n\n"."Here are the details:\n\nSujet: $sujetMail\n\nMessage:\n$message";

sendMail($to, $email_body, $email_subject)	
?>
