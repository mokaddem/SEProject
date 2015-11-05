<?php
	include_once('BDD.php');
    

	$db = new BDD();

	$db->query('DELETE FROM Personne WHERE ID='.$_GET['id']);
    
    require_once('add-new-history.php');
    addHistory(1, 1, "Joueur", "Suppression");
    
	header("Location: ../list-player.php");
?>
