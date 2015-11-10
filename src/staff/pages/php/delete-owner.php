<?php
	include_once('BDD.php');
	$db = new BDD();

	$db->query('DELETE FROM Personne WHERE ID='.$_GET['id']);
	$db->query('DELETE FROM Owner WHERE ID_Personne='.$_GET['id']);
	header("Location: ../list-owner.php");
?>
