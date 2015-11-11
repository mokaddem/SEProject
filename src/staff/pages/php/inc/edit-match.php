<?php
include_once('../BDD.php');
require_once('../add-new-history.php');

//	$db = new BDD();

$database_host = 'localhost';
$database_user = 'root';
$database_pass = '123';
$database_db = 'SEProjectC';
$db = new mysqli($database_host, $database_user, $database_pass, $database_db);

$ID	 	= $_GET['id'];
$Date = date("Y-m-d", strtotime($_GET['InputDate']));
$Hour = date("H:i", strtotime($_GET['InputHour']));
$ID_Equipe1	= $_GET['InputEq1'];
$ID_Equipe2	= $_GET['InputEq2'];
$ID_Terrain = $_GET['InputCourt'];

$reponse = $db->query("UPDATE SEProjectC.Match SET date = \"".$Date."\", Hour=\"" .$Hour. "\", ID_Equipe1=" .$ID_Equipe1. ", ID_Equipe2=" .$ID_Equipe2. ", ID_Terrain=" .$ID_Terrain. " WHERE ".$ID."= ID");

addHistory($ID, "Match", "Edition");

header("Location: ../../list.php?type=match");

?>
