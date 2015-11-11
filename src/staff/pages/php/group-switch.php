<?php
include_once('BDD.php');
//function switch_player($group1, $id1, $num1,$group2, $id2, $num2)
//{
//    $group1[$num1] = $id2;
//    $group2[$num2] = $id1;
//}

// $id = Team.ID
function switch_players($id1, $id2, $day) {
    $db = new BDD();

    if ($day == "sam" ) {
        $req1 = 'SELECT * FROM GroupSaturday WHERE '.$id1.' = ID_t1 or '.$id1.' = ID_t2 or '.$id1.'=  ID_t3 or '.$id1.'= ID_t4 or '.$id1.'= ID_t5';
    } elseif ($day == "dim") {
        $req1 = 'SELECT * FROM GroupSunday WHERE '.$id1.' = ID_t1 or '.$id1.' = ID_t2 or '.$id1.'=  ID_t3 or '.$id1.'= ID_t4 or '.$id1.'= ID_t5 or '.$id1.'= ID_t6';
    }
    $reponse = $db->query($req1);
    // Get ID_GS t1 t2 t3 ...
    $donnees = $reponse ->fetch_array();

    // Pour chaque team (du groupe)
    for ($i = 1; $i < 7; $i+=1) {
        if ($donnees['ID_t'.$i] == $id1) {
//             UPDATE
            if ($day == "sam" ) {
                $sql1 = 'UPDATE GroupSaturday SET ID_t'.$i.' = '.$id2.' WHERE '.$donnees['ID'].'=ID';
            } elseif ($day == "dim") {
                $sql1 = 'UPDATE GroupSunday SET ID_t'.$i.' = '.$id2.' WHERE '.$donnees['ID'].'=ID';
            }
        }
        if ($i == 5 && $day=="sam") {
            break;
        }
    }


    if ($day == "sam" ) {
        $req2 = 'SELECT * FROM GroupSaturday WHERE '.$id2.' = ID_t1 or '.$id2.' = ID_t2 or '.$id2.'= ID_t3 or '.$id2.'= ID_t4 or '.$id2.'= ID_t5';
    } elseif ($day == "dim") {
        $req2 = 'SELECT * FROM GroupSunday WHERE '.$id2.' = ID_t1 or '.$id2.' = ID_t2 or '.$id2.'= ID_t3 or '.$id2.'= ID_t4 or '.$id2.'= ID_t5 or '.$id2.'= ID_t6';
    }

    $reponse = $db->query($req2);
    $donnees = $reponse ->fetch_array();
//    var_dump($donnees);

    // Get ID_GS t1 t2 t3 ...
    // Pour chaque team (du groupe)
    for ($i = 1; $i < 7; $i+=1) {
        if ($donnees['ID_t' . $i] == $id2) {
//          UPDATE $donnees['ID_t'.$i] = $id1;
            if ($day == "sam") {
                $sql2 = 'UPDATE GroupSaturday SET ID_t' . $i . ' = ' . $id1 . ' WHERE ' . $donnees['ID'] . '=ID';
            } elseif ($day == "dim") {
                $sql2 = 'UPDATE GroupSunday SET ID_t' . $i . ' = ' . $id1 . ' WHERE ' . $donnees['ID'] . '=ID';
            }
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

}

//if (array_key_exists("idteam1", $_POST) && array_key_exists("idteam2", $_POST) && is_int($_POST["idteam1"]) && is_int($_POST["idteam2"])) {

if (array_key_exists("idteam1", $_POST) && array_key_exists("idteam2", $_POST) && array_key_exists("jour", $_GET)) {
    // je sais pas pq mais faut garder inverser
    switch_players($_POST["idteam2"], $_POST["idteam1"], $_GET["jour"]);
    header("Location: ../group.php?jour=".$_GET["jour"]);
} else {
    echo "no data";
}
?>