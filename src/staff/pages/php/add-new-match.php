<!-- Ajout d'un nouveau match,
fonction appelée dans le formulaire de match.php
Redirection vers list-match.php

Mise à jour de l'historique
 -->
 <?php
	include_once('BDD.php');
	// Mise à jour de l'historique
  require_once('add-new-history.php');
	// Ajout du match
	$db = BDconnect();
	$req = $db->prepare("INSERT INTO `Match`(ID, date, hour, ID_Equipe1, ID_Equipe2, score1, score2, ID_Terrain) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");

	$ID	 	= '';
    $Date = date("Y-m-d", strtotime($_GET['InputDate']));
    $Hour = date("H:i", strtotime($_GET['InputHour']));
    $ID_Equipe1	= $_GET['InputEq1'];
    $ID_Equipe2	= $_GET['InputEq2'];
    $Score1		= 0;
	$Score2		= 0;
    $ID_Terrain = $_GET['InputCourt'];

if ($ID_Equipe1 == $ID_Equipe2) {
    header("Location: ../match.php?error=player");
    return;
}

	$req->bind_param("issiiiii", $ID, $Date, $Hour, $ID_Equipe1, $ID_Equipe2, $Score1, $Score2, $ID_Terrain);

	$req->execute();

$reponse = $db->query("SELECT * FROM `Match` WHERE date = \"".$Date ."\" AND ID_Equipe1 = " . $ID_Equipe1 ." AND ID_Equipe2 = " . $ID_Equipe2 ." ");
$donnees = $reponse->fetch_array();
// Mise à jour de l'historique
addHistory($donnees["ID"], "Match", "Ajout");

  $reponse->free();
	header("Location: ../list-match.php");

?>
