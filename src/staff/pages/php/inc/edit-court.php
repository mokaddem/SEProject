<?php
include_once('../BDD.php');
require_once('../add-new-history.php');

//	$db = new BDD();

$database_host = 'localhost';
$database_user = 'root';
$database_pass = '123';
$database_db = 'SEProjectC';
$db = new mysqli($database_host, $database_user, $database_pass, $database_db);

$ID	 	    = $_GET['id'];
$adresse    = $_GET['InputAdresse'];
$surface	= $_GET['surface'];
$ID_Owner   = $_GET['owner'];
$etat       = $_GET['etat'];
$disponibiliteFrom  =  $_GET['calendarF'];
$disponibiliteTo    =  $_GET['calendarT'];
$Type    = $_GET['type'];
$Note    = $_GET['InputNote'];


$req = $db->prepare("UPDATE SEProjectC.Terrain SET adresse = ?,surface = ?,ID_Owner = ?,etat =?,disponibiliteFrom = ?,disponibiliteTo = ?,Type = ?,Note = ? WHERE ".$ID."=Terrain.ID");

$req->bind_param("siisssss", $adresse, $surface, $ID_Owner, $etat, $disponibiliteFrom, $disponibiliteTo, $Type, $Note);
$req->execute();


addHistory($ID, "court", "Edition");

header("Location: ../../list.php?type=court");

?>
