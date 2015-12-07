<!-- Ajout d'une nouvelle catégorie,
fonction appelée dans le formulaire de category.php
Redirection vers list.php?type=category

Mise à jour de l'historique
 -->
<?php
	include_once('BDD.php');
  require_once('add-new-history.php');

	// Ajout de la catégorie
	$db = BDconnect();

	$req = $db->prepare("INSERT INTO Categorie(ID, `Age`, Designation) VALUES(?, ?, ?)");

	$ID	 	= '';
	$Age   = $_GET['De']." - ".$_GET['A'];
//	$Age	=  $_GET['Age'];
	$Designation	= $_GET['Designation'];

	$req->bind_param("iss", $ID, $Age, utf8_decode($Designation));

	$req->execute();

	$reponse = $db->query("SELECT * FROM Categorie WHERE Age = \"$Age\" AND Designation=\"$Designation\"");
	$donnees = $reponse->fetch_array();
	$ID_inserted = $donnees['ID'];

	// Mise à jour de l'historique
	addHistory( $donnees["ID"], utf8_decode("Catégorie"), "Ajout");

	$reponse->free();
	header("Location: ../list.php?type=category");
?>
