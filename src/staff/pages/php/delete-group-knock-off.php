<?php
	include_once('BDD.php');
    

	$db = new BDD();

	$knockoffSam = $db->query("SELECT * FROM KnockoffSaturday");
	foreach($knockoffSam as $knock) {
		$match = $db->query("DELETE FROM `Match` WHERE ID=".$knock['ID_Match']);
	}
	$knockoffSun = $db->query("SELECT * FROM KnockoffSunday");
	foreach($knockoffSun as $knock) {
		$match = $db->query("DELETE FROM `Match` WHERE ID=".$knock['ID_Match']);
	}


	$db->query('DELETE FROM GroupSunday');
	$db->query('DELETE FROM GroupSaturday');
	$db->query('DELETE FROM KnockoffSaturday');
	$db->query('DELETE FROM KnockoffSunday');


    require_once('add-new-history.php');
    addHistory( 0, "Groupes & Knock-Off", "Suppression");
    
	header("Location: ../group-generate.php?jour=sam");
?>
