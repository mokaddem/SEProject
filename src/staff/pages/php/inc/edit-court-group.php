<?php
include_once('../BDD.php');

//	$db = BDconnect();

//$database_host = 'localhost';
//$database_user = 'root';
//$database_pass = '123';
//$database_db = 'SEProjectC';
//$db = new mysqli($database_host, $database_user, $database_pass, $database_db);
$db = BDconnect();
$ID_G = $_GET['idG'];
$ID_T = $_GET['idT'];

if ($_GET['jour'] == "sam") {
    $table = "GroupSaturday";
} elseif ($_GET['jour'] == "dim") {
    $table = "GroupSunday";    
}


$req = $db->prepare("UPDATE SEProjectC.".$table." SET ID_terrain = ? WHERE ".$ID_G."=".$table.".ID");

$req->bind_param("i", $ID_T);
$req->execute();

header("Location: ../../group.php?jour=".$_GET['jour']."&cat=1");

?>
