<!-- Suppression d'un match,
fonction appelée dans le formulaire de list-match.php
Redirection vers list-match.php

Mise à jour de l'historique
 -->
 <?php
	include_once('BDD.php');
	$db = BDconnect();

	// Suppression
	$db->query('DELETE FROM `Match` WHERE ID='.$_GET['id']);
	// Mise à jour de l'historique
    require_once('add-new-history.php');
    addHistory( $_GET['id'], "Match", "Suppression");

	header("Location: ../list-match.php");
?>
