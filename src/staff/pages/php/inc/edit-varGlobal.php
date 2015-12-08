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
$ID	= $_GET['id'];
$Description = utf8_encode($_GET['InputValue']);


$reponse = $db->query("UPDATE SEProjectC.GlobalVariables SET Value = \"".$Description."\" WHERE ".$ID." = GlobalVariables.id");

addHistory($ID, "Variables Globales", "Edition");


header("Location: ../../listVarGlobal.php");


?>
