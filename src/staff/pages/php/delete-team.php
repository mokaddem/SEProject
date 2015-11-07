<?php
	include_once('BDD.php');
	$db = new BDD();

	$db->query('DELETE FROM Team WHERE ID='.$_GET['id']);
    require_once('add-new-history.php');
    addHistory( $_GET['id'], "Equipe", "Suppression");

	header("Location: ../list-team.php");
?>
