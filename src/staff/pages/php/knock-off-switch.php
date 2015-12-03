<?php
include_once('BDD.php');

// $id = Team.ID
function switch_players($id1, $id2, $day) {
    $db = BDconnect();

    if ($_GET['jour'] == "sam") {
        $req1 = 'SELECT * FROM KnockoffSaturday,`Match` WHERE `Match`.ID = KnockoffSaturday.ID_Match AND KnockoffSaturday.Category = ' . $_GET['cat'] . ' AND (`Match`.ID_Equipe1 = ' . $id1 . ' OR `Match`.ID_Equipe2 = ' . $id1 . ') ORDER BY `Position` ASC';
        $match1 = $db->query($req1)->fetch_array();
        $req2 = 'SELECT * FROM KnockoffSaturday,`Match` WHERE `Match`.ID = KnockoffSaturday.ID_Match AND KnockoffSaturday.Category = ' . $_GET['cat'] . ' AND (`Match`.ID_Equipe1 = ' . $id2 . ' OR `Match`.ID_Equipe2 = ' . $id2 . ') ORDER BY `Position` ASC';
        $match2 = $db->query($req2)->fetch_array();
    } elseif ($_GET['jour'] == "dim") {
        $req1 = 'SELECT * FROM KnockoffSunday,`Match` WHERE `Match`.ID = KnockoffSunday.ID_Match AND KnockoffSunday.Category = ' . $_GET['cat'] . ' AND (`Match`.ID_Equipe1 = ' . $id1 . ' OR `Match`.ID_Equipe2 = ' . $id1 . ') ORDER BY `Position` ASC';
        $match1 = $db->query($req1)->fetch_array();
        $req2 = 'SELECT * FROM KnockoffSunday,`Match` WHERE `Match`.ID = KnockoffSunday.ID_Match AND KnockoffSunday.Category = ' . $_GET['cat'] . ' AND (`Match`.ID_Equipe1 = ' . $id2 . ' OR `Match`.ID_Equipe2 = ' . $id2 . ') ORDER BY `Position` ASC';
        $match2 = $db->query($req2)->fetch_array();
    }

    if ($match1['ID_Equipe1'] == $id1){
        $db->query('UPDATE `Match` SET ID_Equipe1 = '.$id2.' WHERE ID = '.$match1['ID']);
    } elseif ($match1['ID_Equipe2'] == $id1){
        $db->query('UPDATE `Match` SET ID_Equipe2 = '.$id2.' WHERE ID = '.$match1['ID']);
    }
    if ($match2['ID_Equipe1'] == $id2){
        $db->query('UPDATE `Match` SET ID_Equipe1 = '.$id1.' WHERE ID = '.$match2['ID']);
    } elseif ($match2['ID_Equipe2'] == $id2){
        $db->query('UPDATE `Match` SET ID_Equipe2 = '.$id1.' WHERE ID = '.$match2['ID']);
    }
}

if (array_key_exists("idteam1", $_POST) && array_key_exists("idteam2", $_POST) && array_key_exists("jour", $_GET)) {
    // je sais pas pq mais faut garder inverser
    switch_players($_POST["idteam2"], $_POST["idteam1"], $_GET["jour"]);
    header("Location: ../knock-off.php?jour=".$_GET["jour"]."&cat=".$_GET['cat']);
} else {
    echo "no data";
}
?>