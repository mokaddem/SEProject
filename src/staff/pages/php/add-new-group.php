<?php
	include_once('BDD.php');
    require_once('add-new-history.php');
        include("../../../mail/mail_helper.php");

    $database_host = 'localhost';
    $database_user = 'root';
    $database_pass = '123';
    $database_db = 'SEProjectC';
	$db = new mysqli($database_host, $database_user, $database_pass, $database_db);

    function insertSam($db, $ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5){
        $req = $db->prepare("INSERT INTO GroupSaturday(ID, ID_terrain, ID_t1, ID_t2, ID_t3, ID_t4, ID_t5, ID_vic1, ID_vic2) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $ID	 	= '';
        $ID_terrain = NULL;
        $ID_vic1    = NULL;
        $ID_vic2    = NULL;

        $req->bind_param("iiiiiiiii", $ID, $ID_terrain, $ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5, $ID_vic1, $ID_vic2);

        $req->execute();

        $reponse = $db->query("SELECT * FROM GroupSaturday WHERE ID_terrain =\"".$ID_terrain ."\" AND ID_t1=\"".$ID_t1 ."\" AND ID_t2=\"".$ID_t2 ."\" AND ID_t3=\"".$ID_t3 ."\" AND ID_t4=\"".$ID_t4 ."\" AND ID_t5=\"".$ID_t5 ."\"");
        $donnees = $reponse->fetch_array();
        addHistory($donnees['ID'], "GroupSaturday", "Ajout");


         $req = $db->prepare("SELECT Mail FROM Personne JOIN OWNER ON Owner.ID_Personne = Personne.ID JOIN Terrain ON Terrain.ID_Owner = Owner.ID WHERE Terrain.ID = $ID_terrain");
        $req->execute();
        $to[0] = $req;

        $subject = ""; // INSERT TXT HERE
        $message = ""; // INSERT TXT HERE

        sendMail($to, $subject, $message);

        $req = $db->prepare("SELECT DISTINCT Mail FROM Personne JOIN Player ON Player.ID_Personne = Personne.ID JOIN Team ON Team.ID_Player1 = Player.ID JOIN Team ON Team.ID_Player2 = Player.ID WHERE Team.ID = $ID_t1 OR Team.ID = $ID_t2 OR Team.ID = $ID_t3 OR Team.ID = $ID_t4 OR Team.ID = $ID_t5");
        $req->execute();
        $i = 0;
        foreach ($req as $mail) {
            $to[$i] = $mail;
            $i = î +1;
        }


        $subject = ""; // INSERT TXT HERE
        $message = ""; // INSERT TXT HERE

        sendMail($to, $subject, $message);


       
    }
    function insertDim($db, $ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5, $ID_t6){
        $req = $db->prepare("INSERT INTO GroupSunday(ID, ID_terrain, ID_t1, ID_t2, ID_t3, ID_t4, ID_t5, ID_t6, ID_vic1, ID_vic2) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        echo "Prepare";
        $ID	 	= '';
        $ID_terrain = NULL;
        $ID_vic1    = NULL;
        $ID_vic2    = NULL;

        $req->bind_param("iiiiiiiiii", $ID, $ID_terrain, $ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5, $ID_t6, $ID_vic1, $ID_vic2);
echo "Bind";
        $req->execute();

        $reponse = $db->query("SELECT * FROM GroupSunday WHERE ID_terrain =\"".$ID_terrain ."\" AND ID_t1=\"".$ID_t1 ."\" AND ID_t2=\"".$ID_t2 ."\" AND ID_t3=\"".$ID_t3 ."\" AND ID_t4=\"".$ID_t4 ."\" AND ID_t5=\"".$ID_t5 ."\" AND ID_t6=\"".$ID_t6 ."\"");
        $donnees = $reponse->fetch_array();
        addHistory($donnees['ID'], "GroupSunday", "Ajout");

         $req = $db->prepare("SELECT Mail FROM Personne JOIN OWNER ON Owner.ID_Personne = Personne.ID JOIN Terrain ON Terrain.ID_Owner = Owner.ID WHERE Terrain.ID = $ID_terrain");
        $req->execute();
        $to[0] = $req;


        $subject = ""; // INSERT TXT HERE
        $message = ""; // INSERT TXT HERE

        sendMail($to, $subject, $message);


        $req = $db->prepare("SELECT DISTINCT Mail FROM Personne JOIN Player ON Player.ID_Personne = Personne.ID JOIN Team ON Team.ID_Player1 = Player.ID JOIN Team ON Team.ID_Player2 = Player.ID WHERE Team.ID = $ID_t1 OR Team.ID = $ID_t2 OR Team.ID = $ID_t3 OR Team.ID = $ID_t4 OR Team.ID = $ID_t5 OR Team.ID = $ID_t6");
        $req->execute();
        $i = 0;
        foreach ($req as $mail) {
            $to[$i] = $mail;
            $i = î +1;
        }


        $subject = ""; // INSERT TXT HERE
        $message = ""; // INSERT TXT HERE

        sendMail($to, $subject, $message);

       
    }
    if ($_GET['jour']=="sam"){

        $reponse = $db->query("SELECT * FROM `GroupSaturday`");

        $bool = $reponse->fetch_array();
        if ($bool != NULL) {
//            var_dump($bool);
            header("Location: ../group-generate.php?error=no_sam");
            return;
        }

        $reponseTeams = $db->query("SELECT * FROM Team WHERE ID_Cat=1");
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
                insertSam($db, $ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5);
                $i = 0;
                $ID_t1 = NULL; $ID_t2 = NULL; $ID_t3 = NULL; $ID_t4 = NULL; $ID_t5 = NULL;
            }
            $i++;
        }
        if ($i > 1 and $i <= 5){
            insertSam($db, $ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5);
        }
        header("Location: ../group.php?jour=sam&generate=true");
        return;
    } 
    elseif ($_GET['jour']=="dim"){
        
        $reponse = $db->query("SELECT * FROM `GroupSunday`");

        $bool = $reponse->fetch_array();
        if ($bool != NULL) {
            header("Location: ../group-generate.php?error=no_dim");
            return;
        }

        $reponseTeams = $db->query("SELECT * FROM Team WHERE ID_Cat=1");
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
                insertDim($db, $ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5, $ID_t6);
                $i = 0;
                $ID_t1 = NULL; $ID_t2 = NULL; $ID_t3 = NULL; $ID_t4 = NULL; $ID_t5 = NULL;
            }
            $i++;
        }
        if ($i > 1 and $i <= 6){
            insertDim($db, $ID_t1, $ID_t2, $ID_t3, $ID_t4, $ID_t5, $ID_t6);
        }
        header("Location: ../group.php?jour=dim&generate=true");
        return;
    }

    header("Location: ../group-generate.php?error=no_selection");

?>
