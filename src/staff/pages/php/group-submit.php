<?php
	include_once('BDD.php');
    require_once('add-new-history.php');

	$db = BDconnect();

	if ($_GET['jour'] == "sam"){
		//$groups = $db->query('SELECT * FROM GroupSaturday');
		$row = $db->query('SELECT COUNT(ID) as numberOfGroups FROM GroupSaturday')->fetch_array();
		$rowDistinct = $db->query('SELECT COUNT(DISTINCT ID_terrain) AS distinctGroups FROM GroupSaturday')->fetch_array();
		extract($row);
		extract($rowDistinct);
	} else{
		//$groups = $db->query('SELECT * FROM GroupSunday');
		$row = $db->query('SELECT COUNT(ID) as numberOfGroups FROM GroupSunday')->fetch_array();
		$rowDistinct = $db->query('SELECT COUNT(DISTINCT ID_terrain) AS distinctGroups FROM GroupSunday')->fetch_array();
		extract($row);
		extract($rowDistinct);
	}
	if ($numberOfGroups != $distinctGroups){
		header("Location: ../group.php?jour=".$_GET['jour']."&poule=".$_GET['poule']."&submitting=incorrect");
	} else{
		header("Location: ../group.php?jour=".$_GET['jour']."&poule=".$_GET['poule']."&submitting=correct");
	}
?>
