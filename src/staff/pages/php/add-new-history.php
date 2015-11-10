<?php session_start(); ?>
<?php
	include_once('BDD.php');
//	$db = new BDD();
    
    function addHistory($IdEntite, $TypeEntite, $Action) {

		 $database_host = 'localhost';
		 $database_user = 'root';
		 $database_pass = '123';
		 $database_db = 'SEProjectC';
	   $db = new mysqli($database_host, $database_user, $database_pass, $database_db);
	
	   $req = $db->prepare("INSERT INTO History(id, idPerson, idEntite, typeEntite, action, date, hour) VALUES(?, ?, ?, ?, ?, ?, ?)");

//	$req = $db->prepare('INSERT INTO Personne(ID, FirstName, LastName, Title, ZIPCode, PhoneNumber, GSMNumber, Address, BirthDate, Mail, CreationDate, IsPlayer, IsOwner, IsStaff) VALUES('', "bb", "bb", 1, 1234, 12354, 46351, "glkrzjglz e zfzef", 2015-02-02, "lzeijgze@fmezk.com", 2015-02-03, 1, 0, 0)');

	   $Id	= '';
        $IdPerson = $_SESSION["ID"];
	   $Date = date("Y-m-d");
        $Hour = date("H:m:s");
	
        $req->bind_param("iiissss", $Id, $IdPerson, $IdEntite, $TypeEntite, $Action, $Date, $Hour);

	   $req->execute();
        
    }
	
?>
