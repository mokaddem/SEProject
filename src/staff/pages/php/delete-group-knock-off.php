<!-- Suppression des knock off,
fonction appelée dans le formulaire de reset.php
Redirection vers group-generate.php

Mise à jour de l'historique
 -->
 <?php
	include_once('BDD.php');


	$db = BDconnect();
/*
	$knockoffSam = $db->query("SELECT * FROM KnockoffSaturday");
	foreach($knockoffSam as $knock) {
		$match = $db->query("DELETE FROM `Match` WHERE ID=".$knock['ID_Match']);
	}
	$knockoffSun = $db->query("SELECT * FROM KnockoffSunday");
	foreach($knockoffSun as $knock) {
		$match = $db->query("DELETE FROM `Match` WHERE ID=".$knock['ID_Match']);
	}

	$groupsSam = $db->query("SELECT * FROM GroupSaturday");
	foreach($groupsSam as $groupSam) {
		$match = $db->query("DELETE FROM `Match` WHERE Poule_ID=".$groupSam['ID']);
	}
	$groupsSun = $db->query("SELECT * FROM GroupSunday");
	foreach($groupsSun as $groupSun) {
		$match = $db->query("DELETE FROM `Match` WHERE Poule_ID=".$groupSun['ID']);
	}
*/
 	// Can we DELETE all teams?
 	$db->query("DELETE FROM `Match`");

 	// None of the team is a victorious one now:

	// Suppression
	$db->query('DELETE FROM GroupSunday');
	$db->query('DELETE FROM GroupSaturday');
	$db->query('DELETE FROM KnockoffSaturday');
	$db->query('DELETE FROM KnockoffSunday');

 	$db->query('UPDATE Team set NbWinMatch=0, Group_Vic = 0');
	 $req = $db->query("UPDATE SEProjectC.GlobalVariables SET `Value` = \"0\" WHERE `Name` = \"tournament_started\"");


	// Mise à jour de l'historique
    require_once('add-new-history.php');
    addHistory( 0, "Groupes & Knock-Off", "Suppression");

	header("Location: ../group-generate.php?jour=sam");
?>
