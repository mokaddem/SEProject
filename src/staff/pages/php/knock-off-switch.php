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

    $numberOfGroups = 0;
    if ($day == "sam" ) {
        $knockoff_all = $db->query('SELECT * FROM KnockoffSaturday ORDER BY `Position` ASC');
        $row = $db->query('SELECT COUNT(ID) as numberOfGroups FROM GroupSaturday')->fetch_array();
        extract($row);
    } elseif ($day == "dim") {
        $knockoff_all = $db->query('SELECT * FROM KnockoffSunday ORDER BY `Position` ASC');
        $row = $db->query('SELECT COUNT(ID) as numberOfGroups FROM GroupSunday')->fetch_array();
        extract($row);
    }

    var_dump($knockoff_all);
    for ($i = 1; $i <= $numberOfGroups; $i++) {
        $knockoff = $knockoff_all->fetch_array();
        $req1 = 'SELECT * FROM `Match` WHERE ID='.$knockoff['ID_Match'];
        $knockoff = $db->query($req1);
        if ($knockoff != FALSE){
            break;
        }
    }
    var_dump($knockoff);
    // Get ID_Match Day Hour ID_Equipe1 ...
    $donnees = $knockoff ->fetch_array();

    // Pour chaque team (du match)
    for ($i = 1; $i < 3; $i++) {
        if ($donnees['ID_Equipe'.$i] == $id1) {
//          UPDATE
            $sql1 = 'UPDATE `Match` SET ID_Equipe'.$i.' = '.$id2.' WHERE '.$donnees['ID'].'=ID';
        }
    }


    if ($day == "sam" ) {
        $knockoff_all2 = $db->query('SELECT * FROM KnockoffSaturday ORDER BY `Position` ASC');
    } elseif ($day == "dim") {
        $knockoff_all2 = $db->query('SELECT * FROM KnockoffSunday ORDER BY `Position` ASC');
    }
    while ($knockoff = $knockoff_all2->fetch_array()) {
        $req2 = 'SELECT * FROM `Match` WHERE ID='.$knockoff['ID_Match'];
        $knockoff = $db->query($req2);
        if ($knockoff != FALSE){
            break;
        }
    }
    // Get ID_Match Day Hour ID_Equipe1 ...
    $donnees = $knockoff ->fetch_array();

    // Pour chaque team (du match)
    for ($i = 1; $i < 3; $i++) {
        if ($donnees['ID_Equipe'.$i] == $id2) {
//          UPDATE
            $sql2 = 'UPDATE `Match` SET ID_Equipe'.$i.' = '.$id1.' WHERE '.$donnees['ID'].'=ID';
        }
    }

    // Same for $id2

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
    header("Location: ../knock-off.php?jour=".$_GET["jour"]."&cat=".$_GET['cat']);
} else {
    echo "no data";
}
?>