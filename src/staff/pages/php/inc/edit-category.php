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
$ID	 	= $_GET['id'];
$Age   = $_GET['De']." - ".$_GET['A'];
//$Year   = $_GET['InputYear'];
$Designation = utf8_decode($_GET['InputDesignation']);

$reponse = $db->query("UPDATE SEProjectC.Categorie SET Age = \"".$Age."\", Designation=\"" .$Designation. "\" WHERE ".$ID."= ID");

addHistory($ID, utf8_decode("Catégorie"), "Edition");

header("Location: ../../list.php?type=category");

?>
