<!-- Suppression d'un terrain,
fonction appelée dans le formulaire de list.php?type=court
Redirection vers list.php?type=court

Mise à jour de l'historique
 -->
 <?php
	include_once('BDD.php');
require_once('test-delete.php');

$db = BDconnect();

	if (!canDeleteCourt($_GET['id'])) {
		header("Location: ../list.php?type=court&error=creation");
	} else {
	// Suppression
	$db->query('DELETE FROM Terrain WHERE ID='.$_GET['id']);

	// Mise à jour de l'historique
    require_once('add-new-history.php');
    addHistory( $_GET['id'], "Terrain", "Suppression");

	header("Location: ../list.php?type=court");
}
?>
