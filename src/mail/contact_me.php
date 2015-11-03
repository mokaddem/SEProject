<?php
// Check for empty fields
require '../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';


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

if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'florian.francotte@student.uclouvain.be'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@test.pydehon.me\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
$mail->CharSet = 'windows-1250';
$mail->SetFrom ('noreply@test.pydehon.me', '');
$mail->Subject = $email_subject;
$mail->ContentType = 'text/plain';
$mail->IsHTML(false);

$mail->Body = $email_body; 
// you may also use $mail->Body = file_get_contents('your_mail_template.html');

$mail->AddAddress ($to);     
// you may also use this format $mail->AddAddress ($recipient);

if(!$mail->Send())
{
        $error_message = "Mailer Error: " . $mail->ErrorInfo;
} else 
{
        $error_message = "Successfully sent!";
}
return true;			
?>
