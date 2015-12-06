<?php
include_once('BDD.php');
require_once('add-new-history.php');
include_once('get-ranking.php');


// Ajout du duo de joueur
$db = BDconnect();
/*  generate the team with the single player */
$teamTemp = array();
$reqAlone = "SELECT * FROM `PlayerAlone`, RankingTextToIntBelgian WHERE `Ranking`=RankingText ORDER BY `RankingInt` DESC ";
$reponseAlone = $db->query($reqAlone);

$i=0;
foreach ($reponseAlone as $player) {
    $teamTemp[$i] = $player['ID_Personne'];
    $classTemp[$i] = $player['Ranking'];
    $i++;
}
$playerNumber=($i+1);
for($i=0; $i!=$playerNumber; $i++) {
// ---------------------AJOUTER TEAM--------------------------
    $req = $db->prepare("INSERT INTO Team(ID, ID_player1, ID_player2, ID_Cat, NbWinMatch, AvgRanking) VALUES(?, ?, ?, ?, ?, ?)");

    $ID = '';
    $flag1Alone = 0;
    if ($i + 1 >= ($playerNumber-1)) {
        $flag1Alone = 1;
    }
    $ID_player1 = $teamTemp[$i];
    $ID_player2 = $flag1Alone == 1 ? 0 : $teamTemp[($i + 1)];

    $reqPersonne1 = "SELECT *, YEAR(BirthDate) as `yeari`, month(BirthDate) as `monthi`, day(BirthDate) as `dayi` FROM `Personne` WHERE Personne.ID=".$teamTemp[$i];
    $repPersonne1 = $db->query($reqPersonne1)->fetch_array();
    if(!$flag1Alone) {
        $reqPersonne2 = "SELECT *, YEAR(BirthDate) as `yeari`, month(BirthDate) as `monthi`, day(BirthDate) as `dayi` FROM `Personne` WHERE Personne.ID=" . $teamTemp[$i + 1];
        $repPersonne2 = $db->query($reqPersonne2)->fetch_array();
    }

    /*On determine sa categorie - START */
// Get l'age le plus grand des deux joueurs

    $ageCurrent = max(intval(date('Y')) - $repPersonne1['yeari'], intval(date('Y')) - $repPersonne2['yeari']);
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

    $Birth1	= date('d',mktime (0, 0, 0, 0, intval($repPersonne1['dayi'])))."/".date('m', mktime (0, 0, 0, intval($repPersonne1['monthi'])))."/".$repPersonne1['yeari'];
    $Birth2	= date('d',mktime (0, 0, 0, 0, intval($repPersonne2['dayi'])))."/".date('m', mktime (0, 0, 0, intval($repPersonne2['monthi'])))."/".$repPersonne2['yeari'];

/*    $ranking1 = getRanking($repPersonne1['FirstName'], $repPersonne1['LastName'], $Birth1);
    $ranking1[4] = $ranking1[4]== "" ? "NC" : $ranking1[4];
    $ranking2 = getRanking($repPersonne2['FirstName'], $repPersonne2['LastName'], $Birth2);
    $ranking2[4] = $ranking2[4]== "" ? "NC" : $ranking2[4];
//    $ranking2[4] = $flag1Alone == 1 ? "" :$ranking2[4];
    error_log(serialize($ranking1)."     ".serialize($ranking2));
    error_log($ranking1[4]." & ".$ranking2[4]);*/
    $ranking1=$classTemp[$i];
    $ranking2=$classTemp[($i+1)];
    $query = 'SELECT RankingInt FROM RankingTextToIntBelgian WHERE "' . $ranking1 . '" = RankingText UNION ALL SELECT RankingInt FROM RankingTextToIntBelgian WHERE "' . $ranking2 . '" = RankingText';
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
        $RankingReponse = $db->query('DELETE FROM PlayerAlone WHERE ID_Personne=' . $ID_player1);
        $RankingReponse = $db->query('DELETE FROM PlayerAlone WHERE ID_Personne=' . $ID_player2);
    }
    $i++;
}
/*  end team generate   */
    $msg = array("success"=>"everything is ok");
    header('Content-type: application/json');
    echo json_encode($msg);die;
?>