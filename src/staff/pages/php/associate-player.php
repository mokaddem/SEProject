<?php
include_once('BDD.php');
require_once('add-new-history.php');
include_once('get-ranking.php');


// Ajout du duo de joueur
$db = BDconnect();

/*  generate the team with the single player */

$teamTemp = array();
$reqAlone = "SELECT * FROM `Player`, RankingTextToIntBelgian WHERE `Ranking`=RankingText ORDER BY `RankingInt` DESC ";
$reponseAlone = $db->query($reqAlone);

$i=0;
foreach ($reponseAlone as $player) {
    $teamTemp[$i] = $player;
    $i++;
}
$playerNumber=$i;

for($i=0; $i==$playerNumber; $i++) {
// ---------------------AJOUTER TEAM--------------------------
    $req = $db->prepare("INSERT INTO Team(ID, ID_player1, ID_player2, ID_Cat, NbWinMatch, AvgRanking) VALUES(?, ?, ?, ?, ?, ?)");

    $ID = '';
    $flag1Alone = 0;
    if ($i + 1 > $playerNumber) {
        $flag1Alone = 1;
    }
    $ID_player1 = $teamTemp[$i];
    $ID_player2 = $flag1Alone == 1 ? 0 : $teamTemp[($i + 1)];

    /*On determine sa categorie - START */
// Get l'age le plus grand des deux joueurs
    $ageCurrent = max(intval(date('Y')) - intval($_GET['birth_year1']), intval(date('Y')) - intval($_GET['birth_year2']));
    $reponse = $db->query('SELECT * FROM Categorie');
    $ID_Cat = '1';

// Parcours des categories
    foreach ($reponse as $donnees) {
        $ageCat = explode(" - ", $donnees["Age"]);

// Si l'âge est dans la tranche d'âge on l'ajoute à cette catégorie
        if (intval($ageCat[0]) <= $ageCurrent && intval($ageCat[1]) >= $ageCurrent) {
            $ID_Cat = $donnees['ID'];
        }
    }

    /*On determine sa categorie - END */
    $NbmatchWin = '0';

    $ranking1 = getRanking($FirstName1, $LastName1, $Birth1);
    $ranking2 = $flag1Alone == 1 ? "" :getRanking($FirstName2, $LastName2, $Birth2);
    $query = 'SELECT RankingInt FROM RankingTextToIntBelgian WHERE "' . $ranking1[4] . '" = RankingText OR "' . $ranking2[4] . '" = RankingText';
    $RankingReponse = $db->query($query);
    $rankings = $RankingReponse->fetch_array();
    $rankInt1 = $rankings['RankingInt'];
    $rankings = $RankingReponse->fetch_array();
    $rankInt2 = $rankings['RankingInt'];
    $rankingAvgInt = round(($rankInt1 + $rankInt2) / 2);
    $RankingReponse = $db->query('SELECT RankingText FROM RankingTextToIntBelgian WHERE ' . $rankingAvgInt . ' = RankingInt ');
    $rankingAvgText = ($RankingReponse->fetch_array());
    $rankingAvgText = $rankingAvgText['RankingText'];

    if(!$flag1Alone) {
        $req->bind_param("iiiiis", $ID, $ID_player1, $ID_player2, $ID_Cat, $NbmatchWin, $rankingAvgText);
        $req->execute();
    }
}
/*  end team generate   */

?>