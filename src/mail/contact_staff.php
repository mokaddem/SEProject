<?php
// Check for empty fields
include "mail_helper.php";

if(empty($_POST['name'])  		||
   empty($_POST['sujet']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['sujet'];
$message = $_POST['message'];
	
// Create the email and send the message
$to[0] = 'florian.francotte@student.uclouvain.be'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from the staff \n\n"."Here are the details:\n\nName: $name\n\nSujet: $sujet\n\nMessage:\n$message";

sendMail($to, $email_body, $email_subject)	
?>
