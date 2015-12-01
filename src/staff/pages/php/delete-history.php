<!-- Suppression de l'historique,
fonction appelée dans le formulaire de index.php
Redirection vers index.php

Mise à jour de l'historique
 -->
 <?php
	include_once('BDD.php');
	$db = BDconnect();

	// Suppression
	$db->query('DELETE FROM History');

	// Mise à jour de l'historique
    require_once('add-new-history.php');
    addHistory( 0, "Historique", "Suppression");

	header("Location: ../index.php");
?>
