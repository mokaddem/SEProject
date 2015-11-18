<?php
	include_once('BDD.php');
    

	$db = BDconnect();

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


	$db->query('DELETE FROM GroupSunday');
	$db->query('DELETE FROM GroupSaturday');
	$db->query('DELETE FROM KnockoffSaturday');
	$db->query('DELETE FROM KnockoffSunday');


    require_once('add-new-history.php');
    addHistory( 0, "Groupes & Knock-Off", "Suppression");
    
	header("Location: ../group-generate.php?jour=sam");
?>
