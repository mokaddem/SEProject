<?php
	include_once('BDD.php');
	require_once('test-delete.php');

	var_dump(canDeletePlayer($_GET['id']));
	if (!canDeletePlayer($_GET['id'])) {
		header("Location: ../list.php?type=player&error=creation");
	} else {
		$db = BDconnect();

		$db->query('DELETE FROM Personne WHERE ID='.$_GET['id']);
		$db->query('DELETE FROM Player WHERE ID_Personne='.$_GET['id']);

		require_once('add-new-history.php');
		addHistory( $_GET['id'], "Joueur", "Suppression");

		header("Location: ../list.php?type=player");
	}

?>
