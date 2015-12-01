<!-- Suppression de tous les matchs,
fonction appelée dans le formulaire de list-match.php
Redirection vers list-match.php

Mise à jour de l'historique
 -->
<?php
	include_once('BDD.php');
	$db = BDconnect();

	// Suppression de tous les matchs,
	$db->query('DELETE FROM `Match`');

		// Mise à jour de l'historique
    require_once('add-new-history.php');
    addHistory(0, "Matchs (tous)", "Suppression");

	header("Location: ../list-match.php");
?>
