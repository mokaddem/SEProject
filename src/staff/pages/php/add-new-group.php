<?php
	include_once('BDD.php');
    require_once('add-new-history.php');

    $database_host = 'localhost';
    $database_user = 'root';
    $database_pass = '123';
    $database_db = 'SEProjectC';
	$db = new mysqli($database_host, $database_user, $database_pass, $database_db);
	
    if ($_GET['jour']=="sam"){
        $reponseTeams = $db->query("SELECT * FROM Team WHERE ID_Cat=1");
        $i=1;
        foreach ($reponseTeams as $team){
            if ($i == 1){
                $ID_p1 = $team['ID'];
            } elseif($i == 2){
                $ID_p2 = $team['ID'];
            } elseif($i == 3){
                $ID_p3 = $team['ID'];
            } elseif($i == 4){
                $ID_p4 = $team['ID'];
            } elseif($i == 5){
                $ID_p5 = $team['ID'];
            } 
            if ($i > 5){ //or !$teams->hasNext()){
                $req = $db->prepare("INSERT INTO GroupSaturday(ID, ID_p1, ID_p2, ID_p3, ID_p4, ID_p5, ID_vic_t1, ID_vic_t2) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
                
                $ID	 	= '';
                $ID_vic_t1 = NULL;
                $ID_vic_t2 = NULL;

                $req->bind_param("iiiiiiii", $ID, $ID_p1, $ID_p2, $ID_p3, $ID_p4, $ID_p5, $ID_vic_t1, $ID_vic_t2);

                $req->execute();

                $reponse = $db->query("SELECT * FROM GroupSaturday WHERE ID_p1=\"".$ID_p1 ."\" AND ID_p2=\"".$ID_p2 ."\" AND ID_p3=\"".$ID_p3 ."\" AND ID_p4=\"".$ID_p4 ."\" AND ID_p5=\"".$ID_p5 ."\"");
                $donnees = $reponse->fetch_array();
                addHistory($donnees['ID'], "GroupSaturday", "Ajout");

                $i = 1;
                $ID_p1 = $team['ID'];
            }
            $i++;
        }
        header("Location: ../group.php?jour=sam&generate=true");
    } elseif ($_GET['jour']=="dim"){
        $reponseTeams = $db->query("SELECT * FROM Team WHERE ID_Cat=1");
        $i=1;
        foreach ($reponseTeams as $team){
            if ($i == 1){
                $ID_p1 = $team['ID'];
            } elseif($i == 2){
                $ID_p2 = $team['ID'];
            } elseif($i == 3){
                $ID_p3 = $team['ID'];
            } elseif($i == 4){
                $ID_p4 = $team['ID'];
            } elseif($i == 5){
                $ID_p5 = $team['ID'];
            } elseif($i == 6){
                $ID_p6 = $team['ID'];
            } 
            if ($i > 6){ //or !$teams->hasNext()){
                $req = $db->prepare("INSERT INTO GroupSunday(ID, ID_p1, ID_p2, ID_p3, ID_p4, ID_p5, ID_p6, ID_vic_p1, ID_vic_p2) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                $ID	 	= '';
                $ID_vic_p1 = NULL;
                $ID_vic_p2 = NULL;

                $req->bind_param("iiiiiiiii", $ID, $ID_p1, $ID_p2, $ID_p3, $ID_p4, $ID_p5, $ID_p6, $ID_vic_p1, $ID_vic_p2);

                $req->execute();

                $reponse = $db->query("SELECT * FROM GroupSunday WHERE ID_p1=\"".$ID_p1 ."\" AND ID_p2=\"".$ID_p2 ."\" AND ID_p3=\"".$ID_p3 ."\" AND ID_p4=\"".$ID_p4 ."\" AND ID_p5=\"".$ID_p5 ."\"");
                $donnees = $reponse->fetch_array();
                addHistory($donnees['ID'], "GroupSunday", "Ajout");

                $i = 1;
                $ID_p1 = $team['ID'];
            }
            $i++;
        }
        header("Location: ../group.php?jour=dim&generate=true");
    }
?>
