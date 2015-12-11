<?php
include_once("../../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php");
include('../../../mail/mail_helper.php');
$to[0] = $_POST['dest'];
$subject = $_POST['sujet'];
$message = $_POST['message'];
sendMail($to, $message, $subject)
?>
