<?php
include_once('BDD.php');

$db = BDconnect();
$idGroup = $_GET['id'];
$teamID = $_GET['teamID'];
$textDay = $_GET['textDay'] == "sam" ? "GroupSaturday" : "GroupSunday";
promote_leader($idGroup, $teamID, $db, $textDay);

header("Location: ../group.php?jour=".$_GET["jour"]."&cat=".$_GET['cat']);

function promote_leader($idGroup, $teamID, $db, $textDay){
    $sql = 'UPDATE '.$textDay.' SET ID_Leader='.$teamID.' WHERE '. $idGroup .'= ID';
    if ($db->query($sql) === TRUE) {;
    } else {
        echo "Error updating record: " . $db->error;
    }
}

?>