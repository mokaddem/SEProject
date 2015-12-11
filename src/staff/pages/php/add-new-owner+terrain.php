<!-- Inscription d'un propriétaire avec son terrain,
fonction appelée dans le formulaire de inscription/inscription-owner.php
Redirection vers la page d'accueil utilisateur

 -->

<?php
	include_once('BDD.php');
	include "../../../mail/mail_helper.php";


	// Inscription du propriétaire avec son terrain
	$db = BDconnect();
	$req = $db->prepare("INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Rue, Number, Ville, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

	$ID	 	= '';
	$FirstName	= utf8_decode($_GET['InputPrenom']);
	$LastName	= utf8_decode($_GET['InputNom']);
	$Title		= $_GET['title'];
	$ZIPCode	= $_GET['InputCP'];
	$PhoneNumber= $_GET['InputFixe'];
	$GSMNumber	= $_GET['InputMob'];
	$Ville		= utf8_decode($_GET['InputLoc']);
	$Rue		= utf8_decode($_GET['InputAdresse']);
	$Number		= $_GET['InputBat'];
	$BirthDate	= $_GET['birth_year']."-".$_GET['birth_month']."-".$_GET['birth_day'];
	$Mail		= $_GET['InputEmailFirst'];
	$CreationDate	= date('Y-m-d');
	$IsPlayer	= 0;
	$IsOwner	= 1;
	$IsStaff	= 0;
	$req->bind_param("issiiiisissssiii", $ID, $FirstName, $LastName, $Title, $ZIPCode, $PhoneNumber, $GSMNumber, $Rue, $Number, $Ville, $BirthDate, $Mail, $CreationDate, $IsPlayer, $IsOwner, $IsStaff);
	$req->execute();

	$reponse = $db->query("SELECT ID FROM Personne WHERE FirstName=\"$FirstName\" AND LastName=\"$LastName\" AND Mail=\"$Mail\"");
	$donnes = $reponse->fetch_array();
	$ID_inserted = $donnes['ID'];


	$prep = $db->prepare('INSERT INTO Owner(ID, ID_Personne, ID_Staff) VALUES(?, ?, ?)');
	$staff = 7;
	$prep->bind_param("iii", $ID, $ID_inserted, $staff);
	$prep->execute();

	$reponse = $db->query("SELECT Owner.ID as ID FROM Owner WHERE Owner.ID_Personne=".$ID_inserted);
	$donnes = $reponse->fetch_array();
	$ID_inserted_O = $donnes['ID'];

	$req = $db->prepare("INSERT INTO Terrain(ID, adresse, surface, ID_Owner, etat, disponibiliteFrom, disponibiliteTo, CreationDate, `Type`, Note) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$ID	 	= '';
	$Adresse	= utf8_decode($_GET['InputAdresseCourt']);
	$Surface	= utf8_decode($_GET['InputSurface']);
	$ID_Owner	= $ID_inserted_O;
	$Etat		= utf8_decode($_GET['etat']);
	$DispoFrom	= $_GET['calendarF'];
	$DispoTo	= $_GET['calendarT'];
	$CreationDate	= date("Y-m-d");
	$type		= utf8_decode($_GET['type']);
	$Note		= utf8_decode($_GET['InputMessage']);


	$req->bind_param("isiissssss", $ID,$Adresse,$Surface,$ID_Owner,$Etat,$DispoFrom,$DispoTo,$CreationDate,$type,$Note);

	error_log($req->execute());

	$reponse->free();

	//email confirmation 
	$sujetR =  $db->query('SELECT Value FROM GlobalVariables WHERE id=21');
	$corpsR = $db->query('SELECT Value FROM GlobalVariables WHERE id=20');
		
	//récuperer le sujet du mail
	$listSujet;
//Corps du mail
while($suj = $sujetR->fetch_array())
{
	$listSujet[0] = $suj['Value'];
}
$listCorp;
	while($lHQ = $corpsR ->fetch_array())
	{
		$listCorp[0] = $lHQ['Value'];
	}
	$to[0]=$Mail;
	$sujet = $listSujet[0];
	$message=$listCorp[0];
	sendMail($to, $message, $sujet);

	header("Location: ../../../index.php?action=register");

?>
