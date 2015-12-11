<?php

// les minimes mixtes avec 17 paires par encore assignée dans un groupe.
// 12 paires cadets mixtes classée dans 3 groupes, matchs joués, il ne reste plus qu'à inscrire les résultats.
// 24 paires juniors hommes dans 5 groupes avec les résultats encodés prêt à être réparti en knock-out.
// Une catégorie de taille au choix, différentes des précédentes, pour montrer le knock-off prêt à être imprimé.
// Le dernier, un tournoi des familles de 13 paires complétés avec les résultats des knock-offs encodés.


function PopulateDB(){
//    include_once("../../staff/pages/php/BDD.php");
    include_once("BDD.php");
    include_once('get-ranking.php');
    require_once('add-new-history.php');

    $db = BDconnect();

    /** Vide la BDD **/
    // On ne touche pas aux catégories, extras, staff ou ranking.

    // Vidage de toutes les tables qui ne serront plus utiles cette année.
    $db->query('DELETE FROM GroupSunday');
    $db->query('DELETE FROM GroupSaturday');
    $db->query('DELETE FROM History');
    $db->query('DELETE FROM KnockoffSaturday');
    $db->query('DELETE FROM KnockoffSunday');
    $db->query('DELETE FROM `Match`');
    $db->query('DELETE FROM PersonneExtra');
    $db->query('DELETE FROM Player');
    $db->query('DELETE FROM PlayerAlone');
    $db->query('DELETE FROM Team');

    //vidage des tables temporaires
    $db->query('DELETE FROM TmpTeam');
    $db->query('DELETE FROM TmpPersonne');
    $db->query('DELETE FROM TmpPersonneExtra');
    $db->query('DELETE FROM TmpPlayer');
    $db->query('DELETE FROM ConfirmationPersonne');

    // Propriétaires et terrains vont dans les archives pour pouvoir les recontacter.
    $db->query('DELETE FROM OldOwner');
    $db->query('DELETE FROM OldTerrain');
    $db->query('INSERT INTO OldOwner SELECT * FROM Owner');
    $db->query('INSERT INTO OldTerrain SELECT * FROM Terrain');

    // On retire tous les anciens joueurs.
    $db->query('DELETE FROM Personne WHERE IsPlayer = 1');
    // On retire tous les anciens owners qui n'ont pas été repris cette année.
    $db->query('DELETE FROM Personne WHERE IsOwner = 1 AND ID NOT IN (SELECT ID_Personne FROM OldOwner)');

    // Remise des variables globales à leurs valeurs d'origines:
    // Il n'y a plus de tournoi généré.
    // $req = $db->query("UPDATE GlobalVariables SET `Value` = \"[A rédiger]\" WHERE `Name` != \"tournament_started_sam\" AND `Name` != \"tournament_started_dim\"");
    $req = $db->query("UPDATE GlobalVariables SET `Value` = \"0\" WHERE `Name` = \"tournament_started_sam\"");
    $req = $db->query("UPDATE GlobalVariables SET `Value` = \"0\" WHERE `Name` = \"tournament_started_dim\"");
    // Et tous les autres champ doivent être ré-encodé.

    // Mise à jour de l'historique
    require_once('add-new-history.php');
    addHistory( 0, utf8_decode("Suppression de toute l'année précédente."), "Suppression");

    $extrasList;
    $extraIDs = $db->query('SELECT ID as id FROM Extras');
    foreach ($extraIDs as $extraID) {
        $extrasList[] = $extraID['id'];
    }

    /** Populate **/

    $i = 0;
    // les minimes mixtes avec 17 paires par encore assignée dans un groupe.
    for ($i = 0; $i < 34; $i+=2) {
        /*$req = $db->prepare("INSERT INTO Personne(Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(1,'joueur".$1."','name".$1."','bxl','1000','rue de la pluie',".$1.",'665666','545535','1985-1-1','mailbidon".$1."@mailbidons.com','2015-11-11','',1,0,0)");
        $req->execute();*/

        $prenoms = array("Yvette", "Sébastien", "Marshall", "Vivienne", "Yves", "Anaïs", "Cendrillon", "Trinette", "Charlotte", "Huette", "Christian", "Jesper", "Élisabeth", "Loring", "Karel", "Aceline", "Tanguy", "Denise", "Zerbino", "Charline", "Iven", "Laure", "Jolie", "Tanguy", "Fantina", "Susanne", "Armand", "Burnell", "Amorette", "Parfait", "Evrard", "Marmion", "Sidney", "Olivier", "Ancelina", "Serge", "Diane", "Chapin", "Vivienne", "Brier", "Delmar", "Frédéric", "Laurene", "Christien ", "Hugues ", "Xavier ", "Artus ", "Dorothée ", "Pauline ", "Huon ", "Arno ", "Amarante ", "Maurelle ", "Blanche ", "Cloridan ", "Richard ", "Sacripant ", "Ray ", "Belda ", "Bayard ", "Evrard ", "Toussaint ", "Javier ", "Florus ", "Mavise ", "Aleron ", "Rive ", "Roslyn ", "Pénélope ", "Belle ", "Ansel ", "Gabriel ", "Olivie", "Adam", "Alex", "Alexandre", "Alexis", "Anthony", "Antoine", "Benjamin", "Cédric", "Charles", "Christopher", "David", "Dylan", "Édouard", "Elliot", "Émile", "Étienne", "Félix", "Gabriel", "Guillaume", "Hugo", "Isaac", "Jacob", "Jérémy", "Jonathan", "Julien", "Justin", "Léo", "Logan", "Loïc", "Louis", "Lucas", "Ludovic", "Malik", "Mathieu", "Mathis", "Maxime", "Michaël", "Nathan", "Nicolas", "Noah", "Olivier", "Philippe", "Raphaël", "Samuel", "Simon", "Thomas", "Tommy", "Tristan", "Victor", "Vincent");
        $noms = array("Tremblay", "Desmarais", "Larrivée", "Chan", "Gagnon", "Laberge", "Major", "Métivier", "Roy", "Nault", "Boissonneault", "Fradette", "Côté", "Bourgeois", "Patenaude", "Ranger", "Bouchard", "Lafrance", "Alarie", "Després", "Gauthier", "Lagacé", "Carpentier", "Lesage", "Morin", "Daoust", "Grenon", "Poliquin", "Lavoie", "Brault", "Bossé", "Généreux", "Fortin", "Castonguay", "Bessette", "Papineau", "Gagné", "Vallières", "Lajeunesse", "Frappier", "Ouellet", "Pellerin", "Barbeau", "Latreille", "Pelletier", "Rivest", "Miller", "Meloche", "Bélanger", "Brochu", "Masson", "Gouin", "Lévesque", "Samson", "Cournoyer", "Crête", "Bergeron", "Lépine", "Ratté", "Pedneault", "Leblanc", "Leroux", "Chrétien", "Berger", "Paquette", "Larochelle", "Bourgault", "Briand", "Girard", "Brousseau", "Leboeuf", "Olivier", "Simard", "Sauvé", "Nolet", "Truchon", "Boucher", "Laurin", "Sylvestre", "Sénéchal");
        $rankings = array("C30.5", "C30.4", "C30.3", "C30.2", "C30.1", "C30", "C15.5", "C15.4", "C15.3", "C15.2", "C15.1", "C15", "NC");
        // PREMIERE
        $req = $db->prepare("INSERT INTO Personne(ID, Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $ID1	 	= '';
        $FirstName1	= utf8_decode($prenoms[array_rand($prenoms)]);
        $LastName1	= utf8_decode($noms[array_rand($noms)]);
        $Title1	    = 0;
        $ZIPCode1	= 1000;
        $PhoneNumber1	= 600000000;
        $GSMNumber1	= 600000000;
        $Ville1		= utf8_decode("Ville".$i);
        $Rue1		= utf8_decode("Rue".$i);
        $Number1		= 1;
        $rand1 = rand(2003,2004);
        $BirthDate1	= $rand1."-1-1";
        $Mail1		= $FirstName1.".".$LastName1."@mail.com";
        $CreationDate = date('Y-m-d');
        $Note1 = ""; //utf8_decode("R.A.S.");
        $IsPlayer1	= 1;
        $IsOwner1	= 0;
        $IsStaff1	= 0;

        $req->bind_param("iisssisiiissssiii", $ID1, $Title1, $FirstName1, $LastName1, $Ville1, $ZIPCode1, $Rue1, $Number1, $PhoneNumber1, $GSMNumber1, $BirthDate1, $Mail1, $CreationDate, $Note1, $IsPlayer1, $IsOwner1, $IsStaff1);

        $req->execute();

        // DEUXIEME
        $req = $db->prepare("INSERT INTO Personne(ID, Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $ID2	 	= '';
        $FirstName2	= utf8_decode($prenoms[array_rand($prenoms)]);
        $LastName2	= utf8_decode($noms[array_rand($noms)]);
        $Title2	    = 1;
        $ZIPCode2	= 1000;
        $PhoneNumber2	= 600000000;
        $GSMNumber2	= 600000000;
        $Ville2		= utf8_decode("Ville".($i+1));
        $Rue2		= utf8_decode("Rue".($i+1));
        $Number2		= 1;
        $rand2 = rand(2003,2004);
        $BirthDate2	= $rand2."-1-1";
        $Mail2		= $FirstName2.".".$LastName2."@mail.com";
        $CreationDate = date('Y-m-d');
        $Note2 = ""; //utf8_decode("R.A.S.");
        $IsPlayer2	= 1;
        $IsOwner2	= 0;
        $IsStaff2	= 0;

        $req->bind_param("iisssisiiissssiii", $ID2, $Title2, $FirstName2, $LastName2, $Ville2, $ZIPCode2, $Rue2, $Number2, $PhoneNumber2, $GSMNumber2, $BirthDate2, $Mail2, $CreationDate, $Note2, $IsPlayer2, $IsOwner2, $IsStaff2);

        $req->execute();


        // $req = $db->prepare("INSERT INTO Player(ID_Personne,IsLeader,Paid,AlreadyPart) VALUES(".$donnees1['ID'].",0,1,1)");
        // $req->execute();

        // --------------------AJOUTER PLAYER---------------------------

        $req = $db->prepare("INSERT INTO Player(ID_personne, IsLeader, Paid, AlreadyPart, Ranking) VALUES(?, ?, ?, ?, ?)");

        //	$req = $db->prepare('INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Address, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES('', "bb", "bb", 1, 1234, 12354, 46351, "glkrzjglz e zfzef", 2015-02-02, "lzeijgze@fmezk.com", 2015-02-03, 1, 0, 0)');

        $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName1.'" = FirstName AND "'.$LastName1.'" = LastName AND Ville = "'.$Ville1.'"');
        $donnees1 = $reponse->fetch_array();

        $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName2.'" = FirstName AND "'.$LastName2.'" = LastName AND Ville = "'.$Ville2.'"');
        $donnees2 = $reponse->fetch_array();

        $ID_Personne1=$donnees1['ID'];
        $ID_Personne2=$donnees2['ID'];

        $IsLeader=0;
        $Paid=0;
        $AlreadyPart=0;

        // Get player classement
        $Birth1	= $BirthDate1;
        $Birth2	= $BirthDate2;

        $ranking1 = $rankings[array_rand($rankings)]; //getRanking($FirstName1, $LastName1, $Birth1);
        $ranking2 = $rankings[array_rand($rankings)];
        $req->bind_param("iiiis", $ID_Personne1, $IsLeader, $Paid, $AlreadyPart, $ranking1);
        $req->execute();

        $req = $db->prepare("INSERT INTO Player(ID_personne, IsLeader, Paid, AlreadyPart, Ranking) VALUES(?, ?, ?, ?, ?)");
        $req->bind_param("iiiis", $ID_Personne2, $IsLeader,$Paid, $AlreadyPart, $ranking2);
        $req->execute();

        $reponse = $db->query('SELECT * FROM Team WHERE '.$ID_Personne1.' = ID_Player1 AND '.$ID_Personne2.' = ID_Player2');
        $donnees = $reponse->fetch_array();

        // Mise à jour de l'historique
        addHistory($donnees["ID"], "Equipe", "Ajout");

        // ---------------------AJOUTER TEAM--------------------------
        $req = $db->prepare("INSERT INTO Team(ID, ID_player1, ID_player2, ID_Cat, NbWinMatch, AvgRanking) VALUES(?, ?, ?, ?, ?, ?)");

        $ID	 	= '';
        $ID_player1	= $donnees1['ID'];
        $ID_player2	= $donnees2['ID'];

        /*On determine sa categorie - START */
        // Get l'age le plus grand des deux joueurs
        $ageCurrent = max(intval(date('Y')) - intval($rand1), intval(date('Y')) - intval($rand2));
        $reponse = $db->query('SELECT * FROM Categorie');
        $ID_Cat		= '1';

        // Parcours des categories
        foreach ($reponse as $donnees) {
        $ageCat = explode(" - ", $donnees["Age"]);

        // Si l'âge est dans la tranche d'âge on l'ajoute à cette catégorie
        if (intval($ageCat[0])<= $ageCurrent && intval($ageCat[1]) >= $ageCurrent) {
          $ID_Cat		= $donnees['ID'];
        }
        }


        /*On determine sa categorie - END */
        $NbmatchWin	= '0';

        $query = 'SELECT RankingInt FROM RankingTextToIntBelgian WHERE "'.$ranking1.'" = RankingText OR "'.$ranking2.'" = RankingText';
        $RankingReponse = $db->query($query);
        $rankings = $RankingReponse->fetch_array();
        $rankInt1 = $rankings['RankingInt'];
        $rankings = $RankingReponse->fetch_array();
        $rankInt2 = $rankings['RankingInt'];
        $rankingAvgInt = round(($rankInt1 + $rankInt2)/2);
        $RankingReponse = $db->query('SELECT RankingText FROM RankingTextToIntBelgian WHERE '.$rankingAvgInt.' = RankingInt ');
        $rankingAvgText = ($RankingReponse->fetch_array());
        $rankingAvgText = $rankingAvgText['RankingText'];

        $req->bind_param("iiiiis", $ID, $ID_player1, $ID_player2, $ID_Cat, $NbmatchWin, $rankingAvgText);

        $req->execute();

        $reponse = $db->query('SELECT * FROM Team WHERE '.$ID_player1.' = ID_Player1 AND '.$ID_player2.' = ID_Player2');
        $donnees = $reponse->fetch_array();

        // Mise à jour de l'historique
        addHistory($donnees["ID"], "Equipe", "Ajout");


        // -------------------AJOUTER EXTRAS FOR PLAYER 1----------------------------
        // $extraIDs = $db->query('SELECT ID as id FROM Extras');
        //error_log(serialize($_GET));
        //for($i=1; $i<=$nbrIter; $i++){
        // $extraID = $extraIDs->fetch_array()
        //$extraName="extra1_". (String) ($extraID['id']);
        //$extra = $_GET[$extraName];
        $db->query("INSERT INTO PersonneExtra (ID, Extra_ID, Personne_ID) VALUES(\"\",".$extrasList[array_rand($extrasList)].",".$ID_Personne1.")");


        // -------------------AJOUTER EXTRAS FOR PLAYER 2----------------------------
        $db->query("INSERT INTO PersonneExtra (ID, Extra_ID, Personne_ID) VALUES(\"\",".$extrasList[array_rand($extrasList)].",".$ID_Personne2.")");

        $IDPlayers[$i] = $db->insert_id;
        }

        // 12 paires cadets mixtes classée dans 3 groupes, matchs joués, il ne reste plus qu'à inscrire les résultats.
        for ($i = 0; $i < 24; $i+=2) {
            /*$req = $db->prepare("INSERT INTO Personne(Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(1,'joueur".$1."','name".$1."','bxl','1000','rue de la pluie',".$1.",'665666','545535','1985-1-1','mailbidon".$1."@mailbidons.com','2015-11-11','',1,0,0)");
            $req->execute();*/

            $prenoms = array("Adam", "Alex", "Alexandre", "Alexis", "Anthony", "Antoine", "Benjamin", "Cédric", "Charles", "Christopher", "David", "Dylan", "Édouard", "Elliot", "Émile", "Étienne", "Félix", "Gabriel", "Guillaume", "Hugo", "Isaac", "Jacob", "Jérémy", "Jonathan", "Julien", "Justin", "Léo", "Logan", "Loïc", "Louis", "Lucas", "Ludovic", "Malik", "Mathieu", "Mathis", "Maxime", "Michaël", "Nathan", "Nicolas", "Noah", "Olivier", "Philippe", "Raphaël", "Samuel", "Simon", "Thomas", "Tommy", "Tristan", "Victor", "Vincent");
            $noms = array("Tremblay", "Desmarais", "Larrivée", "Chan", "Gagnon", "Laberge", "Major", "Métivier", "Roy", "Nault", "Boissonneault", "Fradette", "Côté", "Bourgeois", "Patenaude", "Ranger", "Bouchard", "Lafrance", "Alarie", "Després", "Gauthier", "Lagacé", "Carpentier", "Lesage", "Morin", "Daoust", "Grenon", "Poliquin", "Lavoie", "Brault", "Bossé", "Généreux", "Fortin", "Castonguay", "Bessette", "Papineau", "Gagné", "Vallières", "Lajeunesse", "Frappier", "Ouellet", "Pellerin", "Barbeau", "Latreille", "Pelletier", "Rivest", "Miller", "Meloche", "Bélanger", "Brochu", "Masson", "Gouin", "Lévesque", "Samson", "Cournoyer", "Crête", "Bergeron", "Lépine", "Ratté", "Pedneault", "Leblanc", "Leroux", "Chrétien", "Berger", "Paquette", "Larochelle", "Bourgault", "Briand", "Girard", "Brousseau", "Leboeuf", "Olivier", "Simard", "Sauvé", "Nolet", "Truchon", "Boucher", "Laurin", "Sylvestre", "Sénéchal");
            $rankings = array("C30.5", "C30.4", "C30.3", "C30.2", "C30.1", "C30", "C15.5", "C15.4", "C15.3", "C15.2", "C15.1", "C15", "NC");
            // PREMIERE
            $req = $db->prepare("INSERT INTO Personne(ID, Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $ID1	 	= '';
            $FirstName1	= utf8_decode($prenoms[array_rand($prenoms)]);
            $LastName1	= utf8_decode($noms[array_rand($noms)]);
            $Title1	    = 0;
            $ZIPCode1	= 1000;
            $PhoneNumber1	= 600000000;
            $GSMNumber1	= 600000000;
            $Ville1		= utf8_decode("Ville".$i);
            $Rue1		= utf8_decode("Rue".$i);
            $Number1		= 1;
            $rand1 = rand(2001,2002);
            $BirthDate1	= $rand1."-1-1";
            $Mail1		= $FirstName1.".".$LastName1."@mail.com";
            $CreationDate = date('Y-m-d');
            $Note1 = ""; //utf8_decode("R.A.S.");
            $IsPlayer1	= 1;
            $IsOwner1	= 0;
            $IsStaff1	= 0;

            $req->bind_param("iisssisiiissssiii", $ID1, $Title1, $FirstName1, $LastName1, $Ville1, $ZIPCode1, $Rue1, $Number1, $PhoneNumber1, $GSMNumber1, $BirthDate1, $Mail1, $CreationDate, $Note1, $IsPlayer1, $IsOwner1, $IsStaff1);

            $req->execute();

            // DEUXIEME
            $req = $db->prepare("INSERT INTO Personne(ID, Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $ID2	 	= '';
            $FirstName2	= utf8_decode($prenoms[array_rand($prenoms)]);
            $LastName2	= utf8_decode($noms[array_rand($noms)]);
            $Title2	    = 1;
            $ZIPCode2	= 1000;
            $PhoneNumber2	= 600000000;
            $GSMNumber2	= 600000000;
            $Ville2		= utf8_decode("Ville".($i+1));
            $Rue2		= utf8_decode("Rue".($i+1));
            $Number2		= 1;
            $rand2 = rand(2001,2002);
            $BirthDate2	= $rand2."-1-1";
            $Mail2		= $FirstName2.".".$LastName2."@mail.com";
            $CreationDate = date('Y-m-d');
            $Note2 = ""; //utf8_decode("R.A.S.");
            $IsPlayer2	= 1;
            $IsOwner2	= 0;
            $IsStaff2	= 0;

            $req->bind_param("iisssisiiissssiii", $ID2, $Title2, $FirstName2, $LastName2, $Ville2, $ZIPCode2, $Rue2, $Number2, $PhoneNumber2, $GSMNumber2, $BirthDate2, $Mail2, $CreationDate, $Note2, $IsPlayer2, $IsOwner2, $IsStaff2);

            $req->execute();


            // $req = $db->prepare("INSERT INTO Player(ID_Personne,IsLeader,Paid,AlreadyPart) VALUES(".$donnees1['ID'].",0,1,1)");
            // $req->execute();

            // --------------------AJOUTER PLAYER---------------------------

            $req = $db->prepare("INSERT INTO Player(ID_personne, IsLeader, Paid, AlreadyPart, Ranking) VALUES(?, ?, ?, ?, ?)");

            //	$req = $db->prepare('INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Address, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES('', "bb", "bb", 1, 1234, 12354, 46351, "glkrzjglz e zfzef", 2015-02-02, "lzeijgze@fmezk.com", 2015-02-03, 1, 0, 0)');

            $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName1.'" = FirstName AND "'.$LastName1.'" = LastName AND Ville = "'.$Ville1.'"');
            $donnees1 = $reponse->fetch_array();

            $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName2.'" = FirstName AND "'.$LastName2.'" = LastName AND Ville = "'.$Ville2.'"');
            $donnees2 = $reponse->fetch_array();

            $ID_Personne1=$donnees1['ID'];
            $ID_Personne2=$donnees2['ID'];

            $IsLeader=0;
            $Paid=0;
            $AlreadyPart=0;

            // Get player classement
            $Birth1	= $BirthDate1;
            $Birth2	= $BirthDate2;

            $ranking1 = $rankings[array_rand($rankings)]; //getRanking($FirstName1, $LastName1, $Birth1);
            $ranking2 = $rankings[array_rand($rankings)];
            $req->bind_param("iiiis", $ID_Personne1, $IsLeader, $Paid, $AlreadyPart, $ranking1);
            $req->execute();

            $req = $db->prepare("INSERT INTO Player(ID_personne, IsLeader, Paid, AlreadyPart, Ranking) VALUES(?, ?, ?, ?, ?)");
            $req->bind_param("iiiis", $ID_Personne2, $IsLeader,$Paid, $AlreadyPart, $ranking2);
            $req->execute();

            $reponse = $db->query('SELECT * FROM Team WHERE '.$ID_Personne1.' = ID_Player1 AND '.$ID_Personne2.' = ID_Player2');
            $donnees = $reponse->fetch_array();

            // Mise à jour de l'historique
            addHistory($donnees["ID"], "Equipe", "Ajout");

            // ---------------------AJOUTER TEAM--------------------------
            $req = $db->prepare("INSERT INTO Team(ID, ID_player1, ID_player2, ID_Cat, NbWinMatch, AvgRanking) VALUES(?, ?, ?, ?, ?, ?)");

            $ID	 	= '';
            $ID_player1	= $donnees1['ID'];
            $ID_player2	= $donnees2['ID'];

            /*On determine sa categorie - START */
            // Get l'age le plus grand des deux joueurs
            $ageCurrent = max(intval(date('Y')) - intval($rand1), intval(date('Y')) - intval($rand2));
            $reponse = $db->query('SELECT * FROM Categorie');
            $ID_Cat		= '1';

            // Parcours des categories
            foreach ($reponse as $donnees) {
            $ageCat = explode(" - ", $donnees["Age"]);

            // Si l'âge est dans la tranche d'âge on l'ajoute à cette catégorie
            if (intval($ageCat[0])<= $ageCurrent && intval($ageCat[1]) >= $ageCurrent) {
              $ID_Cat		= $donnees['ID'];
            }
            }


            /*On determine sa categorie - END */
            $NbmatchWin	= '0';

            $query = 'SELECT RankingInt FROM RankingTextToIntBelgian WHERE "'.$ranking1.'" = RankingText OR "'.$ranking2.'" = RankingText';
            $RankingReponse = $db->query($query);
            $rankings = $RankingReponse->fetch_array();
            $rankInt1 = $rankings['RankingInt'];
            $rankings = $RankingReponse->fetch_array();
            $rankInt2 = $rankings['RankingInt'];
            $rankingAvgInt = round(($rankInt1 + $rankInt2)/2);
            $RankingReponse = $db->query('SELECT RankingText FROM RankingTextToIntBelgian WHERE '.$rankingAvgInt.' = RankingInt ');
            $rankingAvgText = ($RankingReponse->fetch_array());
            $rankingAvgText = $rankingAvgText['RankingText'];

            $req->bind_param("iiiiis", $ID, $ID_player1, $ID_player2, $ID_Cat, $NbmatchWin, $rankingAvgText);

            $req->execute();

            $reponse = $db->query('SELECT * FROM Team WHERE '.$ID_player1.' = ID_Player1 AND '.$ID_player2.' = ID_Player2');
            $donnees = $reponse->fetch_array();

            // Mise à jour de l'historique
            addHistory($donnees["ID"], "Equipe", "Ajout");


            // -------------------AJOUTER EXTRAS FOR PLAYER 1----------------------------
            $db->query("INSERT INTO PersonneExtra (ID, Extra_ID, Personne_ID) VALUES(\"\",".$extrasList[array_rand($extrasList)].",".$ID_Personne1.")");

            // -------------------AJOUTER EXTRAS FOR PLAYER 2----------------------------
            $db->query("INSERT INTO PersonneExtra (ID, Extra_ID, Personne_ID) VALUES(\"\",".$extrasList[array_rand($extrasList)].",".$ID_Personne2.")");


            $IDPlayers[$i] = $db->insert_id;
            }

        // 24 paires juniors hommes dans 5 groupes avec les résultats encodés prêt à être réparti en knock-out.
        for ($i = 0; $i < 48; $i+=2) {
            /*$req = $db->prepare("INSERT INTO Personne(Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(1,'joueur".$1."','name".$1."','bxl','1000','rue de la pluie',".$1.",'665666','545535','1985-1-1','mailbidon".$1."@mailbidons.com','2015-11-11','',1,0,0)");
            $req->execute();*/

            $prenoms = array("Adam", "Alex", "Alexandre", "Alexis", "Anthony", "Antoine", "Benjamin", "Cédric", "Charles", "Christopher", "David", "Dylan", "Édouard", "Elliot", "Émile", "Étienne", "Félix", "Gabriel", "Guillaume", "Hugo", "Isaac", "Jacob", "Jérémy", "Jonathan", "Julien", "Justin", "Léo", "Logan", "Loïc", "Louis", "Lucas", "Ludovic", "Malik", "Mathieu", "Mathis", "Maxime", "Michaël", "Nathan", "Nicolas", "Noah", "Olivier", "Philippe", "Raphaël", "Samuel", "Simon", "Thomas", "Tommy", "Tristan", "Victor", "Vincent");
            $noms = array("Tremblay", "Desmarais", "Larrivée", "Chan", "Gagnon", "Laberge", "Major", "Métivier", "Roy", "Nault", "Boissonneault", "Fradette", "Côté", "Bourgeois", "Patenaude", "Ranger", "Bouchard", "Lafrance", "Alarie", "Després", "Gauthier", "Lagacé", "Carpentier", "Lesage", "Morin", "Daoust", "Grenon", "Poliquin", "Lavoie", "Brault", "Bossé", "Généreux", "Fortin", "Castonguay", "Bessette", "Papineau", "Gagné", "Vallières", "Lajeunesse", "Frappier", "Ouellet", "Pellerin", "Barbeau", "Latreille", "Pelletier", "Rivest", "Miller", "Meloche", "Bélanger", "Brochu", "Masson", "Gouin", "Lévesque", "Samson", "Cournoyer", "Crête", "Bergeron", "Lépine", "Ratté", "Pedneault", "Leblanc", "Leroux", "Chrétien", "Berger", "Paquette", "Larochelle", "Bourgault", "Briand", "Girard", "Brousseau", "Leboeuf", "Olivier", "Simard", "Sauvé", "Nolet", "Truchon", "Boucher", "Laurin", "Sylvestre", "Sénéchal");
            $rankings = array("C30.5", "C30.4", "C30.3", "C30.2", "C30.1", "C30", "C15.5", "C15.4", "C15.3", "C15.2", "C15.1", "C15", "NC");
            // PREMIERE
            $req = $db->prepare("INSERT INTO Personne(ID, Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $ID1	 	= '';
            $FirstName1	= utf8_decode($prenoms[array_rand($prenoms)]);
            $LastName1	= utf8_decode($noms[array_rand($noms)]);
            $Title1	    = 0;
            $ZIPCode1	= 1000;
            $PhoneNumber1	= 600000000;
            $GSMNumber1	= 600000000;
            $Ville1		= utf8_decode("Ville".$i);
            $Rue1		= utf8_decode("Rue".$i);
            $Number1		= 1;
            $rand1 = rand(1996,1998);
            $BirthDate1	= $rand1."-1-1";
            $Mail1		= $FirstName1.".".$LastName1."@mail.com";
            $CreationDate = date('Y-m-d');
            $Note1 = ""; //utf8_decode("R.A.S.");
            $IsPlayer1	= 1;
            $IsOwner1	= 0;
            $IsStaff1	= 0;

            $req->bind_param("iisssisiiissssiii", $ID1, $Title1, $FirstName1, $LastName1, $Ville1, $ZIPCode1, $Rue1, $Number1, $PhoneNumber1, $GSMNumber1, $BirthDate1, $Mail1, $CreationDate, $Note1, $IsPlayer1, $IsOwner1, $IsStaff1);

            $req->execute();

            // DEUXIEME
            $req = $db->prepare("INSERT INTO Personne(ID, Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $ID2	 	= '';
            $FirstName2	= utf8_decode($prenoms[array_rand($prenoms)]);
            $LastName2	= utf8_decode($noms[array_rand($noms)]);
            $Title2	    = 0;
            $ZIPCode2	= 1000;
            $PhoneNumber2	= 600000000;
            $GSMNumber2	= 600000000;
            $Ville2		= utf8_decode("Ville".($i+1));
            $Rue2		= utf8_decode("Rue".($i+1));
            $Number2		= 1;
            $rand2 = rand(1996,1998);
            $BirthDate2	= $rand2."-1-1";
            $Mail2		= $FirstName2.".".$LastName2."@mail.com";
            $CreationDate = date('Y-m-d');
            $Note2 = ""; //utf8_decode("R.A.S.");
            $IsPlayer2	= 1;
            $IsOwner2	= 0;
            $IsStaff2	= 0;

            $req->bind_param("iisssisiiissssiii", $ID2, $Title2, $FirstName2, $LastName2, $Ville2, $ZIPCode2, $Rue2, $Number2, $PhoneNumber2, $GSMNumber2, $BirthDate2, $Mail2, $CreationDate, $Note2, $IsPlayer2, $IsOwner2, $IsStaff2);

            $req->execute();


            // $req = $db->prepare("INSERT INTO Player(ID_Personne,IsLeader,Paid,AlreadyPart) VALUES(".$donnees1['ID'].",0,1,1)");
            // $req->execute();

            // --------------------AJOUTER PLAYER---------------------------

            $req = $db->prepare("INSERT INTO Player(ID_personne, IsLeader, Paid, AlreadyPart, Ranking) VALUES(?, ?, ?, ?, ?)");

            //	$req = $db->prepare('INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Address, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES('', "bb", "bb", 1, 1234, 12354, 46351, "glkrzjglz e zfzef", 2015-02-02, "lzeijgze@fmezk.com", 2015-02-03, 1, 0, 0)');

            $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName1.'" = FirstName AND "'.$LastName1.'" = LastName AND Ville = "'.$Ville1.'"');
            $donnees1 = $reponse->fetch_array();

            $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName2.'" = FirstName AND "'.$LastName2.'" = LastName AND Ville = "'.$Ville2.'"');
            $donnees2 = $reponse->fetch_array();

            $ID_Personne1=$donnees1['ID'];
            $ID_Personne2=$donnees2['ID'];

            $IsLeader=0;
            $Paid=0;
            $AlreadyPart=0;

            // Get player classement
            $Birth1	= $BirthDate1;
            $Birth2	= $BirthDate2;

            $ranking1 = $rankings[array_rand($rankings)]; //getRanking($FirstName1, $LastName1, $Birth1);
            $ranking2 = $rankings[array_rand($rankings)];
            $req->bind_param("iiiis", $ID_Personne1, $IsLeader, $Paid, $AlreadyPart, $ranking1);
            $req->execute();

            $req = $db->prepare("INSERT INTO Player(ID_personne, IsLeader, Paid, AlreadyPart, Ranking) VALUES(?, ?, ?, ?, ?)");
            $req->bind_param("iiiis", $ID_Personne2, $IsLeader,$Paid, $AlreadyPart, $ranking2);
            $req->execute();

            $reponse = $db->query('SELECT * FROM Team WHERE '.$ID_Personne1.' = ID_Player1 AND '.$ID_Personne2.' = ID_Player2');
            $donnees = $reponse->fetch_array();

            // Mise à jour de l'historique
            addHistory($donnees["ID"], "Equipe", "Ajout");

            // ---------------------AJOUTER TEAM--------------------------
            $req = $db->prepare("INSERT INTO Team(ID, ID_player1, ID_player2, ID_Cat, NbWinMatch, AvgRanking) VALUES(?, ?, ?, ?, ?, ?)");

            $ID	 	= '';
            $ID_player1	= $donnees1['ID'];
            $ID_player2	= $donnees2['ID'];

            /*On determine sa categorie - START */
            // Get l'age le plus grand des deux joueurs
            $ageCurrent = max(intval(date('Y')) - intval($rand1), intval(date('Y')) - intval($rand2));
            $reponse = $db->query('SELECT * FROM Categorie');
            $ID_Cat		= '1';

            // Parcours des categories
            foreach ($reponse as $donnees) {
            $ageCat = explode(" - ", $donnees["Age"]);

            // Si l'âge est dans la tranche d'âge on l'ajoute à cette catégorie
            if (intval($ageCat[0])<= $ageCurrent && intval($ageCat[1]) >= $ageCurrent) {
              $ID_Cat		= $donnees['ID'];
            }
            }


            /*On determine sa categorie - END */
            $NbmatchWin	= '0';

            $query = 'SELECT RankingInt FROM RankingTextToIntBelgian WHERE "'.$ranking1.'" = RankingText OR "'.$ranking2.'" = RankingText';
            $RankingReponse = $db->query($query);
            $rankings = $RankingReponse->fetch_array();
            $rankInt1 = $rankings['RankingInt'];
            $rankings = $RankingReponse->fetch_array();
            $rankInt2 = $rankings['RankingInt'];
            $rankingAvgInt = round(($rankInt1 + $rankInt2)/2);
            $RankingReponse = $db->query('SELECT RankingText FROM RankingTextToIntBelgian WHERE '.$rankingAvgInt.' = RankingInt ');
            $rankingAvgText = ($RankingReponse->fetch_array());
            $rankingAvgText = $rankingAvgText['RankingText'];

            $req->bind_param("iiiiis", $ID, $ID_player1, $ID_player2, $ID_Cat, $NbmatchWin, $rankingAvgText);

            $req->execute();

            $reponse = $db->query('SELECT * FROM Team WHERE '.$ID_player1.' = ID_Player1 AND '.$ID_player2.' = ID_Player2');
            $donnees = $reponse->fetch_array();

            // Mise à jour de l'historique
            addHistory($donnees["ID"], "Equipe", "Ajout");


            // -------------------AJOUTER EXTRAS FOR PLAYER 1----------------------------
            $db->query("INSERT INTO PersonneExtra (ID, Extra_ID, Personne_ID) VALUES(\"\",".$extrasList[array_rand($extrasList)].",".$ID_Personne1.")");

            // -------------------AJOUTER EXTRAS FOR PLAYER 2----------------------------
            $db->query("INSERT INTO PersonneExtra (ID, Extra_ID, Personne_ID) VALUES(\"\",".$extrasList[array_rand($extrasList)].",".$ID_Personne2.")");

            $IDPlayers[$i] = $db->insert_id;
            }

            // Une catégorie de taille au choix, différentes des précédentes, pour montrer le knock-off prêt à être imprimé.
            for ($i = 0; $i < 40; $i+=2) {
                /*$req = $db->prepare("INSERT INTO Personne(Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(1,'joueur".$1."','name".$1."','bxl','1000','rue de la pluie',".$1.",'665666','545535','1985-1-1','mailbidon".$1."@mailbidons.com','2015-11-11','',1,0,0)");
                $req->execute();*/

                $prenoms = array("Adam", "Alex", "Alexandre", "Alexis", "Anthony", "Antoine", "Benjamin", "Cédric", "Charles", "Christopher", "David", "Dylan", "Édouard", "Elliot", "Émile", "Étienne", "Félix", "Gabriel", "Guillaume", "Hugo", "Isaac", "Jacob", "Jérémy", "Jonathan", "Julien", "Justin", "Léo", "Logan", "Loïc", "Louis", "Lucas", "Ludovic", "Malik", "Mathieu", "Mathis", "Maxime", "Michaël", "Nathan", "Nicolas", "Noah", "Olivier", "Philippe", "Raphaël", "Samuel", "Simon", "Thomas", "Tommy", "Tristan", "Victor", "Vincent");
                $noms = array("Tremblay", "Desmarais", "Larrivée", "Chan", "Gagnon", "Laberge", "Major", "Métivier", "Roy", "Nault", "Boissonneault", "Fradette", "Côté", "Bourgeois", "Patenaude", "Ranger", "Bouchard", "Lafrance", "Alarie", "Després", "Gauthier", "Lagacé", "Carpentier", "Lesage", "Morin", "Daoust", "Grenon", "Poliquin", "Lavoie", "Brault", "Bossé", "Généreux", "Fortin", "Castonguay", "Bessette", "Papineau", "Gagné", "Vallières", "Lajeunesse", "Frappier", "Ouellet", "Pellerin", "Barbeau", "Latreille", "Pelletier", "Rivest", "Miller", "Meloche", "Bélanger", "Brochu", "Masson", "Gouin", "Lévesque", "Samson", "Cournoyer", "Crête", "Bergeron", "Lépine", "Ratté", "Pedneault", "Leblanc", "Leroux", "Chrétien", "Berger", "Paquette", "Larochelle", "Bourgault", "Briand", "Girard", "Brousseau", "Leboeuf", "Olivier", "Simard", "Sauvé", "Nolet", "Truchon", "Boucher", "Laurin", "Sylvestre", "Sénéchal");
                $rankings = array("C30.5", "C30.4", "C30.3", "C30.2", "C30.1", "C30", "C15.5", "C15.4", "C15.3", "C15.2", "C15.1", "C15", "NC");
                // PREMIERE
                $req = $db->prepare("INSERT INTO Personne(ID, Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                $ID1	 	= '';
                $FirstName1	= utf8_decode($prenoms[array_rand($prenoms)]);
                $LastName1	= utf8_decode($noms[array_rand($noms)]);
                $Title1	    = 0;
                $ZIPCode1	= 1000;
                $PhoneNumber1	= 600000000;
                $GSMNumber1	= 600000000;
                $Ville1		= utf8_decode("Ville".$i);
                $Rue1		= utf8_decode("Rue".$i);
                $Number1		= 1;
                $rand1 = rand(1994,1976);
                $BirthDate1	= $rand1."-1-1";
                $Mail1		= $FirstName1.".".$LastName1."@mail.com";
                $CreationDate = date('Y-m-d');
                $Note1 = ""; //utf8_decode("R.A.S.");
                $IsPlayer1	= 1;
                $IsOwner1	= 0;
                $IsStaff1	= 0;

                $req->bind_param("iisssisiiissssiii", $ID1, $Title1, $FirstName1, $LastName1, $Ville1, $ZIPCode1, $Rue1, $Number1, $PhoneNumber1, $GSMNumber1, $BirthDate1, $Mail1, $CreationDate, $Note1, $IsPlayer1, $IsOwner1, $IsStaff1);

                $req->execute();

                // DEUXIEME
                $req = $db->prepare("INSERT INTO Personne(ID, Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                $ID2	 	= '';
                $FirstName2	= utf8_decode($prenoms[array_rand($prenoms)]);
                $LastName2	= utf8_decode($noms[array_rand($noms)]);
                $Title2	    = 0;
                $ZIPCode2	= 1000;
                $PhoneNumber2	= 600000000;
                $GSMNumber2	= 600000000;
                $Ville2		= utf8_decode("Ville".($i+1));
                $Rue2		= utf8_decode("Rue".($i+1));
                $Number2		= 1;
                $rand2 = rand(1994,1976);
                $BirthDate2	= $rand2."-1-1";
                $Mail2		= $FirstName2.".".$LastName2."@mail.com";
                $CreationDate = date('Y-m-d');
                $Note2 = ""; //utf8_decode("R.A.S.");
                $IsPlayer2	= 1;
                $IsOwner2	= 0;
                $IsStaff2	= 0;

                $req->bind_param("iisssisiiissssiii", $ID2, $Title2, $FirstName2, $LastName2, $Ville2, $ZIPCode2, $Rue2, $Number2, $PhoneNumber2, $GSMNumber2, $BirthDate2, $Mail2, $CreationDate, $Note2, $IsPlayer2, $IsOwner2, $IsStaff2);

                $req->execute();


                // $req = $db->prepare("INSERT INTO Player(ID_Personne,IsLeader,Paid,AlreadyPart) VALUES(".$donnees1['ID'].",0,1,1)");
                // $req->execute();

                // --------------------AJOUTER PLAYER---------------------------

                $req = $db->prepare("INSERT INTO Player(ID_personne, IsLeader, Paid, AlreadyPart, Ranking) VALUES(?, ?, ?, ?, ?)");

                //	$req = $db->prepare('INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Address, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES('', "bb", "bb", 1, 1234, 12354, 46351, "glkrzjglz e zfzef", 2015-02-02, "lzeijgze@fmezk.com", 2015-02-03, 1, 0, 0)');

                $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName1.'" = FirstName AND "'.$LastName1.'" = LastName AND Ville = "'.$Ville1.'"');
                $donnees1 = $reponse->fetch_array();

                $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName2.'" = FirstName AND "'.$LastName2.'" = LastName AND Ville = "'.$Ville2.'"');
                $donnees2 = $reponse->fetch_array();

                $ID_Personne1=$donnees1['ID'];
                $ID_Personne2=$donnees2['ID'];

                $IsLeader=0;
                $Paid=0;
                $AlreadyPart=0;

                // Get player classement
                $Birth1	= $BirthDate1;
                $Birth2	= $BirthDate2;

                $ranking1 = $rankings[array_rand($rankings)]; //getRanking($FirstName1, $LastName1, $Birth1);
                $ranking2 = $rankings[array_rand($rankings)];
                $req->bind_param("iiiis", $ID_Personne1, $IsLeader, $Paid, $AlreadyPart, $ranking1);
                $req->execute();

                $req = $db->prepare("INSERT INTO Player(ID_personne, IsLeader, Paid, AlreadyPart, Ranking) VALUES(?, ?, ?, ?, ?)");
                $req->bind_param("iiiis", $ID_Personne2, $IsLeader,$Paid, $AlreadyPart, $ranking2);
                $req->execute();

                $reponse = $db->query('SELECT * FROM Team WHERE '.$ID_Personne1.' = ID_Player1 AND '.$ID_Personne2.' = ID_Player2');
                $donnees = $reponse->fetch_array();

                // Mise à jour de l'historique
                addHistory($donnees["ID"], "Equipe", "Ajout");

                // ---------------------AJOUTER TEAM--------------------------
                $req = $db->prepare("INSERT INTO Team(ID, ID_player1, ID_player2, ID_Cat, NbWinMatch, AvgRanking) VALUES(?, ?, ?, ?, ?, ?)");

                $ID	 	= '';
                $ID_player1	= $donnees1['ID'];
                $ID_player2	= $donnees2['ID'];

                /*On determine sa categorie - START */
                // Get l'age le plus grand des deux joueurs
                $ageCurrent = max(intval(date('Y')) - intval($rand1), intval(date('Y')) - intval($rand2));
                $reponse = $db->query('SELECT * FROM Categorie');
                $ID_Cat		= '1';

                // Parcours des categories
                foreach ($reponse as $donnees) {
                $ageCat = explode(" - ", $donnees["Age"]);

                // Si l'âge est dans la tranche d'âge on l'ajoute à cette catégorie
                if (intval($ageCat[0])<= $ageCurrent && intval($ageCat[1]) >= $ageCurrent) {
                  $ID_Cat		= $donnees['ID'];
                }
                }


                /*On determine sa categorie - END */
                $NbmatchWin	= '0';

                $query = 'SELECT RankingInt FROM RankingTextToIntBelgian WHERE "'.$ranking1.'" = RankingText OR "'.$ranking2.'" = RankingText';
                $RankingReponse = $db->query($query);
                $rankings = $RankingReponse->fetch_array();
                $rankInt1 = $rankings['RankingInt'];
                $rankings = $RankingReponse->fetch_array();
                $rankInt2 = $rankings['RankingInt'];
                $rankingAvgInt = round(($rankInt1 + $rankInt2)/2);
                $RankingReponse = $db->query('SELECT RankingText FROM RankingTextToIntBelgian WHERE '.$rankingAvgInt.' = RankingInt ');
                $rankingAvgText = ($RankingReponse->fetch_array());
                $rankingAvgText = $rankingAvgText['RankingText'];

                $req->bind_param("iiiiis", $ID, $ID_player1, $ID_player2, $ID_Cat, $NbmatchWin, $rankingAvgText);

                $req->execute();

                $reponse = $db->query('SELECT * FROM Team WHERE '.$ID_player1.' = ID_Player1 AND '.$ID_player2.' = ID_Player2');
                $donnees = $reponse->fetch_array();

                // Mise à jour de l'historique
                addHistory($donnees["ID"], "Equipe", "Ajout");


                // -------------------AJOUTER EXTRAS FOR PLAYER 1----------------------------
                $db->query("INSERT INTO PersonneExtra (ID, Extra_ID, Personne_ID) VALUES(\"\",".$extrasList[array_rand($extrasList)].",".$ID_Personne1.")");

                // -------------------AJOUTER EXTRAS FOR PLAYER 2----------------------------
                $db->query("INSERT INTO PersonneExtra (ID, Extra_ID, Personne_ID) VALUES(\"\",".$extrasList[array_rand($extrasList)].",".$ID_Personne2.")");

                  $IDPlayers[$i] = $db->insert_id;
                  }

        // Le dernier, un tournoi des familles de 13 paires complétés avec les résultats des knock-offs encodés.
        for ($i = 0; $i < 26; $i+=2) {
            /*$req = $db->prepare("INSERT INTO Personne(Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(1,'joueur".$1."','name".$1."','bxl','1000','rue de la pluie',".$1.",'665666','545535','1985-1-1','mailbidon".$1."@mailbidons.com','2015-11-11','',1,0,0)");
            $req->execute();*/

            $prenoms = array("Adam", "Alex", "Alexandre", "Alexis", "Anthony", "Antoine", "Benjamin", "Cédric", "Charles", "Christopher", "David", "Dylan", "Édouard", "Elliot", "Émile", "Étienne", "Félix", "Gabriel", "Guillaume", "Hugo", "Isaac", "Jacob", "Jérémy", "Jonathan", "Julien", "Justin", "Léo", "Logan", "Loïc", "Louis", "Lucas", "Ludovic", "Malik", "Mathieu", "Mathis", "Maxime", "Michaël", "Nathan", "Nicolas", "Noah", "Olivier", "Philippe", "Raphaël", "Samuel", "Simon", "Thomas", "Tommy", "Tristan", "Victor", "Vincent");
            $noms = array("Tremblay", "Desmarais", "Larrivée", "Chan", "Gagnon", "Laberge", "Major", "Métivier", "Roy", "Nault", "Boissonneault", "Fradette", "Côté", "Bourgeois", "Patenaude", "Ranger", "Bouchard", "Lafrance", "Alarie", "Després", "Gauthier", "Lagacé", "Carpentier", "Lesage", "Morin", "Daoust", "Grenon", "Poliquin", "Lavoie", "Brault", "Bossé", "Généreux", "Fortin", "Castonguay", "Bessette", "Papineau", "Gagné", "Vallières", "Lajeunesse", "Frappier", "Ouellet", "Pellerin", "Barbeau", "Latreille", "Pelletier", "Rivest", "Miller", "Meloche", "Bélanger", "Brochu", "Masson", "Gouin", "Lévesque", "Samson", "Cournoyer", "Crête", "Bergeron", "Lépine", "Ratté", "Pedneault", "Leblanc", "Leroux", "Chrétien", "Berger", "Paquette", "Larochelle", "Bourgault", "Briand", "Girard", "Brousseau", "Leboeuf", "Olivier", "Simard", "Sauvé", "Nolet", "Truchon", "Boucher", "Laurin", "Sylvestre", "Sénéchal");
            $rankings = array("C30.5", "C30.4", "C30.3", "C30.2", "C30.1", "C30", "C15.5", "C15.4", "C15.3", "C15.2", "C15.1", "C15", "NC");
            // PREMIERE
            $req = $db->prepare("INSERT INTO Personne(ID, Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $ID1	 	= '';
            $FirstName1	= utf8_decode($prenoms[array_rand($prenoms)]);
            $LastName1	= utf8_decode($noms[array_rand($noms)]);
            $Title1	    = 0;
            $ZIPCode1	= 1000;
            $PhoneNumber1	= 600000000;
            $GSMNumber1	= 600000000;
            $Ville1		= utf8_decode("Ville".$i);
            $Rue1		= utf8_decode("Rue".$i);
            $Number1		= 1;
            $rand1 = rand(1974,1956);
            $BirthDate1	= $rand1."-1-1";
            $Mail1		= $FirstName1.".".$LastName1."@mail.com";
            $CreationDate = date('Y-m-d');
            $Note1 = ""; //utf8_decode("R.A.S.");
            $IsPlayer1	= 1;
            $IsOwner1	= 0;
            $IsStaff1	= 0;

            $req->bind_param("iisssisiiissssiii", $ID1, $Title1, $FirstName1, $LastName1, $Ville1, $ZIPCode1, $Rue1, $Number1, $PhoneNumber1, $GSMNumber1, $BirthDate1, $Mail1, $CreationDate, $Note1, $IsPlayer1, $IsOwner1, $IsStaff1);

            $req->execute();

            // DEUXIEME
            $req = $db->prepare("INSERT INTO Personne(ID, Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $ID2	 	= '';
            $FirstName2	= utf8_decode($prenoms[array_rand($prenoms)]);
            $LastName2	= utf8_decode($noms[array_rand($noms)]);
            $Title2	    =1;
            $ZIPCode2	= 1000;
            $PhoneNumber2	= 600000000;
            $GSMNumber2	= 600000000;
            $Ville2		= utf8_decode("Ville".($i+1));
            $Rue2		= utf8_decode("Rue".($i+1));
            $Number2		= 1;
            $rand2 = rand(1974,1956);
            $BirthDate2	= $rand2."-1-1";
            $Mail2		= $FirstName2.".".$LastName2."@mail.com";
            $CreationDate = date('Y-m-d');
            $Note2 = ""; //utf8_decode("R.A.S.");
            $IsPlayer2	= 1;
            $IsOwner2	= 0;
            $IsStaff2	= 0;

            $req->bind_param("iisssisiiissssiii", $ID2, $Title2, $FirstName2, $LastName2, $Ville2, $ZIPCode2, $Rue2, $Number2, $PhoneNumber2, $GSMNumber2, $BirthDate2, $Mail2, $CreationDate, $Note2, $IsPlayer2, $IsOwner2, $IsStaff2);

            $req->execute();


            // $req = $db->prepare("INSERT INTO Player(ID_Personne,IsLeader,Paid,AlreadyPart) VALUES(".$donnees1['ID'].",0,1,1)");
            // $req->execute();

            // --------------------AJOUTER PLAYER---------------------------

            $req = $db->prepare("INSERT INTO Player(ID_personne, IsLeader, Paid, AlreadyPart, Ranking) VALUES(?, ?, ?, ?, ?)");

            //	$req = $db->prepare('INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Address, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES('', "bb", "bb", 1, 1234, 12354, 46351, "glkrzjglz e zfzef", 2015-02-02, "lzeijgze@fmezk.com", 2015-02-03, 1, 0, 0)');

            $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName1.'" = FirstName AND "'.$LastName1.'" = LastName AND Ville = "'.$Ville1.'"');
            $donnees1 = $reponse->fetch_array();

            $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName2.'" = FirstName AND "'.$LastName2.'" = LastName AND Ville = "'.$Ville2.'"');
            $donnees2 = $reponse->fetch_array();

            $ID_Personne1=$donnees1['ID'];
            $ID_Personne2=$donnees2['ID'];

            $IsLeader=0;
            $Paid=0;
            $AlreadyPart=0;

            // Get player classement
            $Birth1	= $BirthDate1;
            $Birth2	= $BirthDate2;

            $ranking1 = $rankings[array_rand($rankings)]; //getRanking($FirstName1, $LastName1, $Birth1);
            $ranking2 = $rankings[array_rand($rankings)];
            $req->bind_param("iiiis", $ID_Personne1, $IsLeader, $Paid, $AlreadyPart, $ranking1);
            $req->execute();

            $req = $db->prepare("INSERT INTO Player(ID_personne, IsLeader, Paid, AlreadyPart, Ranking) VALUES(?, ?, ?, ?, ?)");
            $req->bind_param("iiiis", $ID_Personne2, $IsLeader,$Paid, $AlreadyPart, $ranking2);
            $req->execute();

            $reponse = $db->query('SELECT * FROM Team WHERE '.$ID_Personne1.' = ID_Player1 AND '.$ID_Personne2.' = ID_Player2');
            $donnees = $reponse->fetch_array();

            // Mise à jour de l'historique
            addHistory($donnees["ID"], "Equipe", "Ajout");

            // ---------------------AJOUTER TEAM--------------------------
            $req = $db->prepare("INSERT INTO Team(ID, ID_player1, ID_player2, ID_Cat, NbWinMatch, AvgRanking) VALUES(?, ?, ?, ?, ?, ?)");

            $ID	 	= '';
            $ID_player1	= $donnees1['ID'];
            $ID_player2	= $donnees2['ID'];

            /*On determine sa categorie - START */
            // Get l'age le plus grand des deux joueurs
            $ageCurrent = max(intval(date('Y')) - intval($rand1), intval(date('Y')) - intval($rand2));
            $reponse = $db->query('SELECT * FROM Categorie');
            $ID_Cat		= '1';

            // Parcours des categories
            foreach ($reponse as $donnees) {
            $ageCat = explode(" - ", $donnees["Age"]);

            // Si l'âge est dans la tranche d'âge on l'ajoute à cette catégorie
            if (intval($ageCat[0])<= $ageCurrent && intval($ageCat[1]) >= $ageCurrent) {
              $ID_Cat		= $donnees['ID'];
            }
            }


            /*On determine sa categorie - END */
            $NbmatchWin	= '0';

            $query = 'SELECT RankingInt FROM RankingTextToIntBelgian WHERE "'.$ranking1.'" = RankingText OR "'.$ranking2.'" = RankingText';
            $RankingReponse = $db->query($query);
            $rankings = $RankingReponse->fetch_array();
            $rankInt1 = $rankings['RankingInt'];
            $rankings = $RankingReponse->fetch_array();
            $rankInt2 = $rankings['RankingInt'];
            $rankingAvgInt = round(($rankInt1 + $rankInt2)/2);
            $RankingReponse = $db->query('SELECT RankingText FROM RankingTextToIntBelgian WHERE '.$rankingAvgInt.' = RankingInt ');
            $rankingAvgText = ($RankingReponse->fetch_array());
            $rankingAvgText = $rankingAvgText['RankingText'];

            $req->bind_param("iiiiis", $ID, $ID_player1, $ID_player2, $ID_Cat, $NbmatchWin, $rankingAvgText);

            $req->execute();

            $reponse = $db->query('SELECT * FROM Team WHERE '.$ID_player1.' = ID_Player1 AND '.$ID_player2.' = ID_Player2');
            $donnees = $reponse->fetch_array();

            // Mise à jour de l'historique
            addHistory($donnees["ID"], "Equipe", "Ajout");


            // -------------------AJOUTER EXTRAS FOR PLAYER 1----------------------------
            $db->query("INSERT INTO PersonneExtra (ID, Extra_ID, Personne_ID) VALUES(\"\",".$extrasList[array_rand($extrasList)].",".$ID_Personne1.")");


            // -------------------AJOUTER EXTRAS FOR PLAYER 2----------------------------
            $db->query("INSERT INTO PersonneExtra (ID, Extra_ID, Personne_ID) VALUES(\"\",".$extrasList[array_rand($extrasList)].",".$ID_Personne2.")");
            $IDPlayers[$i] = $db->insert_id;
    }

}
