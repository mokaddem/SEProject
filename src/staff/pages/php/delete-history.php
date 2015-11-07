<?php
	include_once('BDD.php');
	$db = new BDD();

	$db->query('DELETE FROM History');

    require_once('add-new-history.php');
    addHistory( 0, "Historique", "Suppression");

	header("Location: ../index.php");
?>
