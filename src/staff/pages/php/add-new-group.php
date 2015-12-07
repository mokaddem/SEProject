<!-- Generation des poules,
fonction appelée dans le formulaire de group-generate.php
Redirection vers group.php

Mise à jour de l'historique
 -->
<?php
	include_once('BDD.php');

    require_once('add-new-history.php');

    // Generation de la poule
    $db = BDconnect();

    function insert($db, $day, $ID_teams, $groupSize, $ID_Terrain){
    if ($day == "sam"){
        $table = "GroupSaturday";
        $ID_teams[6] = NULL;
        $completeDay = "Samedi";
    } else{
        $table = "GroupSunday";
        $completeDay = "Dimanche";
    }
    $req = $db->prepare("INSERT INTO ".$table."(ID, ID_terrain, ID_t1, ID_t2, ID_t3, ID_t4, ID_t5, ID_t6, ID_Leader, ID_Cat) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $ID	 	= '';

    $req->bind_param("iiiiiiiiii", $ID, $ID_Terrain, $ID_teams[1], $ID_teams[2], $ID_teams[3], $ID_teams[4], $ID_teams[5], $ID_teams[6], $ID_teams[1], $_GET['InputCat']);
    $req->execute();

    $reponse = $db->query("SELECT * FROM ".$table." WHERE ID_t1=".$ID_teams[1]);
    $donnees = $reponse->fetch_array();
    // Mise à jour de l'historique

    addHistory($donnees['ID'], "Poules (".$completeDay.")", "Ajout");

    /* Add Matchs */

    $req = $db->prepare("INSERT INTO `Match`(ID,`date`,`hour`,ID_Equipe1,ID_Equipe2,score1,score2,ID_Terrain,Poule_ID) VALUES(?,?,?,?,?,?,?,?,?)");

    $datetime = new DateTime('tomorrow');
    $datetime->format('Y-m-d');

    $ID         = '';
    $date       = date('Y-m-d');
    $hour       = date("08:30");
    echo $hour;
    // $hour       = "8:30" //date("H:i");
    // echo $hour;
    $score1     = 0;
    $score2     = 0;
    $Poule_ID   = $donnees['ID'];

    for($i=1; $i<=$groupSize; $i++){
        for($j=1+$i; $j<=$groupSize; $j++){
            $ID_Equipe1 = $ID_teams[$i];
            $ID_Equipe2 = $ID_teams[$j];
            //error_log("Added: ".$ID_Equipe1." + ".$ID_Equipe2." + ".$date." + ".$hour." + ".$score1." + ".$score2." + ".$ID_Terrain." + ".$Poule_ID);
            $req->bind_param("issiiiiii", $ID,$date,$hour,$ID_Equipe1,$ID_Equipe2,$score1,$score2,$ID_Terrain,$Poule_ID);
            $req->execute();

            $reponse = $db->query("SELECT * FROM `Match` WHERE ID_Equipe1=".$ID_Equipe1." AND ID_Equipe2=".$ID_Equipe2);
            $donnees = $reponse->fetch_array();
            // Mise à jour de l'historique
            addHistory($donnees['ID'], "Match de poule (".$completeDay.")", "Ajout");

        }
    }
    $reponse->free();
    return $Poule_ID;

}

    $day = $_GET['jour'];
    if ($day == "sam"){
        $maxTeamNum = 5;
        $table = "GroupSaturday";
    } else{
        $maxTeamNum = 6;
        $table = "GroupSunday";
    }

    $getPoules = $db->query("SELECT ID_t1 FROM ".$table);
    foreach ($getPoules as $poule) {
        $getTeams = $db->query('SELECT ID_Cat FROM `Team` WHERE Team.ID ='.$poule['ID_t1'].'');
        $bool = $getTeams->fetch_array();
        if ($bool['ID_Cat'] == $_GET['InputCat']) {
            header("Location: ../group-generate.php?error=no_".$day);
            return;
        }

    }

    $terrains = $db->query("SELECT * FROM Terrain");
    $reponseTeams = $db->query('SELECT * FROM Team WHERE ID_Cat='.$_GET['InputCat']);
    $i = 1;
    $ID_teams = array();
    foreach ($reponseTeams as $team){
        $personne1 = $db->query('SELECT * FROM Personne WHERE ID ='.$team['ID_Player1'])->fetch_array();
        $personne2 = $db->query('SELECT * FROM Personne WHERE ID ='.$team['ID_Player2'])->fetch_array();
        // On trie les équipes: les mixtes le samedi, unisex le dimanche.
        $takeTeam = ($day == "sam") ? $personne1['Title'] != $personne2['Title'] : $personne1['Title'] == $personne2['Title'];
        if ($takeTeam) {
            $ID_teams[$i] = $team['ID'];
            if ($i == $maxTeamNum) {
                $terrain = $terrains->fetch_array();
                if ($terrain == NULL) { // Si on a pas assez de terrains pour tous les matches.
                    $terrains = $db->query("SELECT * FROM Terrain");
                    $terrain = $terrains->fetch_array();
                }
                $ID_Terrain = $terrain['ID'];

                $Poule_ID = insert($db, $day, $ID_teams, $i, $ID_Terrain);
                $i = 0;
                $ID_teams = array();
            }
            $i++;
        }
    }
    if ($i > 1 and $i <= $maxTeamNum){
        $terrain = $terrains->fetch_array();
        if ($terrain == NULL){ // Si on a pas assez de terrains pour tous les matches.
            $terrains = $db->query("SELECT * FROM Terrain");
            $terrain = $terrains->fetch_array();
        }
        $ID_Terrain = $terrain['ID'];

        $Poule_ID = insert($db, $day, $ID_teams, $i-1, $ID_Terrain);
    }

    $getPoules->free();

    if ($i > 0){
       header("Location: ../group.php?jour=".$day."&generate=true&cat=".$_GET['InputCat']);
    } else{
       header("Location: ../group.php?jour=".$day."&generate=false&cat=".$_GET['InputCat']);
    }

    return;
?>
