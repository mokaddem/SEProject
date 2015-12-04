<?php
	include_once('../staff/pages/php/BDD.php');
	include "mail_helper.php";
	
	$db = BDconnect();
	
	// on récupère le contenu des variables
	//Champs
	$dest = isset($_POST['dest'])?$_POST['dest']:'';	
	$sujet = isset($_POST['sujet'])?$_POST['sujet']:'';
	$message = isset($_POST['message'])?$_POST['message']:'';
	//CheckBox Desti
	$parti=isset($_POST['parti'])?$_POST['parti']:'';
	$propri=isset($_POST['proprio'])?$_POST['proprio']:'';
	$leaderSam = isset($_POST['leaderSam'])?$_POST['leaderSam']:'';
	$npSam=isset($_POST['NPSam'])?$_POST['NPSam']:'';
	$tousSam=isset($_POST['tousSam'])?$_POST['tousSam']:'';
	$leaderDim = isset($_POST['leaderDim'])?$_POST['leaderDim']:'';
	$npDim=isset($_POST['NPDim'])?$_POST['NPDim']:'';
	$tousDim=isset($_POST['tousDim'])?$_POST['tousDim']:'';
	//CheckBox Message
	$mesLeader=isset($_POST['mesLeader'])?$_POST['mesLeader']:'';
	$mesTous=isset($_POST['mesTous'])?$_POST['mesTous']:'';
	$mesNP=isset($_POST['mesNP'])?$_POST['mesNP']:'';
	
//On gère les destinataires
//////////////////////////////////////////////////////////////////////////////	
	//On calcul le champ dest pour pouvoir s'en servir après 
	$destCoupe = explode(",",$dest);
	
	
	//Pour calculer le nombre de catégorie et vérifier si elles ont été recue
	$categorie = $db->query('SELECT Designation FROM Categorie');
    $listCat;
    $z=0;
    $cat="cat_";
    while($lcat = $categorie -> fetch_array())
    {
    	$listCat[$z] = $lcat['Designation'];
    	$z++;
    }
    $z--;
    for($z;$z!=-1;$z--)
    {
    	$str=(string) $z;
    	$cat.=$str;
    	$catish=isset($_POST[$cat])?$_POST[$cat]:'';
    	if($catish==true)
    	{
    		$catRecu = $db->query('SELECT DISTINCT Mail FROM Personne JOIN Team ON Team.ID_Player1 = Personne.ID OR Team.ID_Player2 = Personne.ID JOIN Categorie ON Team.ID_Cat = Categorie.ID WHERE Categorie.Designation="'.$listCat[$z].'"');
    		$listcatRecu;
    		$compteur=0;
    		while($lstRecu = $catRecu -> fetch_array())
    		{
    			$listcatRecu[$compteur] = $lstRecu['Mail'];
    			$compteur++;
    		}
    		$ajoutCat=count($destCoupe);    		
    		$compteur--;
    		for($compteur;$compteur!=-1;$compteur--)
    		{
    			$destCoupe[$ajoutCat]=$listcatRecu[$compteur];
    			$ajoutCat++;
    		}
    	}
    	$str="";
    	$cat="cat_";
    }
    
///////////////////////////////////////////////////////////////////////////////    
   //Si tous les participants sont à joindre
	if($parti==true)
	{
		$adresse = $db->query('SELECT Mail FROM Personne WHERE IsPlayer=1');
		$listAdr;
		$i=0;
		while($ladr = $adresse -> fetch_array())
		{
			$listAdr[$i] = $ladr['Mail'];
			$i++;
		}
		$ajout=count($destCoupe);
		$i--;
		for($i;$i!=-1;$i--)
		{
			$destCoupe[$ajout]=$listAdr[$i];
			$ajout++;
		}	
	}
///////////////////////////////////////////////////////////////////////////////
	if($propri==true)
	{
		$adresse = $db->query('SELECT Mail FROM Personne WHERE IsOwner=1');
		$listAdr;
		$i=0;
		while($ladr = $adresse -> fetch_array())
		{
			$listAdr[$i] = $ladr['Mail'];
			$i++;
		}
		$ajout=count($destCoupe);
		$i--;
		for($i;$i!=-1;$i--)
		{
			$destCoupe[$ajout]=$listAdr[$i];
			$ajout++;
		}	
	}
///////////////////////////////////////////////////////////////////////////////
if($leaderSam==true)
	{
		$adresse = $db->query('SELECT DISTINCT Mail FROM Personne JOIN Player ON Player.ID_Personne = Personne.ID JOIN Team ON Team.ID_Player1=Player.ID_Personne OR Team.ID_Player2=Player.ID_Personne JOIN GroupSaturday ON GroupSaturday.ID_t1 = Team.ID OR GroupSaturday.ID_t2 = Team.ID OR GroupSaturday.ID_t3 = Team.ID OR GroupSaturday.ID_t4 = Team.ID OR GroupSaturday.ID_t5 = Team.ID OR GroupSaturday.ID_t6 = Team.ID OR GroupSaturday.ID_t7 = Team.ID OR GroupSaturday.ID_t8 = Team.ID WHERE Player.IsLeader=1');
		$listAdr;
		$i=0;
		while($ladr = $adresse -> fetch_array())
		{
			$listAdr[$i] = $ladr['Mail'];
			$i++;
		}
		$ajout=count($destCoupe);
		$i--;
		for($i;$i!=-1;$i--)
		{
			$destCoupe[$ajout]=$listAdr[$i];
			$ajout++;
		}
	}
///////////////////////////////////////////////////////////////////////////////
if($leaderDim==true)
	{
		$adresse = $db->query('SELECT DISTINCT Mail FROM Personne JOIN Player ON Player.ID_Personne = Personne.ID JOIN Team ON Team.ID_Player1=Player.ID_Personne OR Team.ID_Player2=Player.ID_Personne JOIN GroupSunday ON GroupSunday.ID_t1 = Team.ID OR GroupSunday.ID_t2 = Team.ID OR GroupSunday.ID_t3 = Team.ID OR GroupSunday.ID_t4 = Team.ID OR GroupSunday.ID_t5 = Team.ID OR GroupSunday.ID_t6 = Team.ID OR GroupSunday.ID_t7 = Team.ID OR GroupSunday.ID_t8 = Team.ID WHERE Player.IsLeader=1');
		$listAdr;
		$i=0;
		while($ladr = $adresse -> fetch_array())
		{
			$listAdr[$i] = $ladr['Mail'];
			$i++;
		}
		$ajout=count($destCoupe);
		$i--;
		for($i;$i!=-1;$i--)
		{
			$destCoupe[$ajout]=$listAdr[$i];
			$ajout++;
		}	
	}
///////////////////////////////////////////////////////////////////////////////
if($npSam==true)
	{
		$adresse = $db->query('SELECT DISTINCT Mail FROM Personne JOIN Player ON Player.ID_Personne = Personne.ID JOIN Team ON Team.ID_Player1=Player.ID_Personne OR Team.ID_Player2=Player.ID_Personne JOIN GroupSaturday ON GroupSaturday.ID_t1 = Team.ID OR GroupSaturday.ID_t2 = Team.ID OR GroupSaturday.ID_t3 = Team.ID OR GroupSaturday.ID_t4 = Team.ID OR GroupSaturday.ID_t5 = Team.ID OR GroupSaturday.ID_t6 = Team.ID OR GroupSaturday.ID_t7 = Team.ID OR GroupSaturday.ID_t8 = Team.ID WHERE Player.Paid=0');
		$listAdr;
		$i=0;
		while($ladr = $adresse -> fetch_array())
		{
			$listAdr[$i] = $ladr['Mail'];
			$i++;
		}
		$ajout=count($destCoupe);
		$i--;
		for($i;$i!=-1;$i--)
		{
			$destCoupe[$ajout]=$listAdr[$i];
			$ajout++;
		}	
	}
///////////////////////////////////////////////////////////////////////////////
if($npDim==true)
	{
		$adresse = $db->query('SELECT DISTINCT Mail FROM Personne JOIN Player ON Player.ID_Personne = Personne.ID JOIN Team ON Team.ID_Player1=Player.ID_Personne OR Team.ID_Player2=Player.ID_Personne JOIN GroupSunday ON GroupSunday.ID_t1 = Team.ID OR GroupSunday.ID_t2 = Team.ID OR GroupSunday.ID_t3 = Team.ID OR GroupSunday.ID_t4 = Team.ID OR GroupSunday.ID_t5 = Team.ID OR GroupSunday.ID_t6 = Team.ID OR GroupSunday.ID_t7 = Team.ID OR GroupSunday.ID_t8 = Team.ID WHERE Player.Paid=0');
		$listAdr;
		$i=0;
		while($ladr = $adresse -> fetch_array())
		{
			$listAdr[$i] = $ladr['Mail'];
			$i++;
		}
		$ajout=count($destCoupe);
		$i--;
		for($i;$i!=-1;$i--)
		{
			$destCoupe[$ajout]=$listAdr[$i];
			$ajout++;
		}	
	}
///////////////////////////////////////////////////////////////////////////////
if($tousSam==true)
	{
		$adresse = $db->query('SELECT DISTINCT Mail FROM Personne JOIN Player ON Player.ID_Personne = Personne.ID JOIN Team ON Team.ID_Player1=Player.ID_Personne OR Team.ID_Player2=Player.ID_Personne JOIN GroupSaturday ON GroupSaturday.ID_t1 = Team.ID OR GroupSaturday.ID_t2 = Team.ID OR GroupSaturday.ID_t3 = Team.ID OR GroupSaturday.ID_t4 = Team.ID OR GroupSaturday.ID_t5 = Team.ID OR GroupSaturday.ID_t6 = Team.ID OR GroupSaturday.ID_t7 = Team.ID OR GroupSaturday.ID_t8 = Team.ID');
		$listAdr;
		$i=0;
		while($ladr = $adresse -> fetch_array())
		{
			$listAdr[$i] = $ladr['Mail'];
			$i++;
		}
		$ajout=count($destCoupe);
		$i--;
		for($i;$i!=-1;$i--)
		{
			$destCoupe[$ajout]=$listAdr[$i];
			$ajout++;
		}	
	}
///////////////////////////////////////////////////////////////////////////////
if($tousDim==true)
	{
		$adresse = $db->query('SELECT DISTINCT Mail FROM Personne JOIN Player ON Player.ID_Personne = Personne.ID JOIN Team ON Team.ID_Player1=Player.ID_Personne OR Team.ID_Player2=Player.ID_Personne JOIN GroupSunday ON GroupSunday.ID_t1 = Team.ID OR GroupSunday.ID_t2 = Team.ID OR GroupSunday.ID_t3 = Team.ID OR GroupSunday.ID_t4 = Team.ID OR GroupSunday.ID_t5 = Team.ID OR GroupSunday.ID_t6 = Team.ID OR GroupSunday.ID_t7 = Team.ID OR GroupSunday.ID_t8 = Team.ID');
		$listAdr;
		$i=0;
		while($ladr = $adresse -> fetch_array())
		{
			$listAdr[$i] = $ladr['Mail'];
			$i++;
		}
		$ajout=count($destCoupe);
		$i--;
		for($i;$i!=-1;$i--)
		{
			$destCoupe[$ajout]=$listAdr[$i];
			$ajout++;
		}	
	}
///////////////////////////////////////////////////////////////////////////////
//On gère les messages														 //
///////////////////////////////////////////////////////////////////////////////
	if($mesLeader==true)
	{
		$message = $db->query('SELECT Value FROM GlobalVariables WHERE Name="Message Leader"');

		$sujet =  $db->query('SELECT Value FROM GlobalVariables WHERE Name="Sujet Leader"');

		$adresse = $db->query('SELECT Value FROM GlobalVariables WHERE Name="Adresse du HQ"');
		
		//récuperer le message du mail 
		$listMessage;
		while($mes = $message->fetch-array())	
		{
			$listMessage[0] = $mes['Value'];
		}
		//récuperer le sujet du mail
		$listSujet;
		while($suj = $sujet->fetch-array())	
		{
			$listSujet[0] = $suj['Value'];
		}
		//Adresse HQ
		$listHQ;
		while($lHQ = $adresse ->fetch-array())
		{
			$listHQ[0] = $lHQ['Value'];
		}
		$sujet.="\n\n";
		$sujet .= $listSujet[0];
		$message.="\n\n";
		$message .= $listMessage[0];
		$message.="\n\nPS : Adresse du quartier general : ".$listHQ[0]."\n\n";	
	}
///////////////////////////////////////////////////////////////////////////////
	if($mesNP==true)
	{
		$message = $db->query('SELECT Value FROM GlobalVariables WHERE Name="Message Non-Payé"');

		$sujet =  $db->query('SELECT Value FROM GlobalVariables WHERE Name="Sujet Non-Payé"');

		$adresse = $db->query('SELECT Value FROM GlobalVariables WHERE Name="Adresse du HQ"');
		
		//récuperer le message du mail 
		$listMessage;
		while($mes = $message->fetch-array())	
		{
			$listMessage[0] = $mes['Value'];
		}
		//récuperer le sujet du mail
		$listSujet;
		while($suj = $sujet->fetch-array())	
		{
			$listSujet[0] = $suj['Value'];
		}
		//Adresse HQ
		$listHQ;
		while($lHQ = $adresse ->fetch-array())
		{
			$listHQ[0] = $lHQ['Value'];
		}
		$sujet.="\n\n";
		$sujet .= $listSujet[0];
		$message.="\n\n";
		$message .= $listMessage[0];
		$message.="\n\nPS : Adresse du quartier general : ".$listHQ[0]."\n\n";	
	}
///////////////////////////////////////////////////////////////////////////////
	if($mesTous==true)
	{
		$message = $db->query('SELECT Value FROM GlobalVariables WHERE Name="Message à tous"');

		$sujet =  $db->query('SELECT Value FROM GlobalVariables WHERE Name="Sujet à tous"');

		$adresse = $db->query('SELECT Value FROM GlobalVariables WHERE Name="Adresse du HQ"');
		
		//récuperer le message du mail 
		$listMessage;
		while($mes = $message->fetch-array())	
		{
			$listMessage[0] = $mes['Value'];
		}
		//récuperer le sujet du mail
		$listSujet;
		while($suj = $sujet->fetch-array())	
		{
			$listSujet[0] = $suj['Value'];
		}
		//Adresse HQ
		$listHQ;
		while($lHQ = $adresse ->fetch-array())
		{
			$listHQ[0] = $lHQ['Value'];
		}
		$sujet.="\n\n";
		$sujet .= $listSujet[0];
		$message.="\n\n";
		$message .= $listMessage[0];
		$message.="\n\nPS : Adresse du quartier general : ".$listHQ[0]."\n\n";	
	}
///////////////////////////////////////////////////////////////////////////////	
	
//Envoi du mail	
sendMail($destCoupe, $message, $sujet);
header('Location: ../staff/pages/contact.php');	
?>
