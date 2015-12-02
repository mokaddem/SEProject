<?php
include_once('BDD.php');
//function switch_player($group1, $id1, $num1,$group2, $id2, $num2)
//{
//    $group1[$num1] = $id2;
//    $group2[$num2] = $id1;
//}


// $id = Team.ID
function switch_players($id1, $id2, $day) {
    $db = BDconnect();

    // Getting group1
    if ($day == "sam" ) {
        $req1 = 'SELECT * FROM GroupSaturday WHERE '.$id1.' = ID_t1 or '.$id1.' = ID_t2 or '.$id1.'=  ID_t3 or '.$id1.'= ID_t4 or '.$id1.'= ID_t5 or '.$id1.'= ID_t6 or '.$id1.'= ID_t7 or '.$id1.'= ID_t8';
    } elseif ($day == "dim") {
        $req1 = 'SELECT * FROM GroupSunday WHERE '.$id1.' = ID_t1 or '.$id1.' = ID_t2 or '.$id1.'=  ID_t3 or '.$id1.'= ID_t4 or '.$id1.'= ID_t5 or '.$id1.'= ID_t6 or '.$id1.'= ID_t7 or '.$id1.'= ID_t8';
    }
    $reponse = $db->query($req1);
    // Get ID_GS t1 t2 t3 ...
    $group1 = $reponse ->fetch_array();

    // Getting group2
    if ($day == "sam" ) {
        $req2 = 'SELECT * FROM GroupSaturday WHERE '.$id2.' = ID_t1 or '.$id2.' = ID_t2 or '.$id2.'= ID_t3 or '.$id2.'= ID_t4 or '.$id2.'= ID_t5 or '.$id2.'= ID_t6 or '.$id2.'= ID_t7 or '.$id2.'= ID_t8';
    } elseif ($day == "dim") {
        $req2 = 'SELECT * FROM GroupSunday WHERE '.$id2.' = ID_t1 or '.$id2.' = ID_t2 or '.$id2.'= ID_t3 or '.$id2.'= ID_t4 or '.$id2.'= ID_t5 or '.$id2.'= ID_t6 or '.$id2.'= ID_t7 or '.$id2.'= ID_t8';
    }
    $reponse = $db->query($req2);
    $group2 = $reponse ->fetch_array();
    $db->query('DELETE FROM `Match` WHERE ('.$id1.' = ID_Equipe1 or '.$id1.' = ID_Equipe2) and '.$group1['ID'].'=  Poule_ID');
    $db->query('DELETE FROM `Match` WHERE ('.$id2.' = ID_Equipe1 or '.$id2.' = ID_Equipe2) and '.$group2['ID'].'=  Poule_ID');

    // First team moved to second group.
    // Pour chaque team (du groupe)
    for ($i = 1; $i < 7; $i+=1) {
        if ($group1['ID_t'.$i] == $id1) {
//             UPDATE
            if ($day == "sam" ) {
                $sql1 = 'UPDATE GroupSaturday SET ID_t'.$i.' = '.$id2.' WHERE '.$group1['ID'].'=ID';
            } elseif ($day == "dim") {
                $sql1 = 'UPDATE GroupSunday SET ID_t'.$i.' = '.$id2.' WHERE '.$group1['ID'].'=ID';
            }
        } else{
            // Create a new Match against $id2 for every team here.
            $newID = '';
            $Date = date("Y-m-d");
            $Hour = date("H:i");
            $score = 0;
            $team2ID = intval($group1['ID_t'.$i]);
            $terrain = intval($group1['ID_terrain']);
            $group_ID = intval($group1['ID']);
            $query = "INSERT INTO `Match`(ID, `date`, `hour`, ID_Equipe1, ID_Equipe2, score1, score2, ID_Terrain, Poule_ID) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $req = $db->prepare($query);
            $req->bind_param("issiiiiii", $newID, $Date, $Hour, intval($id2), $team2ID, $score, $score, $terrain, $group_ID);
            $req->execute();
        }
        if ($i == 5 && $day=="sam") {
            break;
        }
    }



    // Second team moved to first group.
    // Get ID_GS t1 t2 t3 ...
    // Pour chaque team (du groupe)
    for ($i = 1; $i < 7; $i+=1) {
        if ($group2['ID_t' . $i] == $id2) {
//          UPDATE $donnees['ID_t'.$i] = $id1;
            if ($day == "sam") {
                $sql2 = 'UPDATE GroupSaturday SET ID_t' . $i . ' = ' . $id1 . ' WHERE ' . $group2['ID'] . '=ID';
            } elseif ($day == "dim") {
                $sql2 = 'UPDATE GroupSunday SET ID_t' . $i . ' = ' . $id1 . ' WHERE ' . $group2['ID'] . '=ID';
            }
        } else{
            // Create a new Match against $id1 for every team here.
            $newID = '';
            $Date = date("Y-m-d");
            $Hour = date("H:i");
            $score = 0;
            $team2ID = intval($group2['ID_t'.$i]);
            $terrain = intval($group2['ID_terrain']);
            $group_ID = intval($group2['ID']);
            $query = "INSERT INTO `Match`(ID, `date`, `hour`, ID_Equipe1, ID_Equipe2, score1, score2, ID_Terrain, Poule_ID) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $req = $db->prepare($query);
            $req->bind_param("issiiiiii", $newID, $Date, $Hour, intval($id1), $team2ID, $score, $score, $terrain, $group_ID);
            $req->execute();
        }
        if ($i == 5 && $day=="sam") {
            break;
        }
    }

    echo $sql1."\n";
    echo $sql2;

    if ($db->query($sql1) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->error;
    }

    if ($db->query($sql2) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->error;
    }

    $reponse->free();
}

//if (array_key_exists("idteam1", $_POST) && array_key_exists("idteam2", $_POST) && is_int($_POST["idteam1"]) && is_int($_POST["idteam2"])) {

if (array_key_exists("idteam1", $_POST) && array_key_exists("idteam2", $_POST) && array_key_exists("jour", $_GET)) {
    // je sais pas pq mais faut garder inversé
    switch_players($_POST["idteam2"], $_POST["idteam1"], $_GET["jour"]);
    header("Location: ../group.php?jour=".$_GET["jour"]."&cat=".$_GET['cat']);
} else {
    echo "no data";
}
?>
