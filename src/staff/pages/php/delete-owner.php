<?php
	include_once('BDD.php');
	$db = new BDD();

	$db->query('DELETE FROM Personne WHERE ID='.$_GET['id']);
	$db->query('DELETE FROM Owner WHERE ID_Personne='.$_GET['id']);

    require_once('add-new-history.php');
    addHistory( $_GET['id'], "Propriétaire", "Suppression");

	header("Location: ../list-owner.php");
?>
