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
        } else {
            $knocktable = "KnockoffSunday";
        }

        $categories = $db->query('SELECT * FROM Categorie');
        $numCatDone = 0;
        foreach ($categories as $cat) {
            $catName = $cat['Designation'];
            $catID = $cat['ID'];
            $generate = true;
            $getcat = $db->query("SELECT DISTINCT Category FROM " . $knocktable);
            foreach ($getcat as $doneCat) {
                if ($doneCat['Category'] == $catID) {
                    $generate = false;
                }
            }
            if ($generate) {
                if ($_GET['jour'] == "sam") {
                    $vicTeams = $db->query('SELECT *, Team.ID as teamID FROM Team, GroupSaturday, RankingTextToIntBelgian WHERE Team.Group_Vic = 1 AND Team.ID_Cat = ' . $catID . ' AND Team.AvgRanking=RankingTextToIntBelgian.RankingText AND (GroupSaturday.ID_t1 = Team.ID OR GroupSaturday.ID_t2 = Team.ID OR GroupSaturday.ID_t3 = Team.ID OR GroupSaturday.ID_t4 = Team.ID OR GroupSaturday.ID_t5 = Team.ID OR GroupSaturday.ID_t6 = Team.ID OR GroupSaturday.ID_t7 = Team.ID OR GroupSaturday.ID_t8 = Team.ID) ORDER BY RankingTextToIntBelgian.RankingInt DESC');
                    $row = $db->query('SELECT COUNT(Team.ID) as numberOfTeams FROM GroupSaturday, Team WHERE Team.Group_Vic = 1 AND Team.ID_Cat = ' . $catID . ' AND (GroupSaturday.ID_t1 = Team.ID OR GroupSaturday.ID_t2 = Team.ID OR GroupSaturday.ID_t3 = Team.ID OR GroupSaturday.ID_t4 = Team.ID OR GroupSaturday.ID_t5 = Team.ID OR GroupSaturday.ID_t6 = Team.ID OR GroupSaturday.ID_t7 = Team.ID OR GroupSaturday.ID_t8 = Team.ID)');
                    extract($row->fetch_array());
                    $row->free();
                } else {
                    $vicTeams = $db->query('SELECT *, Team.ID as teamID FROM Team, GroupSunday, RankingTextToIntBelgian WHERE Team.Group_Vic = 1 AND Team.ID_Cat = ' . $catID . ' AND Team.AvgRanking=RankingTextToIntBelgian.RankingText AND (GroupSunday.ID_t1 = Team.ID OR GroupSunday.ID_t2 = Team.ID OR GroupSunday.ID_t3 = Team.ID OR GroupSunday.ID_t4 = Team.ID OR GroupSunday.ID_t5 = Team.ID OR GroupSunday.ID_t6 = Team.ID OR GroupSunday.ID_t7 = Team.ID OR GroupSunday.ID_t8 = Team.ID) ORDER BY RankingTextToIntBelgian.RankingInt DESC');
                    $row = $db->query('SELECT COUNT(Team.ID) as numberOfTeams FROM GroupSunday, Team WHERE Team.Group_Vic = 1 AND Team.ID_Cat = ' . $catID . ' AND (GroupSunday.ID_t1 = Team.ID OR GroupSunday.ID_t2 = Team.ID OR GroupSunday.ID_t3 = Team.ID OR GroupSunday.ID_t4 = Team.ID OR GroupSunday.ID_t5 = Team.ID OR GroupSunday.ID_t6 = Team.ID OR GroupSunday.ID_t7 = Team.ID OR GroupSunday.ID_t8 = Team.ID)');
                    extract($row->fetch_array());
                    $row->free();
                }
                var_dump($numberOfTeams);
                if ($numberOfTeams > 0) {
                    $numCatDone++;
                }
                createKnock($db, $knocktable, $catID, $numberOfTeams, $vicTeams);
            }
        }
        if ($numCatDone == 0) {
            header("Location: ../knock-off-generate.php?error=no_team");
        } else {
            header("Location: ../knock-off.php?jour=" . $_GET['jour'] . "&generate=true&cat=0");
        }
    }
    // $reponse->free(); $ID_Terrain->free(); $reponseMatch->free(); $reqKnock->free(); $reponseKnock->free();
    return;
?>
