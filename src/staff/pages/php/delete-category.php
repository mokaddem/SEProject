<?php
	include_once('BDD.php');
	$db = new BDD();

	$db->query('DELETE FROM Categorie WHERE ID='.$_GET['id']);
    require_once('add-new-history.php');
    addHistory( $_GET['id'], utf8_decode("Catégorie"), "Suppression");

	header("Location: ../list.php?type=category");
?>
