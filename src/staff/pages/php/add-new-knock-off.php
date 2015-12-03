<!-- Generation des knock-off,
fonction appelée dans le formulaire de knock-off-generate.php
Redirection vers knock-off.php

Mise à jour de l'historique
 -->
<?php
	include_once('BDD.php');
    require_once('add-new-history.php');

	// Generation du knock-off
    $db = BDconnect();

    if ($_GET['jour'] == "sam"){
        $table = "KnockoffSaturday";
        $vicTeams = $db->query('SELECT * FROM GroupSaturday, Team WHERE Team.Group_Vic = 1 AND Team.ID_Cat = '.$_GET['InputCat'].' AND (GroupSaturday.ID_t1 = Team.ID OR GroupSaturday.ID_t2 = Team.ID OR GroupSaturday.ID_t3 = Team.ID OR GroupSaturday.ID_t4 = Team.ID OR GroupSaturday.ID_t5 = Team.ID OR GroupSaturday.ID_t6 = Team.ID OR GroupSaturday.ID_t7 = Team.ID OR GroupSaturday.ID_t8 = Team.ID) ORDER BY Team.AvgRanking');
        $row = $db->query('SELECT COUNT(Team.ID) as numberOfTeams FROM GroupSaturday, Team WHERE Team.Group_Vic = 1 AND Team.ID_Cat = '.$_GET['InputCat'].' AND (GroupSaturday.ID_t1 = Team.ID OR GroupSaturday.ID_t2 = Team.ID OR GroupSaturday.ID_t3 = Team.ID OR GroupSaturday.ID_t4 = Team.ID OR GroupSaturday.ID_t5 = Team.ID OR GroupSaturday.ID_t6 = Team.ID OR GroupSaturday.ID_t7 = Team.ID OR GroupSaturday.ID_t8 = Team.ID)');
        extract($row->fetch_array());
        $row->free();
    } else{
        $table = "KnockoffSunday";
        $vicTeams = $db->query('SELECT * FROM GroupSunday, Team WHERE Team.Group_Vic = 1 AND Team.ID_Cat = '.$_GET['InputCat'].' AND (GroupSunday.ID_t1 = Team.ID OR GroupSunday.ID_t2 = Team.ID OR GroupSunday.ID_t3 = Team.ID OR GroupSunday.ID_t4 = Team.ID OR GroupSunday.ID_t5 = Team.ID OR GroupSunday.ID_t6 = Team.ID OR GroupSunday.ID_t7 = Team.ID OR GroupSunday.ID_t8 = Team.ID) ORDER BY Team.AvgRanking');
        $row = $db->query('SELECT COUNT(Team.ID) as numberOfTeams FROM GroupSunday, Team WHERE Team.Group_Vic = 1 AND Team.ID_Cat = '.$_GET['InputCat'].' AND (GroupSunday.ID_t1 = Team.ID OR GroupSunday.ID_t2 = Team.ID OR GroupSunday.ID_t3 = Team.ID OR GroupSunday.ID_t4 = Team.ID OR GroupSunday.ID_t5 = Team.ID OR GroupSunday.ID_t6 = Team.ID OR GroupSunday.ID_t7 = Team.ID OR GroupSunday.ID_t8 = Team.ID)');
        extract($row->fetch_array());
        $row->free();
    }
    $reponse = $db->query("SELECT * FROM ".$table);
    $bool = $reponse->fetch_array();
    if ($bool != NULL) {
        header("Location: ../knock-off-generate.php?error=yes_".$_GET['jour']."&jour=".$_GET['jour']);
        return;
    } elseif ($numberOfTeams == 0) {
        header("Location: ../knock-off-generate.php?error=no_".$_GET['jour']."&jour=".$_GET['jour']);
        return;
    }

    $vicTeamsGoodOrder = array($numberOfTeams);
    $i = 0;
    $k = 0;
    foreach($vicTeams as $team){
        if ($k == 0){
            $vicTeamsGoodOrder[$i] = $team;
            $k = 1;
        } elseif ($k == 1){
            $vicTeamsGoodOrder[$numberOfTeams-1-$i] = $team;
            $i++;
            $k = 0;
        }
    }


    $terrains = $db->query("SELECT * FROM Terrain");
    $k = 0;
    $teamID1 = 0;
    $teamID2 = 0;
    $donneesKnock = 0;
    $position = 1;
    for($i = 0; $i < $numberOfTeams; $i++){
        $team = $vicTeamsGoodOrder[$i];
        if ($k == 0){
            $team1 = $team;
            $teamID1 = $team1['ID'];
            $k = 1;
        } else{
            $team2 = $team;
            $teamID2 = $team2['ID'];
            $k = 0;
            // On créé le match pour ces deux équipes.
            $reqMatch = $db->prepare('INSERT INTO `Match`(ID, `date`, `hour`, ID_Equipe1, ID_Equipe2, score1, score2, ID_Terrain, Poule_ID) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $ID	 	= '';
            $date = date('Y-m-d');
            $hour = date("H:i");
            $score1 = 0;
            $score2 = 0;
            $terrain = $terrains->fetch_array();
            if ($terrain == NULL){ // Si on a pas assez de terrains pour tous les matches.
                $terrains = $db->query("SELECT * FROM Terrain");
                $terrain = $terrains->fetch_array();
            }
            $ID_Terrain = $terrain['ID'];
            $Poule_ID = 0;

            $reqMatch->bind_param("issiiiiii", $ID, $date, $hour, $teamID1, $teamID2, $score1, $score2, $ID_Terrain, $Poule_ID);
            $reqMatch->execute();
            $reponseMatch = $db->query("SELECT * FROM `Match` WHERE ID_Terrain =".$ID_Terrain." AND ID_Equipe1=".$teamID1." AND ID_Equipe2=".$teamID2.' AND Poule_ID = 0');
            $donneesMatch = $reponseMatch->fetch_array();
                    // Mise à jour de l'historique
            addHistory($donneesMatch['ID'], "Match - Knock-off", "Ajout");

            $reqKnock = $db->prepare("INSERT INTO ".$table."(ID, ID_Match, `Position`, Category) VALUES(?, ?, ?, ?)");
            $ID = '';
            $ID_Match = $donneesMatch['ID'];
            $reqKnock->bind_param("iiii", $ID, $ID_Match, $position, $_GET['InputCat']);
            $reqKnock->execute();
            $reponseKnock = $db->query("SELECT * FROM ".$table." WHERE ID_Match =".$ID_Match." AND `Position`=".$i);
            $donneesKnock = $reponseKnock->fetch_array();
            $teamID1 = 0;
            $teamID2 = 0;
            $position++;
        }
    }

    // On génère les matches des autres tours du tournoi.
    // Dans un tournois à 16 équipes, il y en aura 15.
    for ($k = $numberOfTeams/2; $k >= 1; $k = ceil($k/2)){
        $reqMatch = $db->prepare('INSERT INTO `Match`(ID, `date`, `hour`, ID_Equipe1, ID_Equipe2, score1, score2, ID_Terrain, Poule_ID) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $ID	 	= '';
        $date = date('Y-m-d');
        $hour = date("H:i");
        $score1 = 0;
        $score2 = 0;
        $terrain = $terrains->fetch_array();
        if ($terrain == NULL){
            $terrains = $db->query("SELECT * FROM Terrain");
            $terrain = $terrains->fetch_array();
        }
        $ID_Terrain = $terrain['ID'];
        $Poule_ID = 0;

        $reqMatch->bind_param("issiiiiii", $ID, $date, $hour, $teamID1, $teamID2, $score1, $score2, $ID_Terrain, $Poule_ID);
        $reqMatch->execute();
        $reponseMatch = $db->query("SELECT * FROM `Match` WHERE ID_Terrain =".$ID_Terrain." AND ID_Equipe1=".$teamID1." AND ID_Equipe2=".$teamID2);
        $donneesMatch = $reponseMatch->fetch_array();
        // Mise à jour de l'historique
        addHistory($donneesMatch['ID'], "Match - Knock-off", "Ajout");

        $reqKnock = $db->prepare("INSERT INTO ".$table."(ID, ID_Match, `Position`, Category) VALUES(?, ?, ?, ?)");
        $ID = '';
        $ID_Match = $donneesMatch['ID'];
        $reqKnock->bind_param("iiii", $ID, $ID_Match, $position, $_GET['InputCat']);
        $reqKnock->execute();
        $reponseKnock = $db->query("SELECT * FROM ".$table." WHERE ID_Match =".$ID_Match." AND `Position`=".$i);
        $donneesKnock = $reponseKnock->fetch_array();

        // Dans le cas où on a un nombre impaire d'équipe:
        if ($teamID1 != 0){
            $teamID1 = 0;
        }
        $position++;
        if ($k == 1){ // To stop the infinite loop !
            $k = 0;
        }
    }

    if ($_GET['jour'] == "sam"){
        // Mise à jour de l'historique
        addHistory($donneesKnock['ID'], "Knock-Off (Samedi)", "Création");
        header("Location: ../knock-off.php?jour=sam&generate=true&cat=1");
    }
    elseif ($_GET['jour'] == "dim") {
        // Mise à jour de l'historique
        addHistory($donneesKnock['ID'], "Knock-Off (Dimanche)", "Création");
        header("Location: ../knock-off.php?jour=dim&generate=true&cat=1");
    }

		// $reponse->free(); $ID_Terrain->free(); $reponseMatch->free(); $reqKnock->free(); $reponseKnock->free();
    return;
?>
