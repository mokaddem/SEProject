<?php
 //$db = mysql_connect("localhost","root","123"); 
	$db = new PDO('mysql:host=localhost;dbname=SEProjectC;charset=utf8', 'root', '123');  
	if (!$db) {
	 	die("Database connection failed miserably: " . mysql_error());
	 }
// 	$db_select = mysql_select_db("SEProjectC",$db);
//	 if (!$db_select) {
//	 	die("Databas	e selection also failed miserably: " . mysql_error());
//	 }	 
//	mysql_query("SET character_set_results=utf8", $db);
//	$reponse = mysql_query('INSERT INTO `Personne`(`ID`, `FirstName`, `LastName`, `Title`, `ZIPCode`, `PhoneNumber`, `GSMNumber`, `Address`, `BirthDate`, `Mail`, `CreationDate`, `IsPlayer`, `IsOwner`, `IsStaff`) VALUES ('',[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14])', $db);


	$req = $db->prepare('INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Address, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES(:ID, :FirstName, :LastName, :Title, :ZIPCode, :PhoneNumber, :GSMNumber, :Address, :BirthDate, :Mail, :CreationDate, :IsPlayer, :IsOwner, :IsStaff)');

	$req->execute(array(
'ID' => '', 
'FirstName' => $_GET['InputPrenom'], 
'LastName' => $_GET['InputNom'], 
'Title' => $_GET['title'], 
'ZIPCode' => $_GET['InputCP'], 
'PhoneNumber' => $_GET['Fixnum'], 
'GSMNumber' => $_GET['Gsmnum'], 
'Address' => $_GET['InputLoc'] . "  ," . $_GET['InputAdresse'] . " n°" . $_GET['InputBat'] , 
'BirthDate' => $_GET['InputDate'], 
'Mail' => $_GET['InputEmailFirst'], 
'CreationDate' => time(), 
'IsPlayer' => $_GET['role'], 
'IsOwner' => $_GET['role'], 
'IsStaff' => 0));


?>
