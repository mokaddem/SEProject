<?php
	include_once('BDD.php');
require_once('test-delete.php');

$db = BDconnect();

	if (!canDeleteCourt($_GET['id'])) {
		header("Location: ../list.php?type=court&error=creation");
	} else {

	$db->query('DELETE FROM Terrain WHERE ID='.$_GET['id']);

	header("Location: ../list.php?type=court");
}
?>
