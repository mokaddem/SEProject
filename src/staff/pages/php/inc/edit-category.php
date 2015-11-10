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
$Year   = $_GET['InputYear'];
$Designation = $_GET['InputDesignation'];

$reponse = $db->query("UPDATE SEProjectC.Categorie SET Year = \"".$Year."\", Designation=\"" .$Designation. "\" WHERE ".$ID."= ID");

addHistory($ID, "Catégorie", "Edition");

header("Location: ../../list.php?type=category");

?>
