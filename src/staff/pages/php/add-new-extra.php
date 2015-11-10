<?php
	include_once('BDD.php');
    require_once('add-new-history.php');

//	$db = new BDD();

    $database_host = 'localhost';
    $database_user = 'root';
    $database_pass = '123';
    $database_db = 'SEProjectC';
	$db = new mysqli($database_host, $database_user, $database_pass, $database_db);
	
	$db = new mysqli($database_host, $database_user, $database_pass, $database_db);
	
	$req = $db->prepare("INSERT INTO Extras(ID, Name, Price, Description) VALUES(?, ?, ?, ?)");


	$ID	 	= '';
	$Name   = $_GET['InputNom'];
	$Price	= $_GET['InputPrice'];
	$Description		= $_GET['InputMessage'];

	$req->bind_param("isis", $ID,$Name,$Price,$Description);

	$req->execute();

    $reponse = $db->query("SELECT * FROM Extras WHERE Name=\"".$Name ."\" AND Description=\"" . $Description ."\"");
    $donnees = $reponse->fetch_array();
    addHistory($donnees["ID"], "Extras", "Ajout");
	
	header("Location: ../list.php?type=extra");

//	$req->execute(array('ID' => '', 'FirstName' => $_GET['InputPrenom2'], 'LastName' => $_GET['InputNom2'], 'Title' => $_GET['title2'], 'ZIPCode' => $_GET['InputCP2'], 'PhoneNumber' => $_GET['Fixnum2'], 'GSMNumber' => $_GET['Gsmnum2'], 'Address' => $_GET['InputLoc2'] . "  ," . $_GET['InputAdresse2'] . " n°" . $_GET['InputBat2'] , 'BirthDate' => $_GET['InputBirth2'], 'Mail' => $_GET['InputEmailFirst2'], 'CreationDate' => time(), 'IsPlayer' => $_GET['role2'], 'IsOwner' => $_GET['role2'], 'IsStaff' => 0));
	

?>
