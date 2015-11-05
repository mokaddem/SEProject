<?php
	include_once('BDD.php');
	$db = new BDD();

	$db->query('DELETE FROM Team WHERE ID='.$_GET['id']);

    require_once('add-new-history.php');
    addHistory(1, 1, "Equipe", "Suppression");

	header("Location: /staff/pages/list-team.php");
?>
