<!-- Ajout d'une nouvelle équipe à partir de deux joueurs inscrits n'ayant pas d'équipe,
fonction appelée dans le formulaire de team.php
Redirection vers list-team.php

Mise à jour de l'historique
-->
<?php
include_once('BDD.php');
// Mise à jour de l'historique
require_once('add-new-history.php');

// Ajout de l'équipe
$db = BDconnect();
$req = $db->prepare("INSERT INTO Team(ID, ID_player1, ID_player2, ID_Cat, NbWinMatch) VALUES(?, ?, ?, ?, ?)");

$ID	 	= '';
$ID_player1	= $_GET['sel1'];
$ID_player2	= $_GET['sel2'];

/*On determine la categorie - START */
// Get l'age le plus grand des deux joueurs
$personne1 = $db->query('SELECT * FROM Personne WHERE ID='.$ID_player1)->fetch_array();
$personne2 = $db->query('SELECT * FROM Personne WHERE ID='.$ID_player2)->fetch_array();
$age1 = explode(" - ", $personne1["BirthDate"]);
$age2 = explode(" - ", $personne2["BirthDate"]);
$ageCurrent = max(intval(date('Y')) - intval($age1[0]), intval(date('Y')) - intval($age2[0]));
$reponse = $db->query('SELECT * FROM Categorie');
$ID_Cat		= '1';

// Parcours des categories
foreach ($reponse as $donnees) {
	$ageCat = explode(" - ", $donnees["Age"]);

	// Si l'âge est dans la tranche d'âge on l'ajoute à cette catégorie
	if (intval($ageCat[0])<= $ageCurrent && intval($ageCat[1]) >= $ageCurrent) {
		$ID_Cat		= $donnees['ID'];
	}
}
/*On determine la categorie - END */

$NbmatchWin	= '0';

if ($ID_player1 == $ID_player2) {
	header("Location: ../team.php?error=player");
	return;
}

$req->bind_param("iiiii", $ID, $ID_player1, $ID_player2, $ID_Cat, $NbmatchWin);

$req->execute();

$reponse = $db->query('SELECT * FROM Team WHERE '.$ID_player1.' = ID_Player1 AND '.$ID_player2.' = ID_Player2');
$donnees = $reponse->fetch_array();

$db->query('DELETE FROM PlayerAlone WHERE ID_Personne='.$ID_player1.' OR ID_Personne='.$ID_player2);

	// Mise à jour de l'historique
addHistory( $donnees["ID"], "Equipe", "Ajout");
$reponse->free();
header("Location: ../team.php");
?>
