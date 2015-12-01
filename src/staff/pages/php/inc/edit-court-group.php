<?php
include_once('../BDD.php');

$db = BDconnect();
$ID_G = $_POST['idG'];
$ID_T = $_POST['idT'];
$ID_C = $_POST['idC'];

if ($_POST['jour'] == "sam") {
    $table = "GroupSaturday";
} elseif ($_POST['jour'] == "dim") {
    $table = "GroupSunday";    
}


$req = $db->prepare("UPDATE SEProjectC.".$table." SET ID_terrain = ? WHERE ".$ID_G."=".$table.".ID");

$req->bind_param("i", $ID_T);
$req->execute();

header("Location: ../../group.php?jour=".$_GET['jour']."&cat=".$ID_C);

?>
