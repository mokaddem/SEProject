<!-- Ajout d'un nouvel extra,
fonction appelée dans le formulaire de extra.php
Redirection vers list.php?type=extra

Mise à jour de l'historique
 -->
 <?php
	include_once('BDD.php');
  require_once('add-new-history.php');

  // Ajout de l'extra
  $db = BDconnect();
	$req = $db->prepare("INSERT INTO Extras(ID, Name, Price, Description) VALUES(?, ?, ?, ?)");

	$ID	 	= '';
	$Name   = utf8_decode($_GET['InputNom']);
	$Price	= $_GET['InputPrice'];
	$Description		= utf8_decode($_GET['InputMessage']);

	$req->bind_param("isis", $ID,$Name,$Price,$Description);

	$req->execute();

    $reponse = $db->query("SELECT * FROM Extras WHERE Name=\"".$Name ."\" AND Description=\"" . $Description ."\"");
    $donnees = $reponse->fetch_array();
    // Mise à jour de l'historique
    addHistory($donnees["ID"], "Extra", "Ajout");

	header("Location: ../list.php?type=extra");

//	$req->execute(array('ID' => '', 'FirstName' => $_GET['InputPrenom2'], 'LastName' => $_GET['InputNom2'], 'Title' => $_GET['title2'], 'ZIPCode' => $_GET['InputCP2'], 'PhoneNumber' => $_GET['Fixnum2'], 'GSMNumber' => $_GET['Gsmnum2'], 'Address' => $_GET['InputLoc2'] . "  ," . $_GET['InputAdresse2'] . " n°" . $_GET['InputBat2'] , 'BirthDate' => $_GET['InputBirth2'], 'Mail' => $_GET['InputEmailFirst2'], 'CreationDate' => time(), 'IsPlayer' => $_GET['role2'], 'IsOwner' => $_GET['role2'], 'IsStaff' => 0));
$reponse->free();


?>
