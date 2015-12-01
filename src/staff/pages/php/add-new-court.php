<!-- Ajout d'un nouveau terrain,
fonction appelée dans le formulaire de court.php
Redirection vers list.php?type=court

Mise à jour de l'historique
 -->
<?php
	include_once('BDD.php');
  include("../../../mail/mail_helper.php");
	// Mise à jour de l'historique
  require_once('add-new-history.php');
	// Ajout du terrain
  $db = BDconnect();
	$req = $db->prepare("INSERT INTO Terrain(ID, adresse, surface, ID_Owner, etat, disponibiliteFrom, disponibiliteTo, CreationDate, type, Note) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


	$ID	 	= '';
	$Adresse	= utf8_decode($_GET['InputAdresse']);
	$Surface	= utf8_decode($_GET['surface']);
	$ID_Owner	= $_GET['sel3'];
	$Etat		= utf8_decode($_GET['sel2']);
	$DispoFrom	= $_GET['InputFrom'];
	$DispoTo	= $_GET['InputTo'];
	$CreationDate	= date("Y-m-d");
	$type		= utf8_decode($_GET['sel1']);
	$Note		= utf8_decode($_GET['InputNote']);

	$req->bind_param("isiissssss", $ID,$Adresse,$Surface,$ID_Owner,$Etat,$DispoFrom,$DispoTo,$CreationDate,$type,$Note);

	$req->execute();

    $reponse = $db->query('SELECT * FROM Terrain WHERE "'.$Adresse.'" = Adresse AND '.$ID_Owner.' = ID_Owner');
    $donnees = $reponse->fetch_array();
    addHistory($donnees["ID"], "Terrain", "Ajout");

	header("Location: ../list.php?type=court");

	$req = $db->prepare("SELECT Mail FROM Owner JOIN Personne ON Owner.ID_Personne = Personne.ID WHERE ID = $ID_Owner");
        sendMail($req[0],"Bonjour,\n\n\t Nous vous informons que l'inscription de votre court pour le tournoi de tennis 'Charles de Lorraine' a bien été prise en compte.\n\n\t Nous vous remercions et nous vous tiendrons au courant en ce qui concerne l'utilisation de celui-ci lors du tournoi.\n\n PS:Vous pouvez à tout moment nous joindre via le formulaire de contact se trouvant sur notre site.\n\nBien à vous,\n\nle Staff du tournoi 'Charles de Lorraine' ","Enregistrement de votre court");
?>
