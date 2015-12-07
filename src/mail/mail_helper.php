<?php
// Check for empty fields
include_once("../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php");
include_once("../../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php");

function sendMail($dest, $message, $subject){
    $mail = new PHPMailer();

    $mail->IsSMTP();                       // telling the class to use SMTP

    $mail->SMTPDebug = 0;
    // 0 = no output, 1 = errors and messages, 2 = messages only.

    $mail->SMTPAuth = true;                // enable SMTP authentication
    $mail->SMTPSecure = "tls";              // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com";        // sets Gmail as the SMTP server
    $mail->Port = 587;                     // set the SMTP port for the GMAIL

    $mail->Username = "seproject2015c@gmail.com";  // Gmail username
    $mail->Password = "seprojectc";      // Gmail password
    foreach ($dest as $currentDest) {
        $mail->CharSet = 'windows-1250';
        $mail->SetFrom ('noreply@test.pydehon.me', '');
        $mail->Subject = $subject;
        $mail->ContentType = 'text/plain';
        $mail->IsHTML(false);
        $mail->Body = $message;
        $mail->AddAddress($currentDest);
        if(!$mail->Send()){
           $error_message = "Mailer Error: " . $mail->ErrorInfo;
        } else {
                $error_message = "Successfully sent!";
        }
    }
}
?>
