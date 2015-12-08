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

    $reponse = $db->query('SELECT * FROM GlobalVariables WHERE `Name` = "tournament_started_'.$_GET['jour'].'"');
    $rep = $reponse->fetch_array();
    $flagTournamentStarted = $rep['Value'];
    if($flagTournamentStarted != 1){
        header("Location: ../knock-off-generate.php?error=no_tournament_" . $_GET['jour'] . "&jour=" . $_GET['jour']);
    } else {

        if ($_GET['jour'] == "sam") {
            $table = "KnockoffSaturday";
        } else {
            $table = "KnockoffSunday";
        }

        $terrains = $db->query("SELECT * FROM Terrain");
        $categories = $db->query('SELECT * FROM Categorie');
        $numCatDone = 0;
        foreach ($categories as $cat) {
            $catName = $cat['Designation'];
            $cat = $cat['ID'];
            $generate = true;
            $getcat = $db->query("SELECT DISTINCT Category FROM " . $table);
            foreach ($getcat as $doneCat) {
                if ($doneCat['Category'] == $cat) {
                    $generate = false;
                    break;
                }
            }
            if ($generate) {
                if ($_GET['jour'] == "sam") {
                    $vicTeams = $db->query('SELECT *, Team.ID as teamID FROM Team, GroupSaturday, RankingTextToIntBelgian WHERE Team.Group_Vic = 1 AND Team.ID_Cat = ' . $cat . ' AND Team.AvgRanking=RankingTextToIntBelgian.RankingText AND (GroupSaturday.ID_t1 = Team.ID OR GroupSaturday.ID_t2 = Team.ID OR GroupSaturday.ID_t3 = Team.ID OR GroupSaturday.ID_t4 = Team.ID OR GroupSaturday.ID_t5 = Team.ID OR GroupSaturday.ID_t6 = Team.ID OR GroupSaturday.ID_t7 = Team.ID OR GroupSaturday.ID_t8 = Team.ID) ORDER BY RankingTextToIntBelgian.RankingInt DESC');
                    $row = $db->query('SELECT COUNT(Team.ID) as numberOfTeams FROM GroupSaturday, Team WHERE Team.Group_Vic = 1 AND Team.ID_Cat = ' . $cat . ' AND (GroupSaturday.ID_t1 = Team.ID OR GroupSaturday.ID_t2 = Team.ID OR GroupSaturday.ID_t3 = Team.ID OR GroupSaturday.ID_t4 = Team.ID OR GroupSaturday.ID_t5 = Team.ID OR GroupSaturday.ID_t6 = Team.ID OR GroupSaturday.ID_t7 = Team.ID OR GroupSaturday.ID_t8 = Team.ID)');
                    extract($row->fetch_array());
                    $row->free();
                } else {
                    $vicTeams = $db->query('SELECT *, Team.ID as teamID FROM Team, GroupSunday, RankingTextToIntBelgian WHERE Team.Group_Vic = 1 AND Team.ID_Cat = ' . $cat . ' AND Team.AvgRanking=RankingTextToIntBelgian.RankingText AND (GroupSunday.ID_t1 = Team.ID OR GroupSunday.ID_t2 = Team.ID OR GroupSunday.ID_t3 = Team.ID OR GroupSunday.ID_t4 = Team.ID OR GroupSunday.ID_t5 = Team.ID OR GroupSunday.ID_t6 = Team.ID OR GroupSunday.ID_t7 = Team.ID OR GroupSunday.ID_t8 = Team.ID) ORDER BY RankingTextToIntBelgian.RankingInt DESC');
                    $row = $db->query('SELECT COUNT(Team.ID) as numberOfTeams FROM GroupSunday, Team WHERE Team.Group_Vic = 1 AND Team.ID_Cat = ' . $cat . ' AND (GroupSunday.ID_t1 = Team.ID OR GroupSunday.ID_t2 = Team.ID OR GroupSunday.ID_t3 = Team.ID OR GroupSunday.ID_t4 = Team.ID OR GroupSunday.ID_t5 = Team.ID OR GroupSunday.ID_t6 = Team.ID OR GroupSunday.ID_t7 = Team.ID OR GroupSunday.ID_t8 = Team.ID)');
                    extract($row->fetch_array());
                    $row->free();
                }

                if ($numberOfTeams > 0) {
                    $numCatDone++;
                }
                // Try to put the best players at the extremities, so that they will fight on the final match.
                $vicTeamsGoodOrder = array($numberOfTeams);
                $i = 0;
                $k = 0;
                foreach ($vicTeams as $team) {
                    if ($k == 0) {
                        $vicTeamsGoodOrder[$i] = $team;
                        $k = 1;
                    } elseif ($k == 1) {
                        $vicTeamsGoodOrder[$numberOfTeams - 1 - $i] = $team;
                        $i++;
                        $k = 0;
                    }
                }

                $k = 0;
                $teamID1 = 0;
                $teamID2 = 0;
                $donneesKnock = 0;
                $position = 1;
                for ($i = 0; $i < $numberOfTeams; $i++) {
                    $team = $vicTeamsGoodOrder[$i];
                    if ($k == 0) {
                        $team1 = $team;
                        $teamID1 = $team1['teamID'];
                        $k = 1;
                    } else {
                        $team2 = $team;
                        $teamID2 = $team2['teamID'];
                        $k = 0;
                        // On créé le match pour ces deux équipes.
                        $reqMatch = $db->prepare('INSERT INTO `Match`(ID, `date`, `hour`, ID_Equipe1, ID_Equipe2, score1, score2, ID_Terrain, Poule_ID) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
                        $ID = '';
                        $date = date('Y-m-d');
                        $hour = date("H:i");
                        $score1 = 0;
                        $score2 = 0;
                        $terrain = $terrains->fetch_array();
                        if ($terrain == NULL) { // Si on a pas assez de terrains pour tous les matches.
                            $terrains = $db->query("SELECT * FROM Terrain");
                            $terrain = $terrains->fetch_array();
                        }
                        $ID_Terrain = $terrain['ID'];
                        $Poule_ID = 0;

                        $reqMatch->bind_param("issiiiiii", $ID, $date, $hour, $teamID1, $teamID2, $score1, $score2, $ID_Terrain, $Poule_ID);
                        $reqMatch->execute();
                        $donneesMatch = $db->query('SELECT * FROM `Match` WHERE ID_Equipe1 = ' . $teamID1 . ' AND ID_Equipe2 = ' . $teamID2 . ' AND ID_Terrain = ' . $ID_Terrain . ' ORDER BY `Match`.ID DESC')->fetch_array();

                        $reqKnock = $db->prepare("INSERT INTO " . $table . "(ID, ID_Match, `Position`, Category) VALUES(?, ?, ?, ?)");
                        $ID = '';
                        $ID_Match = $donneesMatch['ID'];
                        $reqKnock->bind_param("iiii", $ID, $ID_Match, $position, $cat);
                        $reqKnock->execute();
                        $teamID1 = 0;
                        $teamID2 = 0;
                        $position++;
                    }
                }

                $tripleVictor = 0;
                for ($j = $numberOfTeams; $j >= 3; $j = (($j + ($j % 2)) / 2)) {
                    // Because there will be 3 victors for X_0 = 3, X_n = X_(n-1)*2-1 (3, 5, 9, 17, ...)
                    // If $j is pair, we need to divide it by 2.
                    if ($j == 3) {
                        // For the 3 victors, we need to have one more iteration for the following loop !
                        $tripleVictor = 1;
                        $numberOfTeams++;
                        break;
                    }
                }
                if ($tripleVictor != 1) {
                    $numberOfTeams--;
                }
                // On génère les matches des autres tours du tournoi.
                // Dans un tournois à 16 équipes, il y en aura 7.
                for ($k = $numberOfTeams / 2; $k >= 1; $k--) {
                    echo $k;
                    $reqMatch = $db->prepare('INSERT INTO `Match`(ID, `date`, `hour`, ID_Equipe1, ID_Equipe2, score1, score2, ID_Terrain, Poule_ID) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
                    $ID = '';
                    $date = date('Y-m-d');
                    $hour = date("H:i");
                    $score1 = 0;
                    $score2 = 0;
                    $terrain = $terrains->fetch_array();
                    if ($terrain == NULL) {
                        $terrains = $db->query("SELECT * FROM Terrain");
                        $terrain = $terrains->fetch_array();
                    }
                    $ID_Terrain = $terrain['ID'];
                    $Poule_ID = 0;

                    $reqMatch->bind_param("issiiiiii", $ID, $date, $hour, $teamID1, $teamID2, $score1, $score2, $ID_Terrain, $Poule_ID);
                    $reqMatch->execute();
                    $donneesMatch = $db->query('SELECT * FROM `Match` WHERE ID_Equipe1 = ' . $teamID1 . ' AND ID_Equipe2 = ' . $teamID2 . ' AND ID_Terrain = ' . $ID_Terrain . ' ORDER BY `Match`.ID DESC')->fetch_array();

                    $reqKnock = $db->prepare("INSERT INTO " . $table . "(ID, ID_Match, `Position`, Category) VALUES(?, ?, ?, ?)");
                    $ID = '';
                    $ID_Match = $donneesMatch['ID'];
                    $reqKnock->bind_param("iiii", $ID, $ID_Match, $position, $cat);
                    $reqKnock->execute();

                    // Dans le cas où on a un nombre impaire d'équipe:
                    if ($teamID1 != 0) {
                        $teamID1 = 0;
                    }
                    $position++;
                    if ($k == 1) { // To stop the infinite loop !
                        $k = 0;
                    }
                }

                if ($_GET['jour'] == "sam") {
                    // Mise à jour de l'historique
                    addHistory($position, "Knock-Off (Samedi - " . $catName . ")", "Création");
                } elseif ($_GET['jour'] == "dim") {
                    // Mise à jour de l'historique
                    addHistory($position, "Knock-Off (Dimanche - " . $catName . ")", "Création");

                }
            }
        }
        if ($numCatDone == 0) {
            header("Location: ../knock-off.php?jour=" . $_GET['jour'] . "&generate=false&cat=0");
        } else {
            header("Location: ../knock-off.php?jour=" . $_GET['jour'] . "&generate=true&cat=0");
        }
    }
    // $reponse->free(); $ID_Terrain->free(); $reponseMatch->free(); $reqKnock->free(); $reponseKnock->free();
    return;
?>
