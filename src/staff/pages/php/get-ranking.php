<?php
    include_once('simple_html_dom.php');
    include_once('BDD.php');

function getRanking($firstname, $lastname, $birthdata)
{

//    $firstname = 'Antoine';
//    $lastname = 'Glorieux';
//    $birthdata = '01/09/1994';
    $firstname = str_replace(" ", $firstname);
    $lastname = str_replace(" ", $lastname);

    $URL = "http://www.aftnet.be/Portail-AFT/Joueurs/Resultats-recherche-affilies.aspx?mode=searchname&nom=" . $lastname . "&prenom=" . $firstname;
    $html = file_get_html($URL);
    $Allplayer = array();
    $multiplePlayerWithSameName = false;

    $j = 0;
    foreach ($html->find('tr[class=rgRow]') as $tr) { //
        $multiplePlayerWithSameName = true;
        $i = 0;
        foreach ($tr->find('td') as $td) {
            if ($i == 1) {
                $tab1[$j] = str_replace(' ', '', $td->plaintext);
//                echo $tab1[$j] . 'in tab1['.$j .'] <br/>';
                $j++;
            }
            $i++;
        }
    }


    if ($multiplePlayerWithSameName) {
        foreach ($tab1 as $num) {
            $URL2 = "http://www.aftnet.be/Portail-AFT/Joueurs/Fiche-signaletique-membre.aspx?numfed=" . $num;
            $html2 = file_get_html($URL2);
            $i = 0;
            $tabJ = array();
            foreach ($html2->find('tr[style=height:20px]') as $tr) { //rgAltRow
                foreach ($tr->find('td') as $td) {
                    if ($i == 2) {
                        $tabJ[0] = str_replace(' ', '', $td->plaintext);
                    }
                    if ($i == 5) {
                        $tabJ[1] = str_replace(' ', '', $td->plaintext);
                    }
                    if ($i == 8) {
                        $tabJ[2] = str_replace(' ', '', $td->plaintext);
                    }
                    $i++;
                }

            }
            if (count($tabJ) > 1) {
                array_push($Allplayer, $tabJ);
            }
        }
    }

    $j = 0;
    foreach ($html->find('tr[class=rgAltRow]') as $tr) {
        $i = 0;
        foreach ($tr->find('td') as $td) {
            if ($i == 1) {
                $tab1[$j] = str_replace(' ', '', $td->plaintext);
                //                echo $tab1[$j] . 'in tab1['.$j .'] <br/>';
                $j++;
            }
            $i++;
        }
    }

    if ($multiplePlayerWithSameName) {
        foreach ($tab1 as $num) {
            $URL2 = "http://www.aftnet.be/Portail-AFT/Joueurs/Fiche-signaletique-membre.aspx?numfed=" . $num;
            $html2 = file_get_html($URL2);
            $i = 0;
            $tabJ = array();
            foreach ($html2->find('tr[style=height:20px]') as $tr) { //rgAltRow
                foreach ($tr->find('td') as $td) {
                    if ($i == 2) {
                        $tabJ[0] = str_replace(' ', '', $td->plaintext);
                    }
                    if ($i == 5) {
                        $tabJ[1] = str_replace(' ', '', $td->plaintext);
                    }
                    if ($i == 8) {
                        $tabJ[2] = str_replace(' ', '', $td->plaintext);
                    }
                    $i++;
                }

            }
            if (count($tabJ) > 1) {
                array_push($Allplayer, $tabJ);
            }
        }
    }
//    print_r($Allplayer);


    /* No Multiple Player with same name */
    if ($multiplePlayerWithSameName == false) {
        $URL2 = $URL;
        $html2 = file_get_html($URL2);
        $i = 0;
        $tabJ = array();
        foreach ($html2->find('tr[style=height:20px]') as $tr) { //rgAltRow
            foreach ($tr->find('td') as $td) {
                if ($i == 2) {
                    $tabJ[0] = str_replace(' ', '', $td->plaintext);
                }
                if ($i == 5) {
                    $tabJ[1] = str_replace(' ', '', $td->plaintext);
                }
                if ($i == 8) {
                    $tabJ[2] = str_replace(' ', '', $td->plaintext);
                }
                $i++;
            }

        }
        if (count($tabJ) > 1) {
            array_push($Allplayer, $tabJ);
        }
    }
    /* End Multiple */

    //search for the player in the array of players
    foreach ($Allplayer as $player) {
        if (str_replace(' ', '', $player[1]) == $birthdata) {
//            echo '<h1> Found ' . $firstname . ' ' . $lastname . ' (' . str_replace(' ', '', $player[0]) . ')' . ' with ranking ' . $player[2] . '</h1>';
            $result = $player;
            break;
        } else {
//            echo '<br/> not ' . $player[1] . '  ';
//            print_r($player);
        }
    }
    $result = !isset($result) ? array("","","","","") : $result;
    return array_merge([$firstname, $lastname], $result);
}
/*
$player1 = getRanking('Julien', 'Evrard', '02/06/1994');
$player2 = getRanking('Marie', 'Leyder', '22/07/1995');


$db = BDconnect();

$query = 'SELECT RankingInt FROM RankingTextToIntBelgian WHERE "'.$player1[4].'" = RankingText OR "'.$player2[4].'" = RankingText';
$RankingReponse = $db->query($query);
$rankings = $RankingReponse->fetch_array();
$rankInt1 = $rankings['RankingInt'] == null ? "NC" : $rankings['RankingInt'];
$rankings = $RankingReponse->fetch_array();
$rankInt2 = $rankings['RankingInt'] == null ? "NC" : $rankings['RankingInt'];
$rankingAvgInt = round(($rankInt1 + $rankInt2)/2);

echo '<h1> Found ' . $player1[0] . ' ' . $player1[1] . ' (' . str_replace(' ', '', $player1[2]) . ')' . ' with ranking ' . $player1[4] . ' and rankingInt= '. $rankInt1 .'</h1>';
echo '<h1> Found ' . $player2[0] . ' ' . $player2[1] . ' (' . str_replace(' ', '', $player2[2]) . ')' . ' with ranking ' . $player2[4] . ' and rankingInt= '. $rankInt2 .'</h1>';
$RankingReponse = $db->query('SELECT RankingText FROM RankingTextToIntBelgian WHERE '.$rankingAvgInt.' = RankingInt ');
$rankingAvgText = ($RankingReponse->fetch_array());
$rankingAvgText = $rankingAvgText['RankingText'];
echo '<h1> Avg ranking int='. $rankingAvgInt .' and rankingText='. $rankingAvgText .' </h1>';*/
?>