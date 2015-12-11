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
$FirstName	= utf8_decode($_GET['InputPrenom']);
$LastName	= utf8_decode($_GET['InputNom']);
$Title		= $_GET['title'];
$ZIPCode	= $_GET['InputCP'];
$PhoneNumber= $_GET['InputFixe'];
$GSMNumber	= $_GET['InputMob'];
$Ville		= utf8_decode($_GET['InputLoc']);
$Rue		= utf8_decode($_GET['InputAdresse']);
$Number		= $_GET['InputBat'];
$BirthDate	= $_GET['birth_year']."-".$_GET['birth_month']."-".$_GET['birth_day'];
$Mail		= $_GET['InputEmailFirst'];

$req = $db->prepare("UPDATE SEProjectC.Personne SET FirstName = ?,LastName = ?,Title = ?,ZIPCode =?,PhoneNumber = ?,GSMNumber = ?,Ville = ?,Rue = ?,Number = ?,BirthDate = ?,Mail = ? WHERE ".$ID."=Personne.ID");

$req->bind_param("ssiissssiss", $FirstName, $LastName, $Title, $ZIPCode, $PhoneNumber, $GSMNumber, $Ville, $Rue, $Number, $BirthDate, $Mail);

$req->execute();

addHistory($ID, utf8_decode("Propriétaire"), "Edition");

header("Location: ../../list.php?type=owner");

?>
