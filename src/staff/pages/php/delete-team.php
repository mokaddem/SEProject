<?php
	include_once('BDD.php');
	$db = new BDD();

	$db->query('DELETE FROM Team WHERE ID='.$_GET['id']);
	header("Location: /staff/pages/list-team.php");
?>
