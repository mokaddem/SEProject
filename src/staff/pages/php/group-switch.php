<?php
include_once('BDD.php');
//function switch_player($group1, $id1, $num1,$group2, $id2, $num2)
//{
//    $group1[$num1] = $id2;
//    $group2[$num2] = $id1;
//}

// $id = Team.ID
function switch_teams($id1, $id2) {
    $db = new BDD();


    $req1 = 'SELECT * FROM GroupSaturday WHERE '.$id1.' = ID_p1 or '.$id1.' = ID_p2 or '.$id1.'=  ID_p3 or '.$id1.'= ID_p4 or '.$id1.'= ID_p5';
    $reponse = $db->query($req1);
    // Get ID_GS t1 t2 t3 ...
    $donnees = $reponse ->fetch_array();
    var_dump($donnees);
    // Pour chaque team (du groupe)
    for ($i = 1; $i < 6; $i+=1) {
        if ($donnees['ID_p'.$i] == $id1) {
//             UPDATE
            $sql = 'UPDATE GroupSaturday SET ID_p'.$i.' = '.$id2.' WHERE '.$donnees['ID'].'=ID';
        }
    }



    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->error;
    }


    $req2 = 'SELECT * FROM GroupSaturday WHERE '.$id2.' = ID_p1 or '.$id2.' = ID_p2 or '.$id2.'= ID_p3 or '.$id2.'= ID_p4 or '.$id2.'= ID_p5';
    $reponse = $db->query($req2);
    $donnees = $reponse ->fetch_array();

//    var_dump($donnees);
    // Get ID_GS t1 t2 t3 ...
    // Pour chaque team (du groupe)
    for ($i = 1; $i < 6; $i+=1) {
        if ($donnees['ID_p'.$i] == $id2) {
//          UPDATE $donnees['ID_p'.$i] = $id1;
            $sql = 'UPDATE GroupSaturday SET ID_p'.$i.' = '.$id1.' WHERE '.$donnees['ID'].'=ID';
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
} else {
    echo "no data";
}
?>