<?php
	include_once('BDD.php');
	$db = new BDD();

	$db->query('DELETE FROM Terrain WHERE ID='.$_GET['id']);

    require_once('add-new-history.php');
    addHistory(1, 1, "Terrain", "Suppression");

	header("Location: /staff/pages/list-court.php");
?>
