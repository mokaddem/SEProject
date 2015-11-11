<?php
	include_once('BDD.php');
    require_once('add-new-history.php');

//	$db = new BDD();
	$database_host = 'localhost';
	$database_user = 'root';
	$database_pass = '123';

	$database_db = 'SEProjectC';
	$db = new mysqli($database_host, $database_user, $database_pass, $database_db);
	
	$req = $db->prepare("INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Rue, Number, Ville, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

	$ID	 	= '';
	$FirstName	= $_GET['InputPrenom'];
	$LastName	= $_GET['InputNom'];
	$Title		= $_GET['title'];
	$ZIPCode	= $_GET['InputCP'];
	$PhoneNumber= $_GET['InputFixe'];
	$GSMNumber	= $_GET['InputMob'];
	$Ville		= $_GET['InputLoc'];
	$Rue		= $_GET['InputAdresse'];
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

	$reponse = $db->query("SELECT Owner.ID as ID FROM Owner WHERE Owner.ID_Personne=".$ID_inserted);
	$donnes = $reponse->fetch_array();
	$ID_inserted_O = $donnes['ID'];

	$req = $db->prepare("INSERT INTO Terrain(ID, adresse, surface, ID_Owner, etat, disponibiliteFrom, disponibiliteTo, CreationDate, type, Note) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$ID	 	= '';
	$Adresse	= $_GET['InputAdresseCourt'];
	$Surface	= $_GET['InputSurface'];
	$ID_Owner	= $ID_inserted_O;
	$Etat		= $_GET['etat'];
	$DispoFrom	= $_GET['calendarF'];
	$DispoTo	= $_GET['calendarT'];
	$CreationDate	= date("Y-m-d");
	$type		= $_GET['type'];
	$Note		= $_GET['InputMessage'];

	$req->bind_param("isiissssss", $ID,$Adresse,$Surface,$ID_Owner,$Etat,$DispoFrom,$DispoTo,$CreationDate,$type,$Note);

	$req->execute();

	header("Location: ../list.php?type=owner");

?>
