<?php
include_once('BDD.php');
//function switch_player($group1, $id1, $num1,$group2, $id2, $num2)
//{
//    $group1[$num1] = $id2;
//    $group2[$num2] = $id1;
//}

// $id = Team.ID
function switch_players($id1, $id2) {
    $db = new BDD();

    $req1 = 'SELECT * FROM GroupSaturday WHERE '.$id1.' = ID_t1 or '.$id1.' = ID_t2 or '.$id1.'=  ID_t3 or '.$id1.'= ID_t4 or '.$id1.'= ID_t5';
    $reponse = $db->query($req1);
    // Get ID_GS t1 t2 t3 ...
    $donnees = $reponse ->fetch_array();
    // Pour chaque team (du groupe)
    for ($i = 1; $i < 6; $i+=1) {
        if ($donnees['ID_t'.$i] == $id1) {
//             UPDATE
            $sql = 'UPDATE GroupSaturday SET ID_t'.$i.' = '.$id2.' WHERE '.$donnees['ID'].'=ID';
        }
    }



    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->error;
    }


    $req2 = 'SELECT * FROM GroupSaturday WHERE '.$id2.' = ID_t1 or '.$id2.' = ID_t2 or '.$id2.'= ID_t3 or '.$id2.'= ID_t4 or '.$id2.'= ID_t5';
    $reponse = $db->query($req2);
    $donnees = $reponse ->fetch_array();

//    var_dump($donnees);
    // Get ID_GS t1 t2 t3 ...
    // Pour chaque team (du groupe)
    for ($i = 1; $i < 6; $i+=1) {
        if ($donnees['ID_t'.$i] == $id2) {
//          UPDATE $donnees['ID_t'.$i] = $id1;
            $sql = 'UPDATE GroupSaturday SET ID_t'.$i.' = '.$id1.' WHERE '.$donnees['ID'].'=ID';
        }
    }

    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->error;
    }

}

//if (array_key_exists("idteam1", $_POST) && array_key_exists("idteam2", $_POST) && is_int($_POST["idteam1"]) && is_int($_POST["idteam2"])) {
if (array_key_exists("idteam1", $_POST) && array_key_exists("idteam2", $_POST)) {
    // je sais pas pq mais faut garder inverser
    switch_players($_POST["idteam2"], $_POST["idteam1"]);
    header("Location: ../group.php?jour=sam");
} else {
    echo "no data";
}
?>