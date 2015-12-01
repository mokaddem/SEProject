<!-- Suppression d'une équipe,
fonction appelée dans le formulaire de list-team.php
Redirection vers list-team.php

Mise à jour de l'historique
 -->
 <?php
	include_once('BDD.php');
require_once('test-delete.php');

$db = BDconnect();

	var_dump(canDeleteTeam($_GET['id']));
	if (!canDeleteTeam($_GET['id'])) {
		header("Location: ../list-team.php?error=creation");
	} else {
		// Suppression
		$db->query('DELETE FROM Team WHERE ID='.$_GET['id']);

		// Mise à jour de l'historique
		require_once('add-new-history.php');
		addHistory( $_GET['id'], "Equipe", "Suppression");

		header("Location: ../list-team.php");
	}

?>
