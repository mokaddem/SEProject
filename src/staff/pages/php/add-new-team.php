<?php
	include_once('BDD.php');
    require_once('add-new-history.php');
//	$db = BDconnect();

//	$database_host = 'test.pydehon.me';
//	$database_user = 'team';
//	$database_pass = 'seprojectc';
	//$database_host = 'localhost';
	//$database_user = 'root';
	//$database_pass = '123';


	//$database_db = 'SEProjectC';
	//$db = new mysqli($database_host, $database_user, $database_pass, $database_db);
	$db = BDconnect();
	$req = $db->prepare("INSERT INTO Team(ID, ID_player1, ID_player2, ID_Cat, NbWinMatch) VALUES(?, ?, ?, ?, ?)");

//	$req = $db->prepare('INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Address, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES('', "bb", "bb", 1, 1234, 12354, 46351, "glkrzjglz e zfzef", 2015-02-02, "lzeijgze@fmezk.com", 2015-02-03, 1, 0, 0)');

	$ID	 	= '';
	$ID_player1	= $_GET['sel1'];
	$ID_player2	= $_GET['sel2'];
	$ID_Cat		= $_GET['InputCat'];
	$NbmatchWin	= '0';

	if ($ID_player1 == $ID_player2) {
		header("Location: ../team.php?error=player");
		return;
	} 

	$req->bind_param("iiiii", $ID, $ID_player1, $ID_player2, $ID_Cat, $NbmatchWin);

	$req->execute();

    $reponse = $db->query('SELECT * FROM Team WHERE '.$ID_player1.' = ID_Player1 AND '.$ID_player2.' = ID_Player2');
    $donnees = $reponse->fetch_array();
	
    addHistory( $donnees["ID"], "Equipe", "Ajout");
	header("Location: ../list-team.php");

//	$req->execute(array('ID' => '', 'FirstName' => $_GET['InputPrenom2'], 'LastName' => $_GET['InputNom2'], 'Title' => $_GET['title2'], 'ZIPCode' => $_GET['InputCP2'], 'PhoneNumber' => $_GET['Fixnum2'], 'GSMNumber' => $_GET['Gsmnum2'], 'Address' => $_GET['InputLoc2'] . "  ," . $_GET['InputAdresse2'] . " n°" . $_GET['InputBat2'] , 'BirthDate' => $_GET['InputBirth2'], 'Mail' => $_GET['InputEmailFirst2'], 'CreationDate' => time(), 'IsPlayer' => $_GET['role2'], 'IsOwner' => $_GET['role2'], 'IsStaff' => 0));
	

?>
