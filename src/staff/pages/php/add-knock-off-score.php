<?php
include_once('../BDD.php');
require_once('../add-new-history.php');

//	$db = BDconnect();

//$database_host = 'localhost';
//$database_user = 'root';
//$database_pass = '123';
//$database_db = 'SEProjectC';
//$db = new mysqli($database_host, $database_user, $database_pass, $database_db);
$db = BDconnect();

$ID	 	= $_GET['ID_Match'];
$Date = date("Y-m-d", strtotime($_GET['InputDate']));
$Hour = date("H:i", strtotime($_GET['InputHour']));
$ID_Equipe1	= $_GET['InputEq1'];
$ID_Equipe2	= $_GET['InputEq2'];
$ID_Terrain = $_GET['InputCourt'];
$score1 = $_GET['score1'];
$score2 = $_GET['score2'];


$reponse = $db->query("UPDATE SEProjectC.Match SET score2 = \"".$score2."\", score1=\"" .$score1. "\" WHERE ".$ID."= ID");

addHistory($ID, "Match-Knock", "Score");

header("Location: ../input-knock-score.php?jour=".$_GET['id']);

?>
