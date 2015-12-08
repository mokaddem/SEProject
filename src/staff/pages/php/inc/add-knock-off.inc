<!-- Generation des knock-off,
fonction appelée dans le formulaire de knock-off-generate.php
Redirection vers knock-off.php

Mise à jour de l'historique
 -->
<?php
	include_once('BDD.php');
    require_once('add-new-history.php');

// Generation du knock-off
function createKnock($db, $knocktable, $cat, $numberOfTeams, $vicTeams) {
    // Try to put the best players at the extremities, so that they will fight on the final match.
//        $vicTeamsGoodOrder = array($numberOfTeams);
//        $i = 0;
//        $k = 0;
//        foreach ($vicTeams as $team) {
//            if ($k == 0) {
//                $vicTeamsGoodOrder[$numberOfTeams - 1 - $i] = $team;
//                $k = 1;
//            } elseif ($k == 1) {
//                $vicTeamsGoodOrder[$i] = $team;
//                $i++;
//                $k = 0;
//            }
//        }

    // On trouve le nombre de matches pour le premier tour: la puissance de 2 supérieure la plus proche.
    for ($k = 1; $k < $numberOfTeams; $k = $k * 2) {
    }
    $numberOfMatchFirstRound = $k / 2;
    $numberOfMatch = $k - 1;

    $terrains = $db->query("SELECT * FROM Terrain");
    for ($i = 1; $i <= $numberOfMatch; $i++) {
        $teamID1 = 0;
        $teamID2 = 0;
        if ($i <= $numberOfTeams - $numberOfMatchFirstRound) {
            $team1 = $vicTeams->fetch_array();
            $team2 = $vicTeams->fetch_array();
            $teamID1 = $team1['teamID'];
            $teamID2 = $team2['teamID'];
        } elseif ($i <= $numberOfMatchFirstRound) {
            $team1 = $vicTeams->fetch_array();
            $teamID1 = $team1['teamID'];
            $teamID2 = -2; // Valeure servant à savoir quand il n'y a pas de team mais qu'il ne faut pas en ajouter par après.
        }

        if ($teamID2 == -2){
            $terrain['ID'] = -1;
        } else {
            $terrain = $terrains->fetch_array();
            if ($terrain == NULL) { // Si on a pas assez de terrains pour tous les matches, on cycle.
                $terrains = $db->query("SELECT * FROM Terrain");
                $terrain = $terrains->fetch_array();
            }
        }

        createMatchKnock($db, $i, $cat, $teamID1, $teamID2, $terrain['ID'], $knocktable);
    }

    $knockID = $db->query('SELECT ID FROM '.$knocktable.' WHERE Category = '.$cat)->fetch_array();
    if ($_GET['jour'] == "sam") {
        // Mise à jour de l'historique
        addHistory($knockID, "Knock-Off (Samedi - " . $cat . ")", "Création");
    } elseif ($_GET['jour'] == "dim") {
        // Mise à jour de l'historique
        addHistory($knockID, "Knock-Off (Dimanche - " . $cat . ")", "Création");
    }
}

function createMatchKnock($db, $position, $cat, $teamID1, $teamID2, $terrainID, $knocktable){
    $matchID = '';
    $date = date('d');
    $hour = NULL;
    $score = 1;
    $pouleID = 0;
    $reqMatch = $db->prepare('INSERT INTO `Match`(ID, `date`, `hour`, ID_Equipe1, ID_Equipe2, score1, score2, ID_Terrain, Poule_ID) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $reqMatch->bind_param("issiiiiii", $matchID, $date, $hour, $teamID1, $teamID2, $score, $score, $terrainID, $pouleID);
    $reqMatch->execute();

    // On récupère l'ID du match qu'on vient de créer.
    $match = $db->query("SELECT * FROM `Match` WHERE ID_Terrain =" . $terrainID . " AND ID_Equipe1=" . $teamID1 . " AND ID_Equipe2=" . $teamID2 . ' ORDER BY `Match`.ID DESC')->fetch_array();
    $matchID = $match['ID'];

    // Et on insère dans le knockoff à la bonne position.
    $knockID= '';
    $reqKnock = $db->prepare("INSERT INTO " . $knocktable . "(ID, ID_Match, `Position`, Category) VALUES(?, ?, ?, ?)");
    $reqKnock->bind_param("iiii", $knockID, $matchID, $position, $cat);
    $reqKnock->execute();
}
?>
