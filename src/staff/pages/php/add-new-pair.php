<?php
	include_once('BDD.php');
    require_once('add-new-history.php');
//	$db = new BDD();

	$database_host = 'localhost';
	$database_user = 'root';
	$database_pass = '123';

	$database_db = 'SEProjectC';
	$db = new mysqli($database_host, $database_user, $database_pass, $database_db);
	
	$req = $db->prepare("INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Rue, Number, Ville, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

//	$req = $db->prepare('INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Address, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES('', "bb", "bb", 1, 1234, 12354, 46351, "glkrzjglz e zfzef", 2015-02-02, "lzeijgze@fmezk.com", 2015-02-03, 1, 0, 0)');

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
	$IsPlayer1	= 1;
	$IsOwner1	= 0;
	$IsStaff1	= 0;

    

	$req->bind_param("issiissssisssiii", $ID1, $FirstName1, $LastName1, $Title1, $ZIPCode1, $PhoneNumber1, $GSMNumber1, $Ville1, $Rue1, $Number1, $BirthDate1, $Mail1, $CreationDate, $IsPlayer1, $IsOwner1, $IsStaff1);

	$req->execute();


    $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName1.'" = FirstName AND "'.$LastName1.'" = LastName');
    $donnees1 = $reponse->fetch_array();
    addHistory( $donnees1["ID"], "Joueur", "Ajout");
	
    

	$req = $db->prepare("INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Rue, Number, Ville, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

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
	//$CreationDate	= date('Y-m-d');
	$IsPlayer2	= 1;
	$IsOwner2	= 0;
	$IsStaff2	= 0;

	$req->bind_param("issiissssisssiii", $ID2, $FirstName2, $LastName2, $Title2, $ZIPCode2, $PhoneNumber2, $GSMNumber2, $Ville2, $Rue2, $Number2, $BirthDate2, $Mail2, $CreationDate, $IsPlayer2, $IsOwner2, $IsStaff2);

	$req->execute();


    $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName2.'" = FirstName AND "'.$LastName2.'" = LastName');    
    $donnees2 = $reponse->fetch_array();
    addHistory( $donnees2["ID"], "Joueur", "Ajout");


    // ---------------------AJOUTER TEAM--------------------------
	$req = $db->prepare("INSERT INTO Team(ID, ID_player1, ID_player2, ID_Cat, NbWinMatch) VALUES(?, ?, ?, ?, ?)");

//	$req = $db->prepare('INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Address, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES('', "bb", "bb", 1, 1234, 12354, 46351, "glkrzjglz e zfzef", 2015-02-02, "lzeijgze@fmezk.com", 2015-02-03, 1, 0, 0)');

	$ID	 	= '';
	$ID_player1	= $donnees1['ID'];
	$ID_player2	= $donnees2['ID'];
	$ID_Cat		= '1';
	$NbmatchWin	= '0';

	$req->bind_param("iiiii", $ID, $ID_player1, $ID_player2, $ID_Cat, $NbmatchWin);

	$req->execute();

    $reponse = $db->query('SELECT * FROM Team WHERE '.$ID_player1.' = ID_Player1 AND '.$ID_player2.' = ID_Player2');
    $donnees = $reponse->fetch_array();
	
    addHistory( $donnees["ID"], "Equipe", "Ajout");

    // --------------------AJOUTER PLAYER---------------------------

	$req = $db->prepare("INSERT INTO Player(ID_personne, IsLeader, Paid, AlreadyPart) VALUES(?, ?, ?, ?)");

	//	$req = $db->prepare('INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Address, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES('', "bb", "bb", 1, 1234, 12354, 46351, "glkrzjglz e zfzef", 2015-02-02, "lzeijgze@fmezk.com", 2015-02-03, 1, 0, 0)');

	$ID_Personne1=$ID_player1;
	$ID_Personne2=$ID_player2;
	$IsLeader=0;
	$Paid=0;
	$AlreadyPart=0;

	$req->bind_param("iiii", $ID_Personne1, $IsLeader, $Paid, $AlreadyPart);
	$req->execute();

	$req = $db->prepare("INSERT INTO Player(ID_personne, IsLeader, Paid, AlreadyPart) VALUES(?, ?, ?, ?)");
	$req->bind_param("iiii", $ID_Personne2, $IsLeader,$Paid, $AlreadyPart);
	$req->execute();

	$reponse = $db->query('SELECT * FROM Team WHERE '.$ID_player1.' = ID_Player1 AND '.$ID_player2.' = ID_Player2');
	$donnees = $reponse->fetch_array();

	addHistory( $donnees["ID"], "Equipe", "Ajout");






	/*if (array_key_exists($_SESSION)) {*/
	header("Location: ../list.php?type=player");
	/*} else {
		header( "refresh:5;url=../../../../index.php?action=register" );
    }*/


?>
