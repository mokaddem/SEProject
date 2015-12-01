<!-- Generation des knock-off,
fonction appelée dans le formulaire de knock-off-generate.php
Redirection vers knock-off.php

Mise à jour de l'historique
 -->
<?php
	include_once('BDD.php');
    require_once('add-new-history.php');

	// Generation du knock-off
    $db = BDconnect();

    if ($_GET['jour'] == "sam"){
        $table = "KnockoffSaturday";
        $groups = $db->query('SELECT * FROM GroupSaturday, Team WHERE GroupSaturday.ID_t1 = Team.ID AND Team.ID_Cat = '.$_GET['InputCat'].'');
        $row = $db->query('SELECT COUNT(*) as numberOfGroups FROM GroupSaturday, Team WHERE GroupSaturday.ID_t1 = Team.ID AND Team.ID_Cat = '.$_GET['InputCat'].'')->fetch_array();
        extract($row);
    } else{
        $table = "KnockoffSunday";
        $groups = $db->query('SELECT * FROM GroupSunday');
        $row = $db->query('SELECT COUNT(ID) as numberOfGroups FROM GroupSunday')->fetch_array();
        extract($row);
    }
    $reponse = $db->query("SELECT * FROM ".$table);
    $bool = $reponse->fetch_array();
    if ($bool != NULL) {
        header("Location: ../knock-off-generate.php?error=yes_".$_GET['jour']."&jour=".$_GET['jour']);
        return;
    } elseif ($numberOfGroups == 0) {
        header("Location: ../knock-off-generate.php?error=no_".$_GET['jour']."&jour=".$_GET['jour']);
        return;
    }

    for ($i = 1; $i <= ($numberOfGroups*2)-1; $i++) {
        if ($i <= $numberOfGroups) {
            $group = $groups->fetch_array();
            $teamID1 = $group["ID_vic1"];
            $teamID2 = $group["ID_vic2"];
            if ($teamID1 == 0 or $teamID2 == 0){
                header("Location: ../knock-off-generate.php?error=no_team&jour=".$_GET['jour']);
                return;
            }
        } else{
            $teamID1 = 0;
            $teamID2 = 0;
        }
        $reqMatch = $db->prepare('INSERT INTO `Match`(ID, `date`, `hour`, ID_Equipe1, ID_Equipe2, score1, score2, ID_Terrain, Poule_ID) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $ID	 	= '';
        $date = date('Y-m-d');
        $hour = date("H:i");
        $score1 = 0;
        $score2 = 0;
        $ID_Terrain = $db->query("SELECT * FROM Terrain")->fetch_array();
        $Poule_ID = NULL;

        $reqMatch->bind_param("issiiiiii", $ID, $date, $hour, $teamID1, $teamID2, $score1, $score2, $ID_Terrain['ID'], $Poule_ID);
        $reqMatch->execute();
        $reponseMatch = $db->query("SELECT * FROM `Match` WHERE ID_Terrain =".$ID_Terrain['ID']." AND ID_Equipe1=".$teamID1." AND ID_Equipe2=".$teamID2);
        $donneesMatch = $reponseMatch->fetch_array();
				// Mise à jour de l'historique
        addHistory($donneesMatch['ID'], "Match", "Ajout");

        $reqKnock = $db->prepare("INSERT INTO ".$table."(ID, ID_Match, `Position`) VALUES(?, ?, ?)");
        $ID = '';
        $ID_Match = $donneesMatch['ID'];
        $reqKnock->bind_param("iii", $ID, $ID_Match, $i);
        $reqKnock->execute();
        $reponseKnock = $db->query("SELECT * FROM ".$table." WHERE ID_Match =".$ID_Match." AND `Position`=".$i);
        $donneesKnock = $reponseKnock->fetch_array();

        if ($_GET['jour'] == "sam"){
					// Mise à jour de l'historique
            addHistory($donneesKnock['ID'], "Knock-Off (Samedi)", "Ajout");
        }
        elseif ($_GET['jour'] == "dim") {
					// Mise à jour de l'historique
          addHistory($donneesKnock['ID'], "Knock-Off (Dimanche)", "Ajout");
        }

    }
    if ($_GET['jour']=="sam"){
        header("Location: ../knock-off.php?jour=sam&generate=true&cat=1");
    }
    elseif ($_GET['jour']=="dim"){
        header("Location: ../knock-off.php?jour=dim&generate=true&cat=1");
    }
    return;
?>
