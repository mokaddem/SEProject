<?php

include_once('BDD.php');
require_once('add-new-history.php');
$db = BDconnect();

$matchID = $_GET['matchID'];
$indice = $_GET['indice'];
$textTeam = $indice==1 ? "ID_Equipe1": "ID_Equipe2" ;

$query = "UPDATE SEProjectC.`Match` SET score1=0, score2=0, ".$textTeam."=0 WHERE `Match`.ID=?";
$req = $db->prepare($query);
$req->bind_param("i", $matchID);
$req->execute();

addHistory($matchID, "Match", "Ajout");

header("Location: ../input-knock-score.php?jour=".$_GET['jour']."&cat=".$_GET['cat']);
?>