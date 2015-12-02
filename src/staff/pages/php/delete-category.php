<!-- Suppression d'une catégorie,
fonction appelée dans le formulaire de list.php?type=category
Redirection vers list.php?type=category

Mise à jour de l'historique
 -->
 <?php
	include_once('BDD.php');
	$db = BDconnect();

  if ($_GET['id'] == 1) {
    // vous ne devez pas supprimer l'extra id=1
    header("Location: ../list.php?type=category");
    return;
  }

  // Suppression
	$db->query('DELETE FROM Categorie WHERE ID='.$_GET['id']);

// Mise à jour de l'historique
		require_once('add-new-history.php');
    addHistory( $_GET['id'], utf8_decode("Catégorie"), "Suppression");

	header("Location: ../list.php?type=category");
?>
