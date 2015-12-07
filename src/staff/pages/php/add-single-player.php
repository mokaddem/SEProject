<!-- Ajout d'un nouveau duo de joueur,
fonction appelée dans le formulaire de player.php
 et dans le formulaire d'inscription de la page d'accueil utilisateur
Redirection vers list.php?type=player ou la page d'accueil utilisateur

Mise à jour de l'historique
 -->
<?php
include_once('BDD.php');
include "../../../mail/mail_helper.php";
require_once('add-new-history.php');
include_once('get-ranking.php');
//	$db = BDconnect();
error_log(serialize($_GET));

if ($_GET['InputPrenom1'] == NULL
or $_GET['InputNom1'] == NULL
or $_GET['title1'] == NULL
or $_GET['InputCP1'] == NULL
or $_GET['InputMob1'] == NULL
or $_GET['InputLoc1'] == NULL
or $_GET['InputAdresse1'] == NULL
or $_GET['birth_year1'] == NULL
or $_GET['birth_month1'] == NULL
or $_GET['birth_day1'] == NULL
or $_GET['InputEmailFirst1'] == NULL  ){
  header("Location: ../../../inscription/index.php?error=true" );
  return;
}

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
$to1[0]=$_GET['InputEmailFirst1'];
$payer1 = $_GET['group1'];

$req->bind_param("iisssisiiissssiii", $ID1, $Title1, $FirstName1, $LastName1, $Ville1, $ZIPCode1, $Rue1, $Number1, $PhoneNumber1, $GSMNumber1, $BirthDate1, $Mail1, $CreationDate, $Note1, $IsPlayer1, $IsOwner1, $IsStaff1);

$req->execute();


$reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName1.'" = FirstName AND "'.$LastName1.'" = LastName');
$donnees1 = $reponse->fetch_array();
// Mise à jour de l'historique
addHistory( $donnees1["ID"], "Joueur", "Ajout");


// --------------------AJOUTER PLAYER---------------------------
$req = $db->prepare("INSERT INTO Player(ID_personne, IsLeader, Paid, AlreadyPart, Ranking) VALUES(?, ?, ?, ?, ?)");
$req2 = $db->prepare("INSERT INTO PlayerAlone(ID_personne, Paid, AlreadyPart, Ranking) VALUES(?, ?, ?, ?)");

$ID_Personne1=$donnees1['ID'];
$IsLeader=0;
$Paid=0;
$AlreadyPart=0;

// Get player classement
$Birth1	= date('d',mktime (0, 0, 0, 0, $_GET['birth_day1']))."/".date('m', mktime (0, 0, 0, $_GET['birth_month1']))."/".$_GET['birth_year1'];

$ranking1 = getRanking($FirstName1, $LastName1, $Birth1);
$ranking1[4] = $ranking1[4]== "" ? "NC" : $ranking1 ;
$req->bind_param("iiiis", $ID_Personne1, $IsLeader, $Paid, $AlreadyPart, $ranking1[4]);
$req2->bind_param("iiis", $ID_Personne1, $Paid, $AlreadyPart, $ranking1[4]);
$req->execute();
$req2->execute();

/*On determine sa categorie - END */

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

$reponse->free();

// -------------------Envoie Mail Paiement----------------------------
	$sujetR =  $db->query('SELECT Value FROM GlobalVariables WHERE Name="Sujet paiement"');
	$adresse = $db->query('SELECT Value FROM GlobalVariables WHERE Name="Adresse HQ"');
	
	//récuperer le sujet du mail
	$listSujet;
	while($suj = $sujetR->fetch_array())
	{
		$listSujet[0] = $suj['Value'];
	}
	//Adresse HQ
	$listHQ;
	while($lHQ = $adresse ->fetch_array())
	{
		$listHQ[0] = $lHQ['Value'];
	}
	$sujet = $listSujet[0];
	$message="";

	if($payer1==1)
	{
		$messageR = $db->query('SELECT Value FROM GlobalVariables WHERE Name="Paiement CB"');

		//récuperer le message du mail
		$listMessage;
		while($mes = $messageR->fetch_array())
		{
			$listMessage[0] = $mes['Value'];
		}
	}
	if($payer1==2)
	{
		$messageR2 = $db->query('SELECT Value FROM GlobalVariables WHERE Name="Paiement Paypal"');
		//récuperer le message du mail
		$listMessage;
		while($mes = $messageR2->fetch_array())
		{
			$listMessage[0] = $mes['Value'];
		}

	}
	if($payer1==3)
	{
		$messageR3 = $db->query('SELECT Value FROM GlobalVariables WHERE Name="Paiement Espèce"');
		//récuperer le message du mail
		$listMessage;
		while($mes = $messageR3->fetch_array())
		{
			$listMessage[0] = $mes['Value'];
		}

	}
	$message = $listMessage[0];
	$message.="\n\nPS : Adresse du quartier general : ".$listHQ[0]."\n\n";

	sendMail($to1, $message, $sujet);
//////////////////////////////////////


if (array_key_exists('ID', $_SESSION)) {
    header("Location: ../list.php?type=player");
} else {
    header("Location: ../../../index.php?action=register" );
}

?>
