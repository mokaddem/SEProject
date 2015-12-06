<!-- Suppression des knock off,
fonction appelée dans le formulaire de reset.php
Redirection vers group-generate.php

Mise à jour de l'historique
 -->
 <?php
	include_once('BDD.php');


	$db = BDconnect();

	// Suppression des Matches, Group & Knock-off
 	$db->query("DELETE FROM `Match`");
	$db->query('DELETE FROM GroupSunday');
	$db->query('DELETE FROM GroupSaturday');
	$db->query('DELETE FROM KnockoffSaturday');
	$db->query('DELETE FROM KnockoffSunday');

 	// Plus aucune team n'est victorieuse.
 	$db->query('UPDATE Team set NbWinMatch=0, Group_Vic = 0');
    $req = $db->query("UPDATE SEProjectC.GlobalVariables SET `Value` = \"0\" WHERE `Name` = \"tournament_started_sam\"");
	$req = $db->query("UPDATE SEProjectC.GlobalVariables SET `Value` = \"0\" WHERE `Name` = \"tournament_started_dim\"");


	// Mise à jour de l'historique
    require_once('add-new-history.php');
    addHistory( 0, "Groupes & Knock-Off", "Suppression");

	header("Location: ../group-generate.php?jour=sam");
?>
