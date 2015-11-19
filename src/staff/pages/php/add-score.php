<?php
include_once('BDD.php');
require_once('add-new-history.php');

//$db = BDconnect();


//$database_host = 'localhost';
//$database_user = 'root';
//$database_pass = '123';
//$database_db = 'SEProjectC';
//$db = new mysqli($database_host, $database_user, $database_pass, $database_db);
$db = BDconnect();
$IDs = $_POST['matchs'];
$Scores = $_POST['scores'];
$MatchNumber = $_POST['matchNumber'];
$MatchID = $_POST['matchsID'];
$curTeamID = $_POST['curTeamID'];
$flip = $_POST['flip'];

$req = $db->prepare("UPDATE SEProjectC.`Match` SET score1=?, score2=? WHERE `Match`.ID=?");

for ($i = 0; $i < $MatchNumber; $i++){
    $sc = explode(",", $Scores[$i]);
    $sc1=$sc[0];
    $sc2=$sc[1];
   // if($flip[$i]==0) {
        $req->bind_param("iii", $sc1, $sc2, $MatchID[$i]);
  //  }else{
   //     $req->bind_param("iii", $sc2, $sc1, $MatchID[$i]);
  //  }
    $req->execute();
    addHistory($MatchID[$i], "Match", "Ajout");
}

$req = $db->query("SELECT count(ID) as count FROM `Match` WHERE ( `score1` > `score2` AND `ID_Equipe1`=".$curTeamID." ) OR ( `score2` > `score1` AND `ID_Equipe2` =".$curTeamID.")");
$rep = $req->fetch_array();

$db->query("UPDATE SEProjectC.Team SET NbWinMatch=".$rep['count']." WHERE `Team`.ID=".$curTeamID);

// Then we update the victorious teams in the corresponding group.
$newWonNum = $rep['count'];

$req1 = 'SELECT * FROM GroupSaturday WHERE '.$id1.' = ID_t1 or '.$id1.' = ID_t2 or '.$id1.'=  ID_t3 or '.$id1.'= ID_t4 or '.$id1.'= ID_t5';
$req2 = 'SELECT * FROM GroupSunday WHERE '.$id1.' = ID_t1 or '.$id1.' = ID_t2 or '.$id1.'=  ID_t3 or '.$id1.'= ID_t4 or '.$id1.'= ID_t5 or '.$id1.'= ID_t6';
$reponseSam = $db->query($req1);
$reponseDim = $db->query($req1);
// Get ID_GS t1 t2 t3 ...

if ($reponseSam != FALSE) {
    $groupSam = $reponseSam->fetch_array();

    if ($groupSam['ID_vic1'] != NULL){
        if ($groupSam['ID_vic2'] != NULL) { // Deja 2 team victorieuses dans la poule.
            $vic_teams = $db->query('SELECT * FROM TEAM WHERE ID='.$groupSam['ID_vic1'].'or ID='.$groupSam['ID_vic2']);
            $vic1 = $vic_teams->fetch_array();
            $vic2 = $vic_teams->fetch_array();
            if ($newWonNum > $vic1['NbWinMatch']){
                $db->query("UPDATE SEProjectC.GroupSaturday SET ID_vic1=".$curTeamID.", ID_vic2=".$vic1['ID']." WHERE GroupSaturday.ID=".$groupSam['ID']);
                addHistory($groupSam['ID'], "Groupe Samedi", "Changement de vainqueur");
            } elseif($newWonNum > $vic2['NbWinMatch']){
                $db->query("UPDATE SEProjectC.GroupSaturday SET ID_vic1=".$vic1['ID'].", ID_vic2=".$curTeamID." WHERE GroupSaturday.ID=".$groupSam['ID']);
                addHistory($groupSam['ID'], "Groupe Samedi", "Changement de vainqueur");
            }
        } else{ // Une seule team victorieuse dans la poule.
            $vic_team = $db->query('SELECT * FROM TEAM WHERE ID='.$groupSam['ID_vic1'].'or ID='.$groupSam['ID_vic2']);
            $vic1 = $vic_teams->fetch_array();
            if ($newWonNum > $vic1['NbWinMatch']){
                $db->query("UPDATE SEProjectC.GroupSaturday SET ID_vic1=".$curTeamID.", ID_vic2=".$vic1['ID']." WHERE GroupSaturday.ID=".$groupSam['ID']);
            } else{
                $db->query("UPDATE SEProjectC.GroupSaturday SET ID_vic1=".$vic1['ID'].", ID_vic2=".$curTeamID." WHERE GroupSaturday.ID=".$groupSam['ID']);
            }
            addHistory($groupSam['ID'], "Groupe Samedi", "Nouveau vainqueur");
        }
    } else{ // Pas de team victorieuse dans la poule
        $db->query("UPDATE SEProjectC.GroupSaturday SET ID_vic1=".$curTeamID." WHERE GroupSaturday.ID=".$groupSam['ID']);
        addHistory($groupSam['ID'], "Groupe Samedi", "Nouveau vainqueur");
    }
}


if ($reponseDim != FALSE) {
    $groupDim = $reponseDim->fetch_array();

    if ($groupDim['ID_vic1'] != NULL){
        if ($groupDim['ID_vic2'] != NULL) { // Deja 2 team victorieuses dans la poule.
            $vic_teams = $db->query('SELECT * FROM TEAM WHERE ID='.$groupDim['ID_vic1'].'or ID='.$groupDim['ID_vic2']);
            $vic1 = $vic_teams->fetch_array();
            $vic2 = $vic_teams->fetch_array();
            if ($newWonNum > $vic1['NbWinMatch']){
                $db->query("UPDATE SEProjectC.GroupSunday SET ID_vic1=".$curTeamID.", ID_vic2=".$vic1['ID']." WHERE GroupSunday.ID=".$groupDim['ID']);
                addHistory($groupDim['ID'], "Groupe Dimanche", "Changement de vainqueur");
            } elseif($newWonNum > $vic2['NbWinMatch']){
                $db->query("UPDATE SEProjectC.GroupSunday SET ID_vic1=".$vic1['ID'].", ID_vic2=".$curTeamID." WHERE GroupSunday.ID=".$groupDim['ID']);
                addHistory($groupDim['ID'], "Groupe Dimanche", "Changement de vainqueur");
            }
        } else{ // Une seule team victorieuse dans la poule.
            $vic_team = $db->query('SELECT * FROM TEAM WHERE ID='.$groupDim['ID_vic1'].'or ID='.$groupDim['ID_vic2']);
            $vic1 = $vic_teams->fetch_array();
            if ($newWonNum > $vic1['NbWinMatch']){
                $db->query("UPDATE SEProjectC.GroupSunday SET ID_vic1=".$curTeamID.", ID_vic2=".$vic1['ID']." WHERE GroupSunday.ID=".$groupDim['ID']);
            } else{
                $db->query("UPDATE SEProjectC.GroupSunday SET ID_vic1=".$vic1['ID'].", ID_vic2=".$curTeamID." WHERE GroupSunday.ID=".$groupDim['ID']);
            }
            addHistory($groupDim['ID'], "Groupe Dimanche", "Nouveau vainqueur");
        }
    } else{
        $db->query("UPDATE SEProjectC.GroupSunday SET ID_vic1=".$curTeamID." WHERE GroupSunday.ID=".$groupDim['ID']);
        addHistory($groupDim['ID'], "Groupe Dimanche", "Nouveau vainqueur");
    }
}


?>
