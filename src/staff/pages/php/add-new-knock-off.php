<?php
	include_once('BDD.php');
    require_once('add-new-history.php');
    //include("../../../mail/mail_helper.php");

    //$database_host = 'localhost';
    //$database_user = 'root';
    //$database_pass = '123';
    //$database_db = 'SEProjectC';
	//$db = new mysqli($database_host, $database_user, $database_pass, $database_db);
$db = BDconnect();

    if ($_GET['jour'] == "sam"){
        $table = "KnockoffSaturday";
        $groups = $db->query('SELECT * FROM GroupSaturday');
        $row = $db->query('SELECT COUNT(ID) as numberOfGroups FROM GroupSaturday')->fetch_array();
        extract($row);
        $reponse = $db->query("SELECT * FROM ".$table);
        $bool = $reponse->fetch_array();
        if ($bool != NULL) {
            header("Location: ../knock-off-generate.php?error=yes_sam&jour=".$_GET['jour']);
            return;
        } elseif ($numberOfGroups == 0) {
            header("Location: ../knock-off-generate.php?error=no_sam&jour=".$_GET['jour']);
            return;
        }
    } else{
        $table = "KnockoffSunday";
        $groups = $db->query('SELECT * FROM GroupSunday');
        $row = $db->query('SELECT COUNT(ID) as numberOfGroups FROM GroupSunday')->fetch_array();
        extract($row);
        $reponse = $db->query("SELECT * FROM ".$table);
        $bool = $reponse->fetch_array();
        if ($bool != NULL) {
            header("Location: ../knock-off-generate.php?error=yes_dim&jour=".$_GET['jour']);
            return;
        } elseif ($numberOfGroups == 0) {
            header("Location: ../knock-off-generate.php?error=no_dim&jour=".$_GET['jour']);
            return;
        }
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
        addHistory($donneesMatch['ID'], "Match", "Ajout");

        $reqKnock = $db->prepare("INSERT INTO ".$table."(ID, ID_Match, `Position`) VALUES(?, ?, ?)");
        $ID = '';
        $ID_Match = $donneesMatch['ID'];
        $reqKnock->bind_param("iii", $ID, $ID_Match, $i);
        $reqKnock->execute();
        $reponseKnock = $db->query("SELECT * FROM ".$table." WHERE ID_Match =".$ID_Match." AND `Position`=".$i);
        $donneesKnock = $reponseKnock->fetch_array();
        addHistory($donneesKnock['ID'], "Match-knock-off-Samedi", "Ajout");

    }
    if ($_GET['jour']=="sam"){
        header("Location: ../knock-off.php?jour=sam&generate=true&cat=1");
    }
    elseif ($_GET['jour']=="dim"){
        header("Location: ../knock-off.php?jour=dim&generate=true&cat=1");
    }
    return;

    //header("Location: ../group-generate.php?error=no_selection");

?>
