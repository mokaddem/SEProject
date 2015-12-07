<!-- Ajout d'une nouvelle variable globale,
fonction appelée dans le formulaire de varGlobal.php
Redirection vers list.php?type=varGlob

Mise à jour de l'historique
 -->
 <?php
	include_once('BDD.php');
    require_once('add-new-history.php');

    // Ajout de l'extra
    $db = BDconnect();
	$req = $db->prepare("INSERT INTO GlobalVariables(Name,Value,Displayable) VALUES(?,?,?)");

	$Name   = utf8_decode($_GET['nom']);
	$Description = utf8_decode($_GET['value']);
	$di=1;

	$req->bind_param("ssi",$Name,$Description,$di);

	$req->execute();

    $reponse = $db->query("SELECT * FROM GlobalVariables WHERE Name=\"".$Name ."\" AND Value=\"" . $Description ."\"");
    $donnees = $reponse->fetch_array();
    // Mise à jour de l'historique
    addHistory($donnees["Name"], "Variable Globale", "Ajout");


//	$req->execute(array('ID' => '', 'FirstName' => $_GET['InputPrenom2'], 'LastName' => $_GET['InputNom2'], 'Title' => $_GET['title2'], 'ZIPCode' => $_GET['InputCP2'], 'PhoneNumber' => $_GET['Fixnum2'], 'GSMNumber' => $_GET['Gsmnum2'], 'Address' => $_GET['InputLoc2'] . "  ," . $_GET['InputAdresse2'] . " n°" . $_GET['InputBat2'] , 'BirthDate' => $_GET['InputBirth2'], 'Mail' => $_GET['InputEmailFirst2'], 'CreationDate' => time(), 'IsPlayer' => $_GET['role2'], 'IsOwner' => $_GET['role2'], 'IsStaff' => 0));
$reponse->free();

header("Location: ../listVarGlobal.php");


?>
