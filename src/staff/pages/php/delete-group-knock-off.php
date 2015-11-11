<?php
	include_once('BDD.php');
    

	$db = new BDD();

	$db->query('DELETE FROM GroupSunday');
	$db->query('DELETE FROM GroupSaturday');

    require_once('add-new-history.php');
    addHistory( 0, "Groupes", "Suppression");
    
	header("Location: ../group-overview.php");
?>
