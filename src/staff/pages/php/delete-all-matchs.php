<?php
	include_once('BDD.php');
	$db = BDconnect();

	$db->query('DELETE FROM `Match`');
    
    require_once('add-new-history.php');
    addHistory(0, "Matchs (tous)", "Suppression");

	header("Location: ../list-match.php");
?>
