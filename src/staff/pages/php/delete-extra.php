<!-- Suppression d'un extra,
fonction appelée dans le formulaire de list.php?type=extra
Redirection vers list.php?type=extra

Mise à jour de l'historique
 -->
 <?php
	include_once('BDD.php');
	$db = BDconnect();

  if ($_GET['id'] == 1) {
    // vous ne devez pas supprimer l'extra id=1
    header("Location: ../list.php?type=extra&error=1");
    return;
  }
	// Suppression
	$db->query('DELETE FROM Extras WHERE ID='.$_GET['id']);
    require_once('add-new-history.php');
		// Mise à jour de l'historique
    addHistory( $_GET['id'], "Extra", "Suppression");

	header("Location: ../list.php?type=extra");
?>
