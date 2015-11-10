<?php
	include_once('BDD.php');
    require_once('add-new-history.php');
//	$db = new BDD();

	$database_host = 'localhost';
	$database_user = 'root';
	$database_pass = '123';

	$database_db = 'SEProjectC';
	$db = new mysqli($database_host, $database_user, $database_pass, $database_db);
	
	$req = $db->prepare("INSERT INTO Category(ID, Year, Designation) VALUES(?, ?, ?)");

//	$req = $db->prepare('INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Address, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES('', "bb", "bb", 1, 1234, 12354, 46351, "glkrzjglz e zfzef", 2015-02-02, "lzeijgze@fmezk.com", 2015-02-03, 1, 0, 0)');

	$ID	 	= '';
	$Year	=  (string) $_GET['Year'];
	$Designation	= $_GET['Designation'];

	$req->bind_param("iss", $ID, $Year, $Designation);

	$req->execute();

	$reponse = $db->query("SELECT * FROM Categorie WHERE Year = \"$Year\" AND Designation=\"$Designation\"");
	$donnees = $reponse->fetch_array();
	$ID_inserted = $donnees['ID'];

	addHistory( $donnees["ID"], "Catégorie", "Ajout");

	header("Location: ../list.php?type=categorie");

//	$req->execute(array('ID' => '', 'FirstName' => $_GET['InputPrenom2'], 'LastName' => $_GET['InputNom2'], 'Title' => $_GET['title2'], 'ZIPCode' => $_GET['InputCP2'], 'PhoneNumber' => $_GET['Fixnum2'], 'GSMNumber' => $_GET['Gsmnum2'], 'Address' => $_GET['InputLoc2'] . "  ," . $_GET['InputAdresse2'] . " n°" . $_GET['InputBat2'] , 'BirthDate' => $_GET['InputBirth2'], 'Mail' => $_GET['InputEmailFirst2'], 'CreationDate' => time(), 'IsPlayer' => $_GET['role2'], 'IsOwner' => $_GET['role2'], 'IsStaff' => 0));
	

?>
