<!-- Suppression d'un propriétaire,
fonction appelée dans le formulaire de list.php?type=owner
Redirection vers list.php?type=owner

Mise à jour de l'historique
 -->
 <?php
	include_once('BDD.php');
	require_once('test-delete.php');
	$db = BDconnect();

	if (!canDeleteOwner($_GET['id'])) {
		header("Location: ../list.php?type=owner&error=creation");
	} else {
		// Suppression
		$db->query('DELETE FROM Personne WHERE ID='.$_GET['id']);
		$db->query('DELETE FROM Owner WHERE ID_Personne='.$_GET['id']);

		// Mise à jour de l'historique
		require_once('add-new-history.php');
		addHistory( $_GET['id'], utf8_decode("Propriétaire"), "Suppression");

		header("Location: ../list.php?type=owner");
	}
?>
