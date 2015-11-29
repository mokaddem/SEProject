<?php
    include_once('simple_html_dom.php');

    $firstname1 = 'Marie';
    $lastname1 = 'Leyder';
    $birth = '21/07/1995';

    $URL = "http://www.aftnet.be/Portail-AFT/Joueurs/Resultats-recherche-affilies.aspx?mode=searchname&nom=".$lastname1."&prenom=".$firstname1;
    // $URLtest = "http://www.aftnet.be/Portail-AFT/Joueurs/Resultats-recherche-affilies.aspx?mode=searchname&nom="."Evrard"."&prenom="."Julien";
    // Create DOM from URL or file
    $html = file_get_html($URL);
    $Allplayer = array();
    $multiplePlayerWithSameName = false;

    $j=0;
    foreach($html->find('tr[class=rgRow]') as $tr){ //
        $multiplePlayerWithSameName=true;
        $i=0;
        foreach($tr->find('td') as $td){
            if ($i==1) {
                $tab1[$j] = str_replace(' ', '',$td->plaintext);
                echo $tab1[$j] . 'in tab1['.$j .'] <br/>';
                $j++;
            }
            $i++;
        }
    }


    if($multiplePlayerWithSameName) {
        foreach ($tab1 as $num) {
            $URL2 = "http://www.aftnet.be/Portail-AFT/Joueurs/Fiche-signaletique-membre.aspx?numfed=" . $num;
            $html2 = file_get_html($URL2);
            $i = 0;
            $tabJ = array();
            foreach ($html2->find('tr[style=height:20px]') as $tr) { //rgAltRow
                foreach ($tr->find('td') as $td) {
                    if ($i == 2) {
                        $tabJ[0] = $td->plaintext;
                    }
                    if ($i == 5) {
                        $tabJ[1] = $td->plaintext;
                    }
                    if ($i == 8) {
                        $tabJ[2] = $td->plaintext;
                    }
                    $i++;
                }

            }
            if (count($tabJ) > 1) {
                array_push($Allplayer, $tabJ);
            }
        }
    }

    $j=0;
    foreach($html->find('tr[class=rgAltRow]') as $tr){
        $i=0;
        foreach($tr->find('td') as $td){
            if ($i==1) {
                $tab1[$j] = str_replace(' ', '',$td->plaintext);
    //                echo $tab1[$j] . 'in tab1['.$j .'] <br/>';
                $j++;
            }
            $i++;
        }
    }

    if($multiplePlayerWithSameName) {
        foreach ($tab1 as $num) {
            $URL2 = "http://www.aftnet.be/Portail-AFT/Joueurs/Fiche-signaletique-membre.aspx?numfed=" . $num;
            $html2 = file_get_html($URL2);
            $i = 0;
            $tabJ = array();
            foreach ($html2->find('tr[style=height:20px]') as $tr) { //rgAltRow
                foreach ($tr->find('td') as $td) {
                    if ($i == 2) {
                        $tabJ[0] = $td->plaintext;
                    }
                    if ($i == 5) {
                        $tabJ[1] = $td->plaintext;
                    }
                    if ($i == 8) {
                        $tabJ[2] = $td->plaintext;
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
if ($multiplePlayerWithSameName==false) {
        $URL2 = $URL;
        $html2 = file_get_html($URL2);
        $i = 0;
        $tabJ = array();
        foreach ($html2->find('tr[style=height:20px]') as $tr) { //rgAltRow
            foreach ($tr->find('td') as $td) {
                if ($i == 2) {
                    $tabJ[0] = $td->plaintext;
                }
                if ($i == 5) {
                    $tabJ[1] = $td->plaintext;
                }
                if ($i == 8) {
                    $tabJ[2] = $td->plaintext;
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
    foreach ($Allplayer as $player){
        if (str_replace(' ', '',$player[1] ) == $birth) {
            echo '<h1> Found '.$firstname1.' '.$lastname1.' With ranking '.$player[2] .'</h1>';
            break;
        }
        else {
//            echo '<br/> not ' . $player[1] . '  ';
//            print_r($player);
        }
    }

?>