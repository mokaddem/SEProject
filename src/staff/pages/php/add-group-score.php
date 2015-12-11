<!-- Mise à jour du score dans la page input-group-score.php,
fonction appelée en dynamique dans le formulaire de input-group-score.php

Mise à jour de l'historique
 -->
 <?php
include_once('BDD.php');
require_once('add-new-history.php');

// Mise à jour du score
$db = BDconnect();
$IDs = $_POST['matchs'];
$Scores = $_POST['scores'];
$MatchNumber = $_POST['matchNumber'];
$MatchID = $_POST['matchsID'];
$curTeamID = $_POST['curTeamID'];
$PouleID = $_POST['pouleID'];
$flip = $_POST['flip'];

$req = $db->prepare("UPDATE SEProjectC.`Match` SET score1=?, score2=? WHERE `Match`.ID=?");

for ($i = 0; $i < $MatchNumber; $i++){
    $sc = explode(",", $Scores[$i]);
    if($flip[$i] == 0) {
        $sc1 = $sc[0];
        $sc2 = $sc[1];
    }
    else{
        $sc1 = $sc[1];
        $sc2 = $sc[0];
    }

    $req->bind_param("iii", $sc1, $sc2, $MatchID[$i]);
    $req->execute();
    // Mise à jour de l'historique
    addHistory($MatchID[$i], "Match", "Input score");

    // Update the NbWinMatch for the opposing team.
    $otherTeamID = $db->query('SELECT Team.ID as id FROM Team,`Match` WHERE `Match`.ID = '.$MatchID[$i].' AND Team.ID != '.$curTeamID.' AND (Team.ID = `Match`.ID_Equipe1 OR Team.ID = `Match`.ID_Equipe2)')->fetch_array();
    $rep = $db->query("SELECT count(ID) as count FROM `Match` WHERE ( `score1` > `score2` AND `ID_Equipe1`=".$otherTeamID['id']." ) OR ( `score2` > `score1` AND `ID_Equipe2` =".$otherTeamID['id'].") AND Poule_ID=".$PouleID)->fetch_array();
    $db->query("UPDATE SEProjectC.Team SET NbWinMatch=".$rep['count']." WHERE `Team`.ID=".$otherTeamID['id']);
}

//  Update the team we selected.
$req = $db->query("SELECT count(ID) as count FROM `Match` WHERE ( `score1` > `score2` AND `ID_Equipe1`=".$curTeamID." ) OR ( `score2` > `score1` AND `ID_Equipe2` =".$curTeamID.") AND Poule_ID=".$PouleID);
$rep = $req->fetch_array();
$db->query("UPDATE SEProjectC.Team SET NbWinMatch=".$rep['count']." WHERE `Team`.ID=".$curTeamID);


 ?>
