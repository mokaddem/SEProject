<?php
	include_once('BDD.php');
    require_once('add-new-history.php');
//	$db = new BDD();

	$database_host = 'test.pydehon.me';
	$database_user = 'team';
	$database_pass = 'seprojectc';
	$database_db = 'SEProjectC';
	$db = new mysqli($database_host, $database_user, $database_pass, $database_db);
	
	$req = $db->prepare("INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Rue, Number, Ville, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

//	$req = $db->prepare('INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Address, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES('', "bb", "bb", 1, 1234, 12354, 46351, "glkrzjglz e zfzef", 2015-02-02, "lzeijgze@fmezk.com", 2015-02-03, 1, 0, 0)');

	$ID	 	= '';
	$FirstName	= $_GET['InputPrenom1'];
	$LastName	= $_GET['InputNom1'];
	$Title		= $_GET['title1'];
	$ZIPCode	= $_GET['InputCP1'];
	$PhoneNumber	= $_GET['InputFixe1'];
	$GSMNumber	= $_GET['InputMob1'];
	$Ville		= $_GET['InputLoc1'];
	$Rue		= $_GET['InputAdresse1'];
	$Number		= $_GET['InputBat1'];
	$BirthDate	= $_GET['birth_year1']."-".$_GET['birth_month1']."-".$_GET['birth_day1'];
	$Mail		= $_GET['InputEmailFirst1'];
	$CreationDate	= date('Y-m-d');
	$IsPlayer	= 1;
	$IsOwner	= 0;
	$IsStaff	= 0;

    

	$req->bind_param("issiissssisssiii", $ID, $FirstName, $LastName, $Title, $ZIPCode, $PhoneNumber, $GSMNumber, $Ville, $Rue, $Number, $BirthDate, $Mail, $CreationDate, $IsPlayer, $IsOwner, $IsStaff);

	$req->execute();


    $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName.'" = FirstName AND "'.$LastName.'" = LastName');
    $donnees = $reponse->fetch_array();
    addHistory( $donnees["ID"], "Joueur", "Ajout");
	
    

	$req = $db->prepare("INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Rue, Number, Ville, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

	$ID	 	    = '';
	$FirstName	= $_GET['InputPrenom2'];
	$LastName	= $_GET['InputNom2'];
	$Title		= $_GET['title2'];
	$ZIPCode	= $_GET['InputCP2'];
	$PhoneNumber= $_GET['InputFixe2'];
	$GSMNumber	= $_GET['InputMob2'];
	$Ville		= $_GET['InputLoc2'];
	$Rue		= $_GET['InputAdresse2'];
	$Number		= $_GET['InputBat2'];
	$BirthDate	= $_GET['birth_year2']."-".$_GET['birth_month2']."-".$_GET['birth_day2'];
	$Mail		= $_GET['InputEmailFirst2'];
	//$CreationDate	= date('Y-m-d');
	$IsPlayer	= 1;
	$IsOwner	= 0;
	$IsStaff	= 0;

	$req->bind_param("issiissssisssiii", $ID, $FirstName, $LastName, $Title, $ZIPCode, $PhoneNumber, $GSMNumber, $Ville, $Rue, $Number, $BirthDate, $Mail, $CreationDate, $IsPlayer, $IsOwner, $IsStaff);

	$req->execute();


    $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName.'" = FirstName AND "'.$LastName.'" = LastName');    
    $donnees = $reponse->fetch_array();
    addHistory( $donnees["ID"], "Joueur", "Ajout");
	
	header("Location: ../list.php?type=player");

//	$req->execute(array('ID' => '', 'FirstName' => $_GET['InputPrenom2'], 'LastName' => $_GET['InputNom2'], 'Title' => $_GET['title2'], 'ZIPCode' => $_GET['InputCP2'], 'PhoneNumber' => $_GET['Fixnum2'], 'GSMNumber' => $_GET['Gsmnum2'], 'Address' => $_GET['InputLoc2'] . "  ," . $_GET['InputAdresse2'] . " n°" . $_GET['InputBat2'] , 'BirthDate' => $_GET['InputBirth2'], 'Mail' => $_GET['InputEmailFirst2'], 'CreationDate' => time(), 'IsPlayer' => $_GET['role2'], 'IsOwner' => $_GET['role2'], 'IsStaff' => 0));
	

?>
