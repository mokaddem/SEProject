<!-- Generation des knock-off,
fonction appelée dans le formulaire de knock-off-generate.php
Redirection vers knock-off.php

Mise à jour de l'historique
 -->
<?php
    include_once('inc/add-knock-off.inc');
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
            $knocktable = "KnockoffSaturday";
            $vicTeams = $db->query('SELECT *, Team.ID as teamID FROM Team, GroupSaturday, RankingTextToIntBelgian WHERE Team.Group_Vic = 1 AND Team.ID_Cat = ' . $_GET['InputCat'] . ' AND Team.AvgRanking=RankingTextToIntBelgian.RankingText AND (GroupSaturday.ID_t1 = Team.ID OR GroupSaturday.ID_t2 = Team.ID OR GroupSaturday.ID_t3 = Team.ID OR GroupSaturday.ID_t4 = Team.ID OR GroupSaturday.ID_t5 = Team.ID OR GroupSaturday.ID_t6 = Team.ID OR GroupSaturday.ID_t7 = Team.ID OR GroupSaturday.ID_t8 = Team.ID) ORDER BY RankingTextToIntBelgian.RankingInt DESC');
            $row = $db->query('SELECT COUNT(Team.ID) as numberOfTeams FROM GroupSaturday, Team WHERE Team.Group_Vic = 1 AND Team.ID_Cat = ' . $_GET['InputCat'] . ' AND (GroupSaturday.ID_t1 = Team.ID OR GroupSaturday.ID_t2 = Team.ID OR GroupSaturday.ID_t3 = Team.ID OR GroupSaturday.ID_t4 = Team.ID OR GroupSaturday.ID_t5 = Team.ID OR GroupSaturday.ID_t6 = Team.ID OR GroupSaturday.ID_t7 = Team.ID OR GroupSaturday.ID_t8 = Team.ID)');
            extract($row->fetch_array());
            $row->free();
        } else {
            $knocktable = "KnockoffSunday";
            $vicTeams = $db->query('SELECT *, Team.ID as teamID FROM Team, GroupSunday, RankingTextToIntBelgian WHERE Team.Group_Vic = 1 AND Team.ID_Cat = ' . $_GET['InputCat'] . ' AND Team.AvgRanking=RankingTextToIntBelgian.RankingText AND (GroupSunday.ID_t1 = Team.ID OR GroupSunday.ID_t2 = Team.ID OR GroupSunday.ID_t3 = Team.ID OR GroupSunday.ID_t4 = Team.ID OR GroupSunday.ID_t5 = Team.ID OR GroupSunday.ID_t6 = Team.ID OR GroupSunday.ID_t7 = Team.ID OR GroupSunday.ID_t8 = Team.ID) ORDER BY RankingTextToIntBelgian.RankingInt DESC');
            $row = $db->query('SELECT COUNT(Team.ID) as numberOfTeams FROM GroupSunday, Team WHERE Team.Group_Vic = 1 AND Team.ID_Cat = ' . $_GET['InputCat'] . ' AND (GroupSunday.ID_t1 = Team.ID OR GroupSunday.ID_t2 = Team.ID OR GroupSunday.ID_t3 = Team.ID OR GroupSunday.ID_t4 = Team.ID OR GroupSunday.ID_t5 = Team.ID OR GroupSunday.ID_t6 = Team.ID OR GroupSunday.ID_t7 = Team.ID OR GroupSunday.ID_t8 = Team.ID)');
            extract($row->fetch_array());
            $row->free();
        }
        $reponse = $db->query("SELECT * FROM " . $knocktable . " WHERE Category = " . $_GET['InputCat']);
        $bool = $reponse->fetch_array();
        if ($bool != NULL) {
            header("Location: ../knock-off-generate.php?error=yes_" . $_GET['jour'] . "&jour=" . $_GET['jour']);
            return;
        } elseif ($numberOfTeams == 0) {
            if (!array_key_exists("jour", $_GET)) {
                header("Location: ../knock-off-generate.php?error=no_selection");
                return;
            }
            header("Location: ../knock-off-generate.php?error=no_" . $_GET['jour'] . "&jour=" . $_GET['jour']);
            return;
        }

        createKnock($db, $knocktable, $_GET['InputCat'], $numberOfTeams, $vicTeams);
        header("Location: ../knock-off.php?jour=dim&generate=true&cat=0");
    }
    // $reponse->free(); $ID_Terrain->free(); $reponseMatch->free(); $reqKnock->free(); $reponseKnock->free();
    return;
?>