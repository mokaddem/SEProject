<?php
	include_once('BDD.php');
	$db = new BDD();

	$db->query('DELETE FROM Personne WHERE ID='.$_GET['id']);
	header("Location: /staff/pages/list-player.php");
?>
