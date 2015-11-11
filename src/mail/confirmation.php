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

if(empty($_POST['InputNom1'])  		||
   empty($_POST['InputEmailFirst1'])    ||	
   (!\filter_var($_POST['InputEmailFirst1'], FILTER_VALIDATE_EMAIL)))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['InputNom1'];
$email_address = $_POST['InputEmailFirst1'];

// Génération aléatoire d'une clé
$cle = md5(microtime(TRUE)*100000);
 
 
// Insertion de la clé dans la base de données (à adapter en INSERT si besoin)
//$stmt = $dbh->prepare("UPDATE membres SET cle=:cle WHERE login like :login");
//$stmt->bindParam(':cle', $cle);
//$stmt->bindParam(':login', $login);
//$stmt->execute();
 
 
// Préparation du mail contenant le lien d'activation
$destinataire = $email_address;
$sujet = "Activer votre compte" ;
$entete = "From: inscription@votresite.com" ;
 
// Le lien d'activation est composé du login(log) et de la clé(cle)
$message = 'Bienvenue sur VotreSite,
 
Pour activer votre compte, veuillez cliquer sur le lien ci dessous
ou copier/coller dans votre navigateur internet.
 
https://test.pydehon.me/mail/validation.php?log='.urlencode($name).'&cle='.urlencode($cle).'
 
 
---------------
Ceci est un mail automatique, Merci de ne pas y répondre.';
 
$to[0] = $destinataire;
sendMail($to, $message, $sujet);
?>
