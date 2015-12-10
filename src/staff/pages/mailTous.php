<?php
include_once('php/BDD.php');
include "../../mail/mail_helper.php";

$db = BDconnect();

$gsSam = $db->query('SELECT GroupSaturday.ID as Gid FROM GroupSaturday');

$groupsDim = $db->query('SELECT GroupSunday.ID as Gid FROM GroupSunday');

$message = $db->query('SELECT Value FROM GlobalVariables WHERE id=6');

$sujet =  $db->query('SELECT Value FROM GlobalVariables WHERE id=7');

$adresse = $db->query('SELECT Value FROM GlobalVariables WHERE id=3');

//récuperer le message du mail 
$listMessage;
while($mes = $message->fetch_array())	
{
	$listMessage[0] = $mes['Value'];
}

//récuperer le sujet du mail
$listSujet;
while($suj = $sujet->fetch_array())	
{
	$listSujet[0] = $suj['Value'];
}

//Adresse du HQ depuis la base de données
$listHQ;
while($lHQ = $adresse ->fetch_array())
{
	$listHQ[0] = $lHQ['Value'];
}

//Email à envoyé au leader des groupes du Samedi
$flagSam=0;
$i=0;
$arraySam;
while ($gSam = $gsSam->fetch_array())
{
	$arraySam[$i] = $gSam['Gid'];
	$i++;
}
$i--;
While($i!=-1)
{
if(ISSET($_POST["groupID"]))
	{
		$j=0;
		$listAdress;
		$mailsSam = $db -> query("SELECT DISTINCT Mail FROM Personne JOIN Player ON Player.ID_Personne = Personne.ID JOIN Team ON Team.ID_Player1=Player.ID_Personne OR Team.ID_Player2=Player.ID_Personne JOIN GroupSaturday ON GroupSaturday.ID_t1 = Team.ID OR GroupSaturday.ID_t2 = Team.ID OR GroupSaturday.ID_t3 = Team.ID OR GroupSaturday.ID_t4 = Team.ID OR GroupSaturday.ID_t5 = Team.ID OR GroupSaturday.ID_t6 = Team.ID OR GroupSaturday.ID_t7 = Team.ID OR GroupSaturday.ID_t8 = Team.ID WHERE GroupSaturday.ID=".$_POST["groupID"]);
		$y=0;
		$listRespFirst;
		$listRespLast;
		$listRespPhone;
		$listRespGSM;
		$listRespMail;
		$respCat= $db->query("SELECT DISTINCT Personne.FirstName, Personne.LastName, Personne.PhoneNumber, Personne.GSMNumber, Personne.Mail FROM Personne JOIN Staff ON Staff.ID_Personne = Personne.ID JOIN Categorie ON Staff.ID_Cat = Categorie.ID JOIN Team ON Team.ID_Cat = Categorie.ID JOIN GroupSaturday ON GroupSaturday.ID_t1 = Team.ID WHERE GroupSaturday.ID=".$_POST["groupID"]);
		$listCat;
		$numeroCat= $db->query("SELECT Categorie.ID FROM Categorie JOIN Team ON Team.ID_Cat = Categorie.ID JOIN GroupSaturday ON GroupSaturday.ID_t1 = Team.ID WHERE GroupSaturday.ID=".$_POST["groupID"]);
		while($nCat = $numeroCat->fetch_array())
		{
			$listCat[0]=$nCat['ID'];
		}		
		while($mailSam = $mailsSam ->fetch_array())
		{
			$listAdress[$j]=$mailSam['Mail'];
			$j++;
		}
		while($respC = $respCat->fetch_array())
		{
			$listRespFirst[$y]=$respC['FirstName'];
			$listRespLast[$y]=$respC['LastName'];
			$listRespPhone[$y]=$respC['PhoneNumber'];
			$listRespGSM[$y]=$respC['GSMNumber'];
			$listRespMail[$y]=$respC['Mail'];
			$y++;
		}
		$i--;
		$flagSam=1;
		break;
	}
	else{
		$i--;
	}
}
//On test si on est samedi
if($flagSam==1) //Si oui on envoie le mail à ceux du groupe cliqué
{
	$to[0]="";
	$h=0;
for($j--;$j!=-1;$j--)
{
	$to[$h] = $listAdress[$j]; 
	$h++;
}
$email_subject = $listSujet[0];
$email_body = $listMessage[0];
$psResponsable="\n\nCoordonnees des responsables : ";
for($y--;$y!=-1;$y--)
{
	$psResponsable.="Prenom : ".$listRespFirst[$y]."\n\n";
	$psResponsable.="Nom : ".$listRespLast[$y]."\n\n";
	$psResponsable.="Numero de telephone : ".$listRespPhone[$y]."\n\n";
	$psResponsable.="Numero de GSM : ".$listRespGSM[$y]."\n\n";
	$psResponsable.="Adresse Email : ".$listRespMail[$y]."\n\n";
	$psResponsable.="----------------\n\n";
}
$email_body.=$psResponsable;
$email_body.="PS : Adresse du quartier general : ".$listHQ[0]."\n\n";
sendMail($to, $email_body, $email_subject);
header('Location: group.php?jour=sam&cat='.$listCat[0]);
}

////////////////////////////////////////////////////////////////////////////////


//Email à envoyer au Leader des groupes du dimanche
else //Si on est dimanche
{
	$k=0;
	$arrayDim;
	while ($gDim = $groupsDim->fetch_array())
	{
		$arrayDim[$k] = $gDim['Gid'];
		$k++;
	}
	$k--;
	While($k!=-1)
	{
		if(ISSET($_POST["groupID"]))
		{
			$t=0;
			$listAdressDim;
			$mailsDim = $db -> query("SELECT DISTINCT Mail FROM Personne JOIN Player ON Player.ID_Personne = Personne.ID JOIN Team ON Team.ID_Player1=Player.ID_Personne OR Team.ID_Player2=Player.ID_Personne JOIN GroupSunday ON GroupSunday.ID_t1 = Team.ID OR GroupSunday.ID_t2 = Team.ID OR GroupSunday.ID_t3 = Team.ID OR GroupSunday.ID_t4 = Team.ID OR GroupSunday.ID_t5 = Team.ID OR GroupSunday.ID_t6 = Team.ID OR GroupSunday.ID_t7 = Team.ID OR GroupSunday.ID_t8 = Team.ID WHERE GroupSunday.ID=".$_POST["groupID"]);
			$y=0;
			$listRespFirst;
			$listRespLast;
			$listRespPhone;
			$listRespGSM;
			$listRespMail;
			$respCat= $db->query("SELECT DISTINCT Personne.FirstName, Personne.LastName, Personne.PhoneNumber, Personne.GSMNumber, Personne.Mail FROM Personne JOIN Staff ON Staff.ID_Personne = Personne.ID JOIN Categorie ON Staff.ID_Cat = Categorie.ID JOIN Team ON Team.ID_Cat = Categorie.ID JOIN GroupSunday ON GroupSunday.ID_t1 = Team.ID WHERE GroupSunday.ID=".$_POST["groupID"]);
			$listCat;
			while($nCat = $numeroCat->fetch_array())
				$numeroCat= $db->query("SELECT Categorie.ID FROM Categorie JOIN Team ON Team.ID_Cat = Categorie.ID JOIN GroupSunday ON GroupSunday.ID_t1 = Team.ID WHERE GroupSunday.ID=".$_POST["groupID"]);
			{
				$listCat[0]=$nCat['ID'];
			}
			
			while($mailDim = $mailsDim ->fetch_array())
			{
				$listAdressDim[$t]=$mailDim['Mail'];
				$t++;
			}
			while($respC = $respCat->fetch_array())
			{
			$listRespFirst[$y]=$respC['FirstName'];
			$listRespLast[$y]=$respC['LastName'];
			$listRespPhone[$y]=$respC['PhoneNumber'];
			$listRespGSM[$y]=$respC['GSMNumber'];
			$listRespMail[$y]=$respC['Mail'];
			$y++;
			}
			$k--;
			break;
		}
		else
		{
			$k--;
		}
	}
	$to[0]="";
	$h=0;
	for($t--;$t!=-1;$t--)
	{
		$to[$h] = $listAdressDim[$t]; 
		$h++;
	}
	$email_subject = $listSujet[0];
	$email_body = $listMessage[0];
	$psResponsable="\n\nCoordonnees des responsables : ";
	for($y--;$y!=-1;$y--)
	{
		$psResponsable.="Prenom : ".$listRespFirst[$y]."\n\n";
		$psResponsable.="Nom : ".$listRespLast[$y]."\n\n";
		$psResponsable.="Numero de telephone : ".$listRespPhone[$y]."\n\n";
		$psResponsable.="Numero de GSM : ".$listRespGSM[$y]."\n\n";
		$psResponsable.="Adresse Email : ".$listRespMail[$y]."\n\n";
		$psResponsable.="----------------\n\n";
	}
	$email_body.=$psResponsable;
	$email_body.="PS : Adresse du quartier general : ".$listHQ[0]."\n\n";
	sendMail($to, $email_body, $email_subject);	
	header('Location: group.php?jour=dim&cat='.$listCat[0]);
}
?>