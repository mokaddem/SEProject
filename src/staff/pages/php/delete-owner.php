<?php
	include_once('BDD.php');
	require_once('test-delete.php');
	$db = BDconnect();

	if (!canDeleteOwner($_GET['id'])) {
		header("Location: ../list.php?type=owner&error=creation");
	} else {
		$db->query('DELETE FROM Personne WHERE ID='.$_GET['id']);
		$db->query('DELETE FROM Owner WHERE ID_Personne='.$_GET['id']);

		require_once('add-new-history.php');
		addHistory( $_GET['id'], utf8_decode("Propriétaire"), "Suppression");

		header("Location: ../list.php?type=owner");
	}
?>
