<!-- Ajout d'un nouveau duo de joueur,
fonction appelée dans le formulaire de player.php
 et dans le formulaire d'inscription de la page d'accueil utilisateur
Redirection vers list.php?type=player ou la page d'accueil utilisateur

Mise à jour de l'historique
 -->
 <?php
	include_once('BDD.php');
    require_once('add-new-history.php');
	include_once('get-ranking.php');
//	$db = BDconnect();

	// Ajout du duo de joueur
	$db = BDconnect();
	$req = $db->prepare("INSERT INTO Personne(ID, Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

	$ID1	 	= '';
	$FirstName1	= utf8_decode($_GET['InputPrenom1']);
	$LastName1	= utf8_decode($_GET['InputNom1']);
	$Title1	= $_GET['title1'];
	$ZIPCode1	= $_GET['InputCP1'];
	$PhoneNumber1	= $_GET['InputFixe1'];
	$GSMNumber1	= $_GET['InputMob1'];
	$Ville1		= utf8_decode($_GET['InputLoc1']);
	$Rue1		= utf8_decode($_GET['InputAdresse1']);
	$Number1		= $_GET['InputBat1'];
	$BirthDate1	= $_GET['birth_year1']."-".$_GET['birth_month1']."-".$_GET['birth_day1'];
	$Mail1		= $_GET['InputEmailFirst1'];
	$CreationDate = date('Y-m-d');
    $Note1 = utf8_decode($_GET['InputMessage1']);
	$IsPlayer1	= 1;
	$IsOwner1	= 0;
	$IsStaff1	= 0;



	$req->bind_param("iisssisiiissssiii", $ID1, $Title1, $FirstName1, $LastName1, $Ville1, $ZIPCode1, $Rue1, $Number1, $PhoneNumber1, $GSMNumber1, $BirthDate1, $Mail1, $CreationDate, $Note1, $IsPlayer1, $IsOwner1, $IsStaff1);

	$req->execute();


    $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName1.'" = FirstName AND "'.$LastName1.'" = LastName');
    $donnees1 = $reponse->fetch_array();
    // Mise à jour de l'historique
    addHistory( $donnees1["ID"], "Joueur", "Ajout");



    $req = $db->prepare("INSERT INTO Personne(ID, Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

	$ID2	 	    = '';
	$FirstName2	= utf8_decode($_GET['InputPrenom2']);
	$LastName2	= utf8_decode($_GET['InputNom2']);
	$Title2		= $_GET['title2'];
	$ZIPCode2	= $_GET['InputCP2'];
	$PhoneNumber2= $_GET['InputFixe2'];
	$GSMNumber2	= $_GET['InputMob2'];
	$Ville2		= utf8_decode($_GET['InputLoc2']);
	$Rue2		= utf8_decode($_GET['InputAdresse2']);
	$Number2		= $_GET['InputBat2'];
	$BirthDate2	= $_GET['birth_year2']."-".$_GET['birth_month2']."-".$_GET['birth_day2'];
	$Mail2		= $_GET['InputEmailFirst2'];
    $Note2      = utf8_decode($_GET['InputMessage2']);
	//$CreationDate	= date('Y-m-d');
	$IsPlayer2	= 1;
	$IsOwner2	= 0;
	$IsStaff2	= 0;

	$req->bind_param("iisssisiiissssiii", $ID2, $Title2, $FirstName2, $LastName2, $Ville2, $ZIPCode2, $Rue2, $Number2, $PhoneNumber2, $GSMNumber2, $BirthDate2, $Mail2, $CreationDate, $Note2, $IsPlayer2, $IsOwner2, $IsStaff2);


	$req->execute();


    $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName2.'" = FirstName AND "'.$LastName2.'" = LastName');
    $donnees2 = $reponse->fetch_array();
    // Mise à jour de l'historique
    addHistory( $donnees2["ID"], "Joueur", "Ajout");


    // --------------------AJOUTER PLAYER---------------------------

	$req = $db->prepare("INSERT INTO Player(ID_personne, IsLeader, Paid, AlreadyPart, Ranking) VALUES(?, ?, ?, ?, ?)");

	//	$req = $db->prepare('INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Address, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES('', "bb", "bb", 1, 1234, 12354, 46351, "glkrzjglz e zfzef", 2015-02-02, "lzeijgze@fmezk.com", 2015-02-03, 1, 0, 0)');

	$ID_Personne1=$donnees1['ID'];
	$ID_Personne2=$donnees2['ID'];
	$IsLeader=0;
	$Paid=0;
	$AlreadyPart=0;

	// Get player classement
	$Birth1	= date('d',mktime (0, 0, 0, 0, $_GET['birth_day1']))."/".date('m', mktime (0, 0, 0, $_GET['birth_month1']))."/".$_GET['birth_year1'];
	$Birth2	= date('d',mktime (0, 0, 0, 0, $_GET['birth_day2']))."/".date('m', mktime (0, 0, 0, $_GET['birth_month2']))."/".$_GET['birth_year2'];


	$ranking1 = getRanking($FirstName1, $LastName1, $Birth1);
	$ranking2 = getRanking($FirstName2, $LastName2, $Birth2);
	$req->bind_param("iiiis", $ID_Personne1, $IsLeader, $Paid, $AlreadyPart, $ranking1[4]);
	$req->execute();

	$req = $db->prepare("INSERT INTO Player(ID_personne, IsLeader, Paid, AlreadyPart, Ranking) VALUES(?, ?, ?, ?, ?)");
	$req->bind_param("iiiis", $ID_Personne2, $IsLeader,$Paid, $AlreadyPart, $ranking2[4]);
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
	$ID_Cat		= '1';
	$NbmatchWin	= '0';

	$query = 'SELECT RankingInt FROM RankingTextToIntBelgian WHERE "'.$ranking1[4].'" = RankingText OR "'.$ranking2[4].'" = RankingText';
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
	$extraIDs = $db->query('SELECT ID as id FROM Extras');
	//error_log(serialize($_GET));
	//for($i=1; $i<=$nbrIter; $i++){
	while($extraID = $extraIDs->fetch_array()){
		$extraName="extra1_".(String) ($extraID['id']);
		if(isset($_GET[$extraName])) {
			$extra = $_GET[$extraName];
				$db->query("INSERT INTO PersonneExtra (ID, Extra_ID, Personne_ID) VALUES(\"\",".$extraID['id'].",".$ID_Personne1.")");
		} else{
			// Do Nothing
		}
	}

	// -------------------AJOUTER EXTRAS FOR PLAYER 2----------------------------
	$extraIDs = $db->query('SELECT ID as id FROM Extras');
	//error_log(serialize($_GET));
	//for($i=1; $i<=$nbrIter; $i++){
	while($extraID = $extraIDs->fetch_array()){
		$extraName="extra2_".(String) ($extraID['id']);
		if(isset($_GET[$extraName])) {
			$extra = $_GET[$extraName];
			$db->query("INSERT INTO PersonneExtra (ID, Extra_ID, Personne_ID) VALUES(\"\",".$extraID['id'].",".$ID_Personne2.")");
		} else{
			// Do Nothing
		}
	}

	if (array_key_exists($_SESSION)) {
	header("Location: ../list.php?type=player");
	} else {
		header("Location: ../../../index.php?action=register" );
    }

?>
