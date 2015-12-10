<?php
include_once('BDD.php');
include "../../../mail/mail_helper.php";
require_once('add-new-history.php');
include_once('get-ranking.php');


// Ajout du duo de joueur
$db = BDconnect();

$verification_code = $_GET['code'];

$reqId = "SELECT Personne_ID as ID FROM ConfirmationPersonne WHERE Code=".$verification_code;
$repId = $db->query($reqId);
$ID = $repId->extract('ID');

$queryPers = "INSERT INTO Personne SELECT * FROM TmpPersonne WHERE TmpPersonne.ID=".$ID;
$queryPersonneExtra = "INSERT INTO PersonneExtra SELECT * FROM TmpPersonneExtra.Personne_ID WHERE ".$ID;
$queryPlayer = "INSERT INTO Player SELECT * FROM TmpPlayer WHERE TmpPlayer.ID_Personne".$ID;

$db->query($queryPers);
$db->query($queryPersonneExtra);
$db->query($queryPlayer);

//add the confirmation for this player in Tmpteam
$reqteamId = "SELECT * FROM TmpTeam WHERE ID_Player1=".$ID." OR ID_Player2=".$ID;
$repteamId = $db->query($reqteamId);
$teamID = $repteamId->extract('ID');

$repChoosePlayer = $db->query('SELECT ID_Player1 as p1, ID_Player2 as p2 FROM TmpTeam WHERE ID='.$ID);
$repChoosePlayer = $repChoosePlayer->fetch_array();
if($repChoosePlayer['p1']== $ID){
    $playerText = "player1_confirmed";
}else{
    $playerText = "player2_confirmed";
}

$reqAddConfirmation = "UPDATE TmpTeam SET ".$playerText."=1 WHERE ID=".$teamID;
$repAddConfirmation = $db->query($repAddConfirmation);


//check if the two players have confirmed their inscription
$reqPlayerConfirmed = "SELECT player1_confirmed as p1, player2_confirmed as p2 FROM TmpTeam WHERE ID=".$ID;
$repPlayerConfirmed = $db->query($reqPlayerConfirmed);
$repPlayerConfirmed = -$repPlayerConfirmed->fetch_array();

if(($repPlayerConfirmed['p1'] == 1) AND ($repPlayerConfirmed['p2'] == 1)){
    $queryTeam = "INSERT INTO Team SELECT * FROM TmpTeam WHERE TmpTeam".$ID;
    $db->query($queryTeam);
}

?>