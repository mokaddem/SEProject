<?php
	include_once('BDD.php');
    require_once('add-new-history.php');

//	$db = new BDD();

    $database_host = 'localhost';
    $database_user = 'root';
    $database_pass = '123';
    $database_db = 'SEProjectC';
	$db = new mysqli($database_host, $database_user, $database_pass, $database_db);
	
	$req = $db->prepare("INSERT INTO `Match`(ID, date, ID_Equipe1, ID_Equipe2, score1, score2, ID_Terrain) VALUES(?, ?, ?, ?, ?, ?, ?)");

	$ID	 	= '';
	//$Date   = $_GET['InputDate'] . " " . $_GET['InputHour'];
    $Date = date("Y-m-d");
    $ID_Equipe1	= $_GET['InputEq1'];
    $ID_Equipe2	= $_GET['InputEq2'];
    $Score1		= 0;
	$Score2		= 0;
    $ID_Terrain = $_GET['InputCourt'];

	$req->bind_param("isiiiii", $ID, $Date, $ID_Equipe1, $ID_Equipe2, $Score1, $Score2, $ID_Terrain);

	$req->execute();

    $reponse = $db->query("SELECT * FROM `Match` WHERE date = \"".$Date ."\" AND ID_Equipe1 = " . $ID_Equipe1 ." AND ID_Equipe2 = " . $ID_Equipe2 ." ");
    $donnees = $reponse->fetch_array();
    addHistory($donnees["ID"], "Match", "Ajout");
	
	header("Location: ../list.php?type=match");


?>
