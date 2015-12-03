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
    $teamNumberG1 = $_POST['teamNumberG2'];
    $teamNumberG2 = $_POST['teamNumberG1'];
    $groupID1 = $_POST['groupID2'];
    $groupID2 = $_POST['groupID1'];

    // Getting group1
    if ($day == "sam") {
        $req1 = 'SELECT * FROM GroupSaturday WHERE ID=' . $groupID1;
    } elseif ($day == "dim") {
        $req1 = 'SELECT * FROM GroupSaturday WHERE ID=' . $groupID1;
    }
    $reponse = $db->query($req1);
    // Get ID_GS t1 t2 t3 ...
    $group1 = $reponse->fetch_array();

    // Getting group2
    if ($day == "sam") {
        $req2 = 'SELECT * FROM GroupSaturday WHERE ID=' . $groupID2;
    } elseif ($day == "dim") {
        $req2 = 'SELECT * FROM GroupSunday WHERE ID=' . $groupID2;
    }
    $reponse = $db->query($req2);
    $group2 = $reponse->fetch_array();

    if($id1<0 and $id2<0){return;}
    if($id1<0 or $id2<0) {
        $posId = $id1 > 0 ? $id1 : $id2;
        $posGroup = $id1 > 0 ? $group1 : $group2;
        $negGroup = $id1 > 0 ? $group2 : $group1;
        $teamNumberNeg = $id1 > 0 ? $teamNumberG2 : $teamNumberG1;
        $teamNumberPos = $id1 > 0 ? $teamNumberG1 : $teamNumberG2;

        $arrayRep = removeTeam($posId, $posGroup, $day, $teamNumberPos, $db);
        deleteMatch($posId, $posGroup, $db);
        shiftTeams($arrayRep[0],  $posGroup, $day, $teamNumberPos, $arrayRep[1], $db);
        addTeam($posId, $negGroup, $day, $db);
        addMatch($posId, $negGroup, $teamNumberNeg, $db);
    }
    else {
        $db->query('DELETE FROM `Match` WHERE (' . $id1 . ' = ID_Equipe1 or ' . $id1 . ' = ID_Equipe2) and ' . $group1['ID'] . '=  Poule_ID');
        $db->query('DELETE FROM `Match` WHERE (' . $id2 . ' = ID_Equipe1 or ' . $id2 . ' = ID_Equipe2) and ' . $group2['ID'] . '=  Poule_ID');

        // First team moved to second group.
        // Pour chaque team (du groupe)
        for ($i = 1; $i < 9; $i += 1) {
            if ($group1['ID_t' . $i] == $id1) {
                //             UPDATE
                if ($day == "sam") {
                    $sql1 = 'UPDATE GroupSaturday SET ID_t' . $i . ' = ' . $id2 . ' WHERE ' . $group1['ID'] . '=ID';
                } elseif ($day == "dim") {
                    $sql1 = 'UPDATE GroupSunday SET ID_t' . $i . ' = ' . $id2 . ' WHERE ' . $group1['ID'] . '=ID';
                }
            } else {
                // Create a new Match against $id2 for every team here.
                $newID = '';
                $Date = date("Y-m-d");
                $Hour = date("08:30");
                $score = 0;
                $team2ID = intval($group1['ID_t' . $i]);
                $terrain = intval($group1['ID_terrain']);
                $group_ID = intval($group1['ID']);
                $query = "INSERT INTO `Match`(ID, `date`, `hour`, ID_Equipe1, ID_Equipe2, score1, score2, ID_Terrain, Poule_ID) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $req = $db->prepare($query);
                $req->bind_param("issiiiiii", $newID, $Date, $Hour, intval($id2), $team2ID, $score, $score, $terrain, $group_ID);
                $req->execute();
            }
            if ($i == $teamNumberG1+1) {
                break;
            }
        }


        // Second team moved to first group.
        // Get ID_GS t1 t2 t3 ...
        // Pour chaque team (du groupe)
        for ($i = 1; $i < 9; $i += 1) {
            if ($group2['ID_t' . $i] == $id2) {
                //          UPDATE $donnees['ID_t'.$i] = $id1;
                if ($day == "sam") {
                    $sql2 = 'UPDATE GroupSaturday SET ID_t' . $i . ' = ' . $id1 . ' WHERE ' . $group2['ID'] . '=ID';
                } elseif ($day == "dim") {
                    $sql2 = 'UPDATE GroupSunday SET ID_t' . $i . ' = ' . $id1 . ' WHERE ' . $group2['ID'] . '=ID';
                }
            } else {
                // Create a new Match against $id1 for every team here.
                $newID = '';
                $Date = date("Y-m-d");
                $Hour = date("08:30");
                $score = 0;
                $team2ID = intval($group2['ID_t' . $i]);
                $terrain = intval($group2['ID_terrain']);
                $group_ID = intval($group2['ID']);
                $query = "INSERT INTO `Match`(ID, `date`, `hour`, ID_Equipe1, ID_Equipe2, score1, score2, ID_Terrain, Poule_ID) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $req = $db->prepare($query);
                $req->bind_param("issiiiiii", $newID, $Date, $Hour, intval($id1), $team2ID, $score, $score, $terrain, $group_ID);
                $req->execute();
            }
            if ($i == $teamNumberG1+1) {
                break;
            }
        }

        echo $sql1 . "\n";
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
}

//if (array_key_exists("idteam1", $_POST) && array_key_exists("idteam2", $_POST) && is_int($_POST["idteam1"]) && is_int($_POST["idteam2"])) {

if (array_key_exists("idteam1", $_POST) && array_key_exists("idteam2", $_POST) && array_key_exists("jour", $_GET)) {
    // je sais pas pq mais faut garder inversé
    switch_players($_POST["idteam2"], $_POST["idteam1"], $_GET["jour"]);
    header("Location: ../group.php?jour=".$_GET["jour"]."&cat=".$_GET['cat']);
} else {
    echo "no data";
}


function removeTeam($posId, $group, $day, $teamNumberPos, $db){
    $empty="NULL";
    for ($i = 1; $i < 9; $i += 1) {
        if ($group['ID_t' . $i] == $posId) {
            $savedi=$i;
            if ($day == "sam") {
                $sql = 'UPDATE GroupSaturday SET ID_t' . $i . ' = ' . $empty . ' WHERE ' . $group['ID'] . '=ID';
            } elseif ($day == "dim") {
                $sql = 'UPDATE GroupSunday SET ID_t' . $i . ' = ' . $empty . ' WHERE ' . $group['ID'] . '=ID';
            }
        }
        if ($i == $teamNumberPos+1) {
            break;
        }
    }
    if ($db->query($sql) === TRUE) {
        echo "Record Nullified successfully";
    } else {
        echo "Error updating record: " . $db->error;
    }
    $flagLeaderMoved = false;
    if($group['ID_Leader']==$posId) {//we moved the leader
       $flagLeaderMoved = true;
    }
    return array($savedi, $flagLeaderMoved);
}

function shiftTeams($PositionNumber, $posGroup, $day, $teamNumberPos, $flagLeaderMoved, $db){
    $textDay = $day == "sam" ? "GroupSaturday" : "GroupSunday";
    $queryT="SELECT * FROM ".$textDay." WHERE ID=".$posGroup['ID'];
    $qer = $db->query($queryT);
    $rep = $qer->fetch_array();
    for ($i = $PositionNumber; $i < 8; $i += 1) {
        $iNext = $i + 1;
        $teamID = $rep["ID_t" . $iNext] == null ? "NULL" : $rep["ID_t" . $iNext];
        $sql = 'UPDATE ' . $textDay . ' SET ID_t' . $i . ' = ' . $teamID . ' WHERE ' . $posGroup['ID'] . '=ID';
        if ($db->query($sql) === TRUE) {
            echo "Record Nullified successfully";
        } else {
            echo "Error updating record: " . $db->error;
        }
    }
    //check if group is empty
    $request = 'SELECT * FROM '.$textDay.' WHERE ID=' . $posGroup['ID'];
    $reponse = $db->query($request);
    $newGroup = $reponse->fetch_array();
    if($newGroup['ID_t1'] == 0){
        removeGroup($posGroup, $db, $textDay);
    }
    else{
        $sql = 'UPDATE '.$textDay.' SET ID_Leader='.$newGroup['ID_t1'].' WHERE '. $posGroup['ID'] .'= ID';
        $db->query($sql);
    }
}

function addTeam($posId, $group, $day, $db)
{
    $textDay = $day == "sam" ? "GroupSaturday" : "GroupSunday";

    if ($group['ID_t1'] == -1) {
        $sql = 'UPDATE ' . $textDay . ' SET ID_t1' . ' = ' . $posId . ' WHERE ' . $group['ID'] . '=ID';
        if ($db->query($sql) === TRUE) {
            echo "Record Nullified successfully";
            promote_leader($group['ID'], $posId, $db, $textDay);
        } else {
            echo "Error updating record: " . $db->error;
        }
    }
    else {
        for ($i = 1; $i < 9; $i += 1) {
            if ($group['ID_t' . $i] == null) {
                $sql = 'UPDATE ' . $textDay . ' SET ID_t' . $i . ' = ' . $posId . ' WHERE ' . $group['ID'] . '=ID';
                if ($db->query($sql) === TRUE) {
                    if ($i == 1) {//set the first team to the team Leader
                    }
                    echo "Record Nullified successfully";
                } else {
                    echo "Error updating record: " . $db->error;
                }
                break;
            }
        }
    }
}

function addMatch($posId, $negGroup, $teamNumberNeg, $db){
    for ($i = 1; $i < 9; $i += 1) {
        if ($negGroup['ID_t' . $i] == $posId) {
           //End of group
        } else {
            // Create a new Match against $id2 for every team here.
            $newID = '';
            $Date = date("Y-m-d");
            $Hour = date("08:30");
            $score = 0;
            $team2ID = intval($negGroup['ID_t' . $i]);
            $terrain = intval($negGroup['ID_terrain']);
            $group_ID = intval($negGroup['ID']);
            $query = "INSERT INTO `Match`(ID, `date`, `hour`, ID_Equipe1, ID_Equipe2, score1, score2, ID_Terrain, Poule_ID) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $req = $db->prepare($query);
            $req->bind_param("issiiiiii", $newID, $Date, $Hour, intval($posId), $team2ID, $score, $score, $terrain, $group_ID);
            $req->execute();
        }
        if ($i == $teamNumberNeg) {
            break;
        }
    }
}

function deleteMatch($posId, $posGroup, $db){
    $db->query('DELETE FROM `Match` WHERE (' . $posId . ' = ID_Equipe1 or ' . $posId . ' = ID_Equipe2) and ' . $posGroup['ID'] . '=  Poule_ID');
}

function removeGroup($posGroup, $db, $textDay){
    $sql = 'DELETE FROM '.$textDay.' WHERE '. $posGroup['ID'] .'= ID';
    if ($db->query($sql) === TRUE) {
        echo "Record Nullified successfully";
    } else {
        echo "Error updating record: " . $db->error;
    }
}

function promote_leader($idGroup, $teamID, $db, $textDay){
    $sql = 'UPDATE '.$textDay.' SET ID_Leader='.$teamID.' WHERE '. $idGroup .'= ID';
    $db->query($sql);
}

?>