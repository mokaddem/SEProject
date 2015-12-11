<?php
// Check for empty fields

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

    $nbr=count($dest);

  	$nbrDefois=(int)($nbr/50);		//Pour compteur le nombre de fois il faudra passer dans la boucle
  	$nbrModulo=$nbr%50;		//Pour avoir le reste et savoir s'arreter au bon moment

    // error_log("NBR FOIS : $nbrDefois");
    // error_log("MODULOOOO : $nbrModulo");
    $k=0;
    // error_log("$k=0;$k<$nbrDefois;$k++");
  	for($k=0;$k<$nbrDefois;$k++)
  	{
  		for($i=0+($k*50);$i<50+(50*$k);$i++)
  		{
  				$mail->CharSet = 'windows-1250';
  				$mail->SetFrom ('noreply@test.pydehon.me', '');
  				$mail->Subject = $subject;
  				$mail->ContentType = 'text/plain';
  				$mail->IsHTML(false);
  				$mail->Body = $message;
  				$mail->AddAddress($dest[$i]);
          // error_log("PREMIERE BOUCLE = ".$i);
          // error_log("ADRESSE MAIL = ".$dest[$i]);
  		}
      // On envoit
  		if(!$mail->Send()){
  			$error_message = "Mailer Error: " . $mail->ErrorInfo;
         	 } else {
              $error_message = "Successfully sent!";
           }
      //On vide la liste des mails à qui on vient d'envoyer
      $mail->ClearAddresses();
  	}
  	for($i=0+(50*$nbrDefois);$i<$nbrModulo+(50*$nbrDefois);$i++)
  		{
  				$mail->CharSet = 'windows-1250';
  				$mail->SetFrom ('noreply@test.pydehon.me', '');
  				$mail->Subject = $subject;
  				$mail->ContentType = 'text/plain';
  				$mail->IsHTML(false);
  				$mail->Body = $message;
  				$mail->AddAddress($dest[$i]);
          // error_log("INDIIIICE = ".$i);
          // error_log("ADRESSE MAIL = ".$dest[$i]);
  		}
  		if(!$mail->Send()){
  			$error_message = "Mailer Error: " . $mail->ErrorInfo;
         	 } else {
              $error_message = "Successfully sent!";
           }
  }
?>
