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
    if($flip[$i]==0) {
        $req->bind_param("iii", $sc1, $sc2, $MatchID[$i]);
    }else{
        $req->bind_param("iii", $sc2, $sc1, $MatchID[$i]);
    }
    $req->execute();
    addHistory($MatchID[$i], "Match", "Ajout");
}

$req = $db->query("SELECT count(ID) as count FROM `Match` WHERE ( `score1` > `score2` AND `ID_Equipe1`=".$curTeamID." ) OR ( `score2` > `score1` AND `ID_Equipe2` =".$curTeamID.")");
$rep = $req->fetch_array();

$db->query("UPDATE SEProjectC.Team SET NbWinMatch=".$rep['count']." WHERE `Team`.ID=".$curTeamID);

?>
