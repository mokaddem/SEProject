<?php
	include_once('BDD.php');
    require_once('add-new-history.php');

//	$db = new BDD();

	$database_host = '127.0.0.1';
	$database_user = 'root';
	$database_pass = '123';
	$database_db = 'SEProjectC';
	$db = new mysqli($database_host, $database_user, $database_pass, $database_db);
	
	$req = $db->prepare("INSERT INTO Terrain(ID, adresse, surface, ID_Owner, etat, disponibiliteFrom, disponibiliteTo, CreationDate, type, Note) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


	$ID	 	= '';
	$Adresse	= $_GET['InputAdresse'];
	$Surface	= $_GET['surface'];
	$ID_Owner	= $_GET['sel3'];
	$Etat		= $_GET['sel2'];
	$DispoFrom	= '2015-05-12';
	$DispoTo	= '2015-09-14';
	$CreationDate	= '2015-05-12';
	$type		= $_GET['sel1'];
	$Note		= $_GET['InputNote'];

	$req->bind_param("isiissssss", $ID,$Adresse,$Surface,$ID_Owner,$Etat,$DispoFrom,$DispoTo,$CreationDate,$type,$Note);

	$req->execute();

    $reponse = $db->query('SELECT * FROM Terrain WHERE "'.$Adresse.'" = Adresse AND '.$ID_Owner.' = ID_Owner');    
    $donnees = $reponse->fetch_array();
    addHistory(1, $donnees["ID"], "Terrain", "Ajout");
	
	header("Location: ../list-court.php");

//	$req->execute(array('ID' => '', 'FirstName' => $_GET['InputPrenom2'], 'LastName' => $_GET['InputNom2'], 'Title' => $_GET['title2'], 'ZIPCode' => $_GET['InputCP2'], 'PhoneNumber' => $_GET['Fixnum2'], 'GSMNumber' => $_GET['Gsmnum2'], 'Address' => $_GET['InputLoc2'] . "  ," . $_GET['InputAdresse2'] . " n°" . $_GET['InputBat2'] , 'BirthDate' => $_GET['InputBirth2'], 'Mail' => $_GET['InputEmailFirst2'], 'CreationDate' => time(), 'IsPlayer' => $_GET['role2'], 'IsOwner' => $_GET['role2'], 'IsStaff' => 0));
	

?>
