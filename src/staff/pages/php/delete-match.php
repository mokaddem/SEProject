<?php
	include_once('BDD.php');
	$db = new BDD();

	$db->query('DELETE FROM `Match` WHERE ID='.$_GET['id']);
    require_once('add-new-history.php');
    addHistory( $_GET['id'], "Match", "Suppression");

	header("Location: ../list.php?type=match");
?>
