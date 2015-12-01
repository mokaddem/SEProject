<!-- Ajout d'une nouvelle équipe à partir de deux joueurs inscrits n'ayant pas d'équipe,
fonction appelée dans le formulaire de team.php
Redirection vers list-team.php

Mise à jour de l'historique
 --><?php
	include_once('BDD.php');
	// Mise à jour de l'historique
  require_once('add-new-history.php');

	// Ajout de l'équipe
	$db = BDconnect();
	$req = $db->prepare("INSERT INTO Team(ID, ID_player1, ID_player2, ID_Cat, NbWinMatch) VALUES(?, ?, ?, ?, ?)");

	$ID	 	= '';
	$ID_player1	= $_GET['sel1'];
	$ID_player2	= $_GET['sel2'];
	$ID_Cat		= $_GET['InputCat'];
	$NbmatchWin	= '0';

	if ($ID_player1 == $ID_player2) {
		header("Location: ../team.php?error=player");
		return;
	}

	$req->bind_param("iiiii", $ID, $ID_player1, $ID_player2, $ID_Cat, $NbmatchWin);

	$req->execute();

    $reponse = $db->query('SELECT * FROM Team WHERE '.$ID_player1.' = ID_Player1 AND '.$ID_player2.' = ID_Player2');
    $donnees = $reponse->fetch_array();

    addHistory( $donnees["ID"], "Equipe", "Ajout");
	header("Location: ../list-team.php");
?>
