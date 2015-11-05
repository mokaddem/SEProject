<?php
	include_once('BDD.php');
	$db = new BDD();

	$db->query('DELETE FROM Terrain WHERE ID='.$_GET['id']);
	header("Location: ../list-court.php");
?>
