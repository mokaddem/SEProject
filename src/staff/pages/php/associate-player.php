<?php
include_once('BDD.php');
require_once('add-new-history.php');
include_once('get-ranking.php');
include_once('./test-delete.php');
header('Content-type: application/json');
//error_reporting(0);

$flagSucess = "failed";
$response_array['rep'] = $flagSucess;
// Ajout du duo de joueur
try {
    $db = BDconnect();
    /*  generate the team with the single player */
    $teamTemp = array();

    /*$reqAlone = "SELECT * FROM `PlayerAlone`, RankingTextToIntBelgian WHERE `Ranking`=RankingText ORDER BY `RankingInt` DESC ";
    $reponseAlone = $db->query($reqAlone);*/

    $reponseAlone = array();
    $reponse = $db->query('SELECT * FROM Personne WHERE isPlayer=1');
    while ($donnes = $reponse->fetch_array()) {
        $player = $db->query('SELECT * FROM Player WHERE ' . $donnes['ID'] . ' = ID_Personne');
        $player = $player->fetch_array();
        $ranking = ($player['Ranking'] == NULL) ? "NC" : $player['Ranking'];
        if (canDeletePlayer($donnes['ID'])) { // Returns true if the player is not in any team.
            array_push($reponseAlone, $player);
        }
    }

    $i = 0;
    foreach ($reponseAlone as $player) {
        $teamTemp[$i] = $player['ID_Personne'];
        error_log("i=" . $i . ", " . "teamTeamp=" . $teamTemp[$i]);
        $classTemp[$i] = $player['Ranking'];
        $i++;
    }
    $playerNumber = ($i + 1);
    for ($i = 0; $i != $playerNumber; $i++) {
// ---------------------AJOUTER TEAM--------------------------
        $req = $db->prepare("INSERT INTO Team(ID, ID_player1, ID_player2, ID_Cat, NbWinMatch, AvgRanking) VALUES(?, ?, ?, ?, ?, ?)");

        $ID = '';
        $flag1Alone = 0;
        if ($i + 1 >= ($playerNumber - 1)) {
            $flag1Alone = 1;
        }
        $ID_player1 = $teamTemp[$i];
        $ID_player2 = $flag1Alone == 1 ? 0 : $teamTemp[$i + 1];

        $reqPersonne1 = "SELECT *, YEAR(BirthDate) as `yeari`, month(BirthDate) as `monthi`, day(BirthDate) as `dayi` FROM `Personne` WHERE Personne.ID=" . $teamTemp[$i];
//    error_log("i=".$i);
        $repPersonne1 = $db->query($reqPersonne1)->fetch_array();
        if (!$flag1Alone) {
            $reqPersonne2 = "SELECT *, YEAR(BirthDate) as `yeari`, month(BirthDate) as `monthi`, day(BirthDate) as `dayi` FROM `Personne` WHERE Personne.ID=" . $teamTemp[$i + 1];
            $repPersonne2 = $db->query($reqPersonne2)->fetch_array();
        }

        /*On determine sa categorie - START */
// Get l'age le plus grand des deux joueurs

        $ageCurrent = max(intval(date('Y')) - $repPersonne1['yeari'], intval(date('Y')) - $repPersonne2['yeari']);
        $reponse = $db->query('SELECT * FROM Categorie');
        $ID_Cat = '';

// Parcours des categories
        foreach ($reponse as $donnees) {
            $ageCat = explode(" - ", $donnees["Age"]);

// Si l'âge est dans la tranche d'âge on l'ajoute à cette catégorie
            if ($ID_Cat == '') {
                $ID_Cat = $donnees['ID'];
            }
            if (intval($ageCat[0]) <= $ageCurrent && intval($ageCat[1]) >= $ageCurrent) {
                $ID_Cat = $donnees['ID'];
            }
        }

        /*On determine sa categorie - END */
        $NbmatchWin = '0';

        $Birth1 = date('d', mktime(0, 0, 0, 0, intval($repPersonne1['dayi']))) . "/" . date('m', mktime(0, 0, 0, intval($repPersonne1['monthi']))) . "/" . $repPersonne1['yeari'];
        $Birth2 = date('d', mktime(0, 0, 0, 0, intval($repPersonne2['dayi']))) . "/" . date('m', mktime(0, 0, 0, intval($repPersonne2['monthi']))) . "/" . $repPersonne2['yeari'];

        $ranking1 = $classTemp[$i];
        $ranking2 = $classTemp[($i + 1)];
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

        if (!$flag1Alone) {
            $req->bind_param("iiiiis", $ID, $ID_player1, $ID_player2, $ID_Cat, $NbmatchWin, $rankingAvgText);
            $req->execute();
            error_log($ID . ', ' . $ID_player1 . ', ' . $ID_player2 . ', ' . $ID_Cat . ', ' . $NbmatchWin . ', ' . $rankingAvgText);
            $flagSucess = "success";
        }
        $i++;
    }
    /*  end team generate   */
    $response_array['rep'] = $flagSucess;
    error_log($response_array['rep']);
    header('Content-type: application/json');
    echo json_encode($response_array);
}catch (Exception $e) {
    error_log("error:".$response_array['rep']);
    echo json_encode($response_array);
}
error_log($response_array['rep']);
echo json_encode($response_array);
?>