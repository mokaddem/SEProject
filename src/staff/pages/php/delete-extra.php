<?php
	include_once('BDD.php');
	$db = new BDD();

	$db->query('DELETE FROM Extras WHERE ID='.$_GET['id']);
    require_once('add-new-history.php');
    addHistory( $_GET['id'], "Extra", "Suppression");

	header("Location: ../list.php?type=extra");
?>
