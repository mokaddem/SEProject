<?php
	include_once('BDD.php');
    

	$db = new BDD();

	$db->query('DELETE FROM Personne WHERE ID='.$_GET['id']);
    
    require_once('add-new-history.php');
    addHistory( $_GET['id'], "Joueur", "Suppression");
    
	header("Location: ../list.php?type=player");
?>
