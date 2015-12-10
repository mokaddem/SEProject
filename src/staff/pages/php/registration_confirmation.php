<?php
include_once('BDD.php');
include "../../../mail/mail_helper.php";
require_once('add-new-history.php');
include_once('get-ranking.php');


// Ajout du duo de joueur
$db = BDconnect();

$verification_code = $_GET['code'];
$reqId = "SELECT Personne_ID as ID FROM ConfirmationPersonne WHERE Code=\"".$verification_code."\"";
$repId = $db->query($reqId)->fetch_array();
$ID = $repId['ID'];

$queryPers = "INSERT INTO Personne SELECT * FROM TmpPersonne WHERE TmpPersonne.ID=".$ID;
$queryPersonneExtra = "INSERT INTO PersonneExtra SELECT * FROM TmpPersonneExtra WHERE TmpPersonneExtra.Personne_ID=".$ID;
$queryPlayer = "INSERT INTO Player SELECT * FROM TmpPlayer WHERE TmpPlayer.ID_Personne=".$ID;

$db->query($queryPers);
$db->query($queryPersonneExtra);
$db->query($queryPlayer);

//add the confirmation for this player in Tmpteam
$reqteamId = "SELECT * FROM TmpTeam WHERE ID_Player1=".$ID." OR ID_Player2=".$ID;
$repteamId = $db->query($reqteamId)->fetch_array();
$teamID = $repteamId['ID'];

$repChoosePlayer = $db->query('SELECT ID_Player1 as p1, ID_Player2 as p2 FROM TmpTeam WHERE ID='.$teamID);
$repChoosePlayer = $repChoosePlayer->fetch_array();
if($repChoosePlayer['p1']== $ID){
    $playerText = "player1_confirmed";
}else{
    $playerText = "player2_confirmed";
}

$reqAddConfirmation = "UPDATE TmpTeam SET ".$playerText."=1 WHERE ID=".$teamID;
error_log($reqAddConfirmation);
$repAddConfirmation = $db->query($reqAddConfirmation);


//check if the two players have confirmed their inscription
$reqPlayerConfirmed = "SELECT player1_confirmed as p1, player2_confirmed as p2 FROM TmpTeam WHERE ID=".$teamID;
$repPlayerConfirmed = $db->query($reqPlayerConfirmed);
$repPlayerConfirmed = $repPlayerConfirmed->fetch_array();

if(($repPlayerConfirmed['p1'] == 1) AND ($repPlayerConfirmed['p2'] == 1)){
    $queryTeam = "INSERT INTO Team(ID, ID_Player1, ID_Player2, ID_Cat, NbWinMatch, AvgRanking, Group_Vic) SELECT ID, ID_Player1, ID_Player2, ID_Cat, NbWinMatch, AvgRanking, Group_Vic FROM TmpTeam WHERE ID=".$teamID;
    $db->query($queryTeam);
}

?>