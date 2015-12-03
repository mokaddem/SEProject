<?php
include_once('../BDD.php');

$db = BDconnect();
$ID_G = $_POST['idG'];
$ID_T = $_POST['idT'];
$ID_C = $_POST['idC'];
$idTeamDefault = -1;
$idLeaderDefault = 0;


if ($_POST['jour'] == "sam") {
    $table = "GroupSaturday";
} elseif ($_POST['jour'] == "dim") {
    $table = "GroupSunday";
}

$query="INSERT INTO `SEProjectC`.".$table." (`ID`, `ID_terrain`, `ID_t1`, `ID_Leader`) VALUES (NULL,".$ID_T.", ".$idTeamDefault.", ".$idLeaderDefault.")";
$req = $db->query($query);

?>