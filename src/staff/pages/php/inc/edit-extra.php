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
$Name   = utf8_decode($_GET['InputNom']);
$Price	= $_GET['InputPrice'];
$Description = utf8_decode($_GET['InputMessage']);


$reponse = $db->query("UPDATE SEProjectC.Extras SET Description = \"".$Description."\", Name=\"" .$Name. "\", Price=".$Price." WHERE ".$ID."=Extras.ID");

addHistory($ID, "Extra", "Edition");

header("Location: ../../list.php?type=extra");

?>
