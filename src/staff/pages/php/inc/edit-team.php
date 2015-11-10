<?php
include_once('../BDD.php');
require_once('../add-new-history.php');

//	$db = new BDD();

$database_host = 'localhost';
$database_user = 'root';
$database_pass = '123';
$database_db = 'SEProjectC';
$db = new mysqli($database_host, $database_user, $database_pass, $database_db);

$ID     = $_GET['id'];
$idp1   = $_GET['idp1'];
$idp2   = $_GET['idp2'];

$reponse = $db->query("UPDATE SEProjectC.Team SET ID_Player1 = \"".$idp1."\", ID_Player2=\"" .$idp2. "\" WHERE ".$ID."=Team.ID");

addHistory($ID, "Team", "Edition");

header("Location: ../../list-team.php");

?>
