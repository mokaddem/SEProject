<?php

include_once('BDD.php');
require_once('add-new-history.php');
$db = BDconnect();

$matchID=$_POST['matchID'];
$teamID=$_POST['teamID'];
$indice=$_POST['indice'];
$textTeam = $indice==1 ? "ID_Equipe1": "ID_Equipe2" ;

$query = "UPDATE SEProjectC.`Match` SET score1=0, score2=0, ".$textTeam."=? WHERE `Match`.ID=?";
$req = $db->prepare($query);
$req->bind_param("ii", $teamID, $matchID);
$req->execute();
addHistory($matchID, "Match", "Ajout");

echo "success";
?>