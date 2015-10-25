<?php
function getDb() {
    $db = mysql_connect("localhost","root","123");
 	if (!$db) {
	 	die("Database connection failed miserably: " . mysql_error());
	 }
 	$db_select = mysql_select_db("SEProjectC",$db);
	 if (!$db_select) {
	 	die("Database selection also failed miserably: " . mysql_error());
	 }
}
    $db = getDb();
	mysql_query("SET character_set_results=utf8", $db);
//	$reponse = mysql_query('INSERT INTO `Personne`(`ID`, `FirstName`, `LastName`, `Title`, `ZIPCode`, `PhoneNumber`, `GSMNumber`, `Address`, `BirthDate`, `Mail`, `CreationDate`, `IsPlayer`, `IsOwner`, `IsStaff`) VALUES ('',[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14])', $db);


	$req = $db->prepare('INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Address, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES(:ID, :FirstName, :LastName, :Title, :ZIPCode, :PhoneNumber, :GSMNumber, :Address, :BirthDate, :Mail, :CreationDate, :IsPlayer, :IsOwner, :IsStaff)');

	$req->execute(array('ID' => '', 'FirstName' => $_POST['InputPrenom'], 'LastName' => $_POST['InputNom'], 'Title' => $_POST['title'], 'ZIPCode' => $_POST['InputCP'], 'PhoneNumber' => $_POST['Fixnum'], 'GSMNumber' => $_POST['Gsmnum'], 'Address' => $_POST['InputLoc'] . "  ," . $_POST['InputAdresse'] . " n°" . $_POST['InputBat'] , 'BirthDate' => $_POST['InputBirth'], 'Mail' => $_POST['InputEmailFirst'], 'CreationDate' => time(), 'IsPlayer' => $_POST['role'], 'IsOwner' => $_POST['role'], 'IsStaff' => 0));


?>
