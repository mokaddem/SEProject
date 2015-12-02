<!-- Mise à jour des vainqueurs des groupes,
fonction appelée dans le formulaire de group-winner.php
 et dans le formulaire d'inscription de la page d'accueil utilisateur
Redirection vers list.php?type=player ou la page d'accueil utilisateur

Mise à jour de l'historique
 -->
 <?php
	include_once('BDD.php');
    require_once('add-new-history.php');
	include_once('get-ranking.php');
 	$db = BDconnect();

 	// First of all, we remove every existing victors.
 	if ($_GET['jour']=="sam"){
		$req = 'SELECT *, GroupSaturday.ID as Gid FROM GroupSaturday, Team WHERE GroupSaturday.ID_t1 = Team.ID AND Team.ID_Cat = '.$_GET['cat'].'';
	} else{
		$req = 'SELECT *, GroupSunday.ID as Gid FROM GroupSunday, Team WHERE GroupSunday.ID_t1 = Team.ID AND Team.ID_Cat = '.$_GET['cat'].'';
	}
 	$groups = $db->query($req);
 	while($group = $groups->fetch_array()){
		$db->query('UPDATE Team SET Group_Vic = 0 WHERE Team.ID.='.$group['ID_t1'].' or Team.ID.='.$group['ID_t2'].' or Team.ID.='.$group['ID_t3'].' or Team.ID.='.$group['ID_t4'].' or Team.ID.='.$group['ID_t5'].' or Team.ID.='.$group['ID_t6'].' or Team.ID.='.$group['ID_t7'].' or Team.ID.='.$group['ID_t8']);
	}

	// Pour chaque winner sélectionné dans group-winner, on met à jour.
 	$teamNum = 8;
 	for ($i = 1; $i <= $teamNum; $i++) {
		if (isset($_GET["winner".$i])) {
			$teamID = $_GET["winner".$i];
			$db->query('UPDATE Team SET Group_Vic = 1 WHERE '.$teamID.'=ID');
			// Mise à jour de l'historique
			addHistory( $teamID, "Vainqueur - Team ".$teamID, "Ajout");
		} else {
			$i = $teamNum;
		} // On arrete la boucle.
	}


 	$sql1 = 'UPDATE Team SET Group_Vic = 1 WHERE '.$teamID.'=ID';
?>
