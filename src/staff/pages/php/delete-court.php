<?php
	include_once('BDD.php');
	$db = new BDD();

	$db->query('DELETE FROM Terrain WHERE ID='.$_GET['id']);

    require_once('add-new-history.php');
    addHistory( $_GET['id'], "Terrain", "Suppression");

	header("Location: ../list-court.php");
?>
