<!-- Suppression d'un extra,
fonction appelée dans le formulaire de list.php?type=extra
Redirection vers list.php?type=extra

Mise à jour de l'historique
 -->
 <?php
	include_once('BDD.php');
	$db = BDconnect();

	// Suppression
	$db->query('DELETE FROM Extras WHERE ID='.$_GET['id']);
    require_once('add-new-history.php');
		// Mise à jour de l'historique
    addHistory( $_GET['id'], "Extra", "Suppression");

	header("Location: ../list.php?type=extra");
?>
