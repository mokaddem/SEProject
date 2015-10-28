<?php
    $db = new BDD();

//	$reponse = mysql_query('INSERT INTO `Personne`(`ID`, `FirstName`, `LastName`, `Title`, `ZIPCode`, `PhoneNumber`, `GSMNumber`, `Address`, `BirthDate`, `Mail`, `CreationDate`, `IsPlayer`, `IsOwner`, `IsStaff`) VALUES ('',[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14])', $db);

	$req = $db->prepare('INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Address, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES(:ID, :FirstName, :LastName, :Title, :ZIPCode, :PhoneNumber, :GSMNumber, :Address, :BirthDate, :Mail, :CreationDate, :IsPlayer, :IsOwner, :IsStaff)');

	$req->execute(array('ID' => '', 'FirstName' => $_GET['InputPrenom1'], 'LastName' => $_GET['InputNom1'], 'Title' => $_GET['title1'], 'ZIPCode' => $_GET['InputCP1'], 'PhoneNumber' => $_GET['InputFixe1'], 'GSMNumber' => $_GET['InputMob1'], 'Address' => $_GET['InputLoc1'] . "  ," . $_GET['InputAdresse1'] . " n°" . $_GET['InputBat1'] , 'BirthDate' => $_GET['InputBirth1'], 'Mail' => $_GET['InputEmailFirst1'], 'CreationDate' => time(), 'IsPlayer' => 1, 'IsOwner' => 0, 'IsStaff' => 0));

//	$req->execute(array('ID' => '', 'FirstName' => $_GET['InputPrenom2'], 'LastName' => $_GET['InputNom2'], 'Title' => $_GET['title2'], 'ZIPCode' => $_GET['InputCP2'], 'PhoneNumber' => $_GET['Fixnum2'], 'GSMNumber' => $_GET['Gsmnum2'], 'Address' => $_GET['InputLoc2'] . "  ," . $_GET['InputAdresse2'] . " n°" . $_GET['InputBat2'] , 'BirthDate' => $_GET['InputBirth2'], 'Mail' => $_GET['InputEmailFirst2'], 'CreationDate' => time(), 'IsPlayer' => $_GET['role2'], 'IsOwner' => $_GET['role2'], 'IsStaff' => 0));


?>
