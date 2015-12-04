<?php
include_once('BDD.php');

$db = BDconnect();
$idGroup = $_GET['id'];
$textDay = $_GET['textDay'] == "sam" ? "GroupSaturday" : "GroupSunday";
removeGroup($idGroup, $db, $textDay);

header("Location: ../group.php?jour=".$_GET["jour"]."&cat=".$_GET['cat']);

function removeGroup($idGroup, $db, $textDay){
    $sql = 'DELETE FROM '.$textDay.' WHERE '. $idGroup .'= ID';
    if ($db->query($sql) === TRUE) {;
    } else {
        echo "Error updating record: " . $db->error;
    }
}

?>