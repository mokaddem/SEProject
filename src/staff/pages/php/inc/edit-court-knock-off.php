<?php
 include_once('../BDD.php');

$db = BDconnect();
$ID_T = $_POST['idT'];
$ID_C = $_POST['idC'];
$ID_M = $_POST['idM'];

//if ($_POST['jour'] == "sam") {
//    $table = "KnockoffSaturday";
//} elseif ($_POST['jour'] == "dim") {
//    $table = "KnockoffSunday";
//}

$table = "`Match`";

error_log($ID_G.", ".$ID_T.", ".$ID_C.", ".$table.", ".$ID_M);

//$req = $db->prepare("UPDATE SEProjectC.".$table." SET ID_Terrain = ? WHERE ".$ID_G."=".$table.".ID");
$req = $db->prepare("UPDATE SEProjectC.".$table." SET ID_Terrain = ? WHERE ".$ID_M."=".$table.".ID");

$req->bind_param("i", $ID_T);
$req->execute();

header("Location: ../../knock-off.php?jour=".$_POST['jour']."&cat=".$ID_C);

?>
