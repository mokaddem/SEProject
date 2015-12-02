<!-- Generation des poules,
fonction appelée dans le formulaire de group-generate.php
Redirection vers group.php

Mise à jour de l'historique
 -->
<?php
	include_once('BDD.php');

    require_once('add-new-history.php');

		// Generation de la poule
		$db = BDconnect();
    function insertSam($db, $ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5, $groupSize){
        $reponse = $db->query("SELECT * FROM Terrain");
        $donnees = $reponse->fetch_array();

        $req = $db->prepare("INSERT INTO GroupSaturday(ID, ID_terrain, ID_t1, ID_t2, ID_t3, ID_t4, ID_t5, ID_vic1, ID_vic2) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $ID	 	= '';
        $ID_terrain = $donnees['ID'];
        $ID_vic1    = 0;
        $ID_vic2    = 0;

        $req->bind_param("iiiiiiiii", $ID, $ID_terrain, $ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5, $ID_vic1, $ID_vic2);
        $req->execute();

        $reponse = $db->query("SELECT * FROM GroupSaturday WHERE ID_t1=".$ID_t1);
        $donnees = $reponse->fetch_array();
				// Mise à jour de l'historique
        addHistory($donnees['ID'], "Poules (Samedi)", "Ajout");

        /* Add Matchs */

        $req = $db->prepare("INSERT INTO `Match`(ID,`date`,`hour`,ID_Equipe1,ID_Equipe2,score1,score2,ID_Terrain,Poule_ID) VALUES(?,?,?,?,?,?,?,?,?)");

        $datetime = new DateTime('tomorrow');
        $datetime->format('Y-m-d');

        $ID         = '';
        $date       = date('Y-m-d');
        $hour       = date("08:30");
				echo $hour;
        // $hour       = "8:30" //date("H:i");
				// echo $hour;
        $score1     = 0;
        $score2     = 0;
        $ID_Terrain = $ID_terrain;
        $Poule_ID   = $donnees['ID'];

        $ID_Equipes = array($ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5);

        for($i=0; $i<$groupSize; $i++){
            for($j=1+$i; $j<$groupSize; $j++){
                $ID_Equipe1 = $ID_Equipes[$i];
                $ID_Equipe2 = $ID_Equipes[$j];
                //error_log("Added: ".$ID_Equipe1." + ".$ID_Equipe2." + ".$date." + ".$hour." + ".$score1." + ".$score2." + ".$ID_Terrain." + ".$Poule_ID);
                $req->bind_param("issiiiiii", $ID,$date,$hour,$ID_Equipe1,$ID_Equipe2,$score1,$score2,$ID_Terrain,$Poule_ID);
                $req->execute();

                $reponse = $db->query("SELECT * FROM `Match` WHERE ID_Equipe1=".$ID_Equipe1." AND ID_Equipe2=".$ID_Equipe2);
                $donnees = $reponse->fetch_array();
								// Mise à jour de l'historique
                addHistory($donnees['ID'], "Match", "Ajout");

            }
        }
				$reponse->free();
        return $Poule_ID;

    }

    function insertDim($db, $ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5, $ID_t6, $groupSize){
        $req = $db->prepare("INSERT INTO GroupSunday(ID, ID_terrain, ID_t1, ID_t2, ID_t3, ID_t4, ID_t5, ID_t6, ID_vic1, ID_vic2) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        echo "Prepare";
        $ID	 	= '';
        $ID_terrain = NULL;
        $ID_vic1    = NULL;
        $ID_vic2    = NULL;

        $req->bind_param("iiiiiiiiii", $ID, $ID_terrain, $ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5, $ID_t6, $ID_vic1, $ID_vic2);
        echo "Bind";
        $req->execute();

        $reponse = $db->query("SELECT * FROM GroupSunday WHERE ID_t1=".$ID_t1);
        $donnees = $reponse->fetch_array();
				// Mise à jour de l'historique
        addHistory($donnees['ID'], "Poules (Dimanche)", "Ajout");


        /* Add Matchs */

        $req = $db->prepare("INSERT INTO `Match`(ID,`date`,`hour`,ID_Equipe1,ID_Equipe2,score1,score2,ID_Terrain,Poule_ID) VALUES(?,?,?,?,?,?,?,?,?)");

        $datetime = new DateTime('tomorrow');
        $datetime->format('Y-m-d');

        $ID         = '';
        $date       = date("Y-m-d");
				$hour       = date("08:30");
				//$hour       = date("H:i");
        $score1     = NULL;
        $score2     = NULL;
        $ID_Terrain = $ID_terrain;
        $Poule_ID   = $donnees['ID'];

        $ID_Equipes = array($ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5, $ID_t6);

        for($i=0; $i<$groupSize; $i++){
            for($j=1; $j<$groupSize-$i; $j++){
                $ID_Equipe1 = $ID_Equipes[$i];
                $ID_Equipe2 = $ID_Equipes[$j];

                $req->bind_param("issiiiiii", $ID,$date,$hour,$ID_Equipe1,$ID_Equipe2,$score1,$score2,$ID_Terrain,$Poule_ID);
                $req->execute();

                $reponse = $db->query("SELECT * FROM `Match` WHERE ID_Equipe1=".$ID_Equipe1." AND ID_Equipe2=".$ID_Equipe2);
                $donnees = $reponse->fetch_array();
								// Mise à jour de l'historique
                addHistory($donnees['ID'], "Match", "Ajout");

            }
        }
				$reponse->free();

        return $Poule_ID;
    }

    if (array_key_exists("InputCat", $_GET) && $_GET['jour']=="sam"){

        $getPoules = $db->query("SELECT ID_t1 FROM `GroupSaturday`");
        foreach ($getPoules as $poule) {
            $getTeams = $db->query('SELECT ID_Cat FROM `Team` WHERE Team.ID ='.$poule['ID_t1'].'');
            $bool = $getTeams->fetch_array();
            var_dump($bool['ID_Cat']);
            if ($bool['ID_Cat'] == $_GET['InputCat']) {
                header("Location: ../group-generate.php?error=no_sam");
                return;
            }

        }

        $reponse = $db->query("SELECT * FROM `GroupSaturday`");

        $reponseTeams = $db->query('SELECT * FROM Team WHERE ID_Cat='.$_GET['InputCat'].'');
        $i=1;
        $ID_t1 = NULL; $ID_t2 = NULL; $ID_t3 = NULL; $ID_t4 = NULL; $ID_t5 = NULL;
        foreach ($reponseTeams as $team){
            if ($i == 1){
                $ID_t1 = $team['ID'];
            } elseif($i == 2){
                $ID_t2 = $team['ID'];
            } elseif($i == 3){
                $ID_t3 = $team['ID'];
            } elseif($i == 4){
                $ID_t4 = $team['ID'];
            } if($i == 5){
                $ID_t5 = $team['ID'];
                $Poule_ID = insertSam($db, $ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5, $i);
                $i = 0;
                $ID_t1 = NULL; $ID_t2 = NULL; $ID_t3 = NULL; $ID_t4 = NULL; $ID_t5 = NULL;
            }
            $i++;
        }
        if ($i > 1 and $i <= 5){
            $Poule_ID = insertSam($db, $ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5, $i-1);
        }
				$getPoules->free();
				$reponse->free();

        header("Location: ../group.php?jour=sam&generate=true&cat=".$_GET['InputCat']);
        return;
    }
    elseif (array_key_exists("InputCat", $_GET) && $_GET['jour']=="dim"){

        $getPoules = $db->query("SELECT ID_t1 FROM `GroupSunday`");
        foreach ($getPoules as $poule) {
            $getTeams = $db->query('SELECT ID_Cat FROM `Team` WHERE Team.ID ='.$poule['ID_t1'].'');
            $bool = $getTeams->fetch_array();
            var_dump($bool['ID_Cat']);
            if ($bool['ID_Cat'] == $_GET['InputCat']) {
                header("Location: ../group-generate.php?error=no_dim");
                return;
            }

        }


        $reponse = $db->query("SELECT * FROM `GroupSunday`");

        $reponseTeams = $db->query('SELECT * FROM Team WHERE ID_Cat='.$_GET['InputCat'].'');
        $i=1;
        $ID_t1 = NULL; $ID_t2 = NULL; $ID_t3 = NULL; $ID_t4 = NULL; $ID_t5 = NULL; $ID_t6 = NULL;
        foreach ($reponseTeams as $team){
            if ($i == 1){
                $ID_t1 = $team['ID'];
            } elseif($i == 2){
                $ID_t2 = $team['ID'];
            } elseif($i == 3){
                $ID_t3 = $team['ID'];
            } elseif($i == 4){
                $ID_t4 = $team['ID'];
            } elseif($i == 5){
                $ID_t5 = $team['ID'];
            } if($i == 6){
                $ID_t6 = $team['ID'];
                $Poule_ID = insertDim($db, $ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5, $ID_t6, $i);
                $i = 0;
                $Poule_ID = $db->query("SELECT ID FROM GroupeSunday WHERE ID_t1=".$ID_t1 ." AND ID_t2=".$ID_t2 ." AND ID_t3=".$ID_t3 ." AND ID_t4=".$ID_t4 ." AND ID_t5=".$ID_t5)->fetch_array();
                $ID_t1 = NULL; $ID_t2 = NULL; $ID_t3 = NULL; $ID_t4 = NULL; $ID_t5 = NULL;
            }
            $i++;
        }
        if ($i > 1 and $i <= 6){
            $Poule_ID = insertDim($db, $ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5, $ID_t6, $i-1);
        }
				$getPoules->free();
				$reponse->free();
        header("Location: ../group.php?jour=dim&generate=true&cat=".$_GET['InputCat']);
        return;
    }

    header("Location: ../group-generate.php?error=no_selection");

?>
