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

$ID	 	    = $_GET['id'];
$adresse    = utf8_decode($_GET['InputAdresse']);
$surface	= utf8_decode($_GET['surface']);
$ID_Owner   = $_GET['owner'];
$etat       = utf8_decode($_GET['etat']);
$disponibiliteFrom  =  $_GET['calendarF'];
$disponibiliteTo    =  $_GET['calendarT'];
$Type    = utf8_decode($_GET['type']);
$Note    = utf8_decode($_GET['InputNote']);


$req = $db->prepare("UPDATE SEProjectC.Terrain SET adresse = ?,surface = ?,ID_Owner = ?,etat =?,disponibiliteFrom = ?,disponibiliteTo = ?,Type = ?,Note = ? WHERE ".$ID."=Terrain.ID");

$req->bind_param("siisssss", $adresse, $surface, $ID_Owner, $etat, $disponibiliteFrom, $disponibiliteTo, $Type, $Note);
$req->execute();


addHistory($ID, "Terrain", "Edition");

header("Location: ../../list.php?type=court");

?>
