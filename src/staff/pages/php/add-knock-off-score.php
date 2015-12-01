<!-- Ajout d'un score dans la BDD
Fonction appelée dans le formulaire de input-knock-score.php

Mise à jour de l'historique
-->
<?php
include_once('../BDD.php');
require_once('../add-new-history.php');

// Ajout du score
$db = BDconnect();

$ID	 	= $_GET['ID_Match'];
$Date = date("Y-m-d", strtotime($_GET['InputDate']));
$Hour = date("H:i", strtotime($_GET['InputHour']));
$ID_Equipe1	= $_GET['InputEq1'];
$ID_Equipe2	= $_GET['InputEq2'];
$ID_Terrain = $_GET['InputCourt'];
$score1 = $_GET['score1'];
$score2 = $_GET['score2'];


$reponse = $db->query("UPDATE SEProjectC.Match SET score2 = \"".$score2."\", score1=\"" .$score1. "\" WHERE ".$ID."= ID");
// Mise à jour de l'historique
addHistory($ID, "Match-Knock", "Score");

header("Location: ../input-knock-score.php?jour=".$_GET['id']);

?>
