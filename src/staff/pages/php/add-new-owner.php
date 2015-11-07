<?php
	include_once('BDD.php');
    require_once('add-new-history.php');

//	$db = new BDD();

	$database_host = '127.0.0.1';
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
	$PhoneNumber	= $_GET['InputFixe'];
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

	$req = $db->prepare("INSERT INTO Owner(ID, ID_Personne, ID_Staff) VALUES(?, ?, ?)");

	$ID	 	= '';
	$ID_personne	= $ID_inserted;
	$ID_staff	= '7';

	$req->bind_param("iii", $ID, $ID_personne, $ID_staff);

	$req->execute();

    addHistory( $ID_inserted, "Propriétaire", "Ajout");
	
	header("Location: ../list-owner.php");


	

?>
