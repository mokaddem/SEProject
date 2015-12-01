<?php
include_once('../BDD.php');

$db = BDconnect();
$ID_G = $_GET['idG'];
$ID_T = $_GET['idT'];
$ID_C = $_GET['idC'];

if ($_GET['jour'] == "sam") {
    $table = "GroupSaturday";
} elseif ($_GET['jour'] == "dim") {
    $table = "GroupSunday";    
}


$req = $db->prepare("UPDATE SEProjectC.".$table." SET ID_terrain = ? WHERE ".$ID_G."=".$table.".ID");

$req->bind_param("i", $ID_T);
$req->execute();

header("Location: ../../group.php?jour=".$_GET['jour']."&cat=".$ID_C);

?>
