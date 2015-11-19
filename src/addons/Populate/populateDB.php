<?php




function PopulateDB(){
    include_once("./BDD.php");
    
    $db = BDconnect();
    
    $i = 0;
    for ($i = 0; $i < 160; $i++) {
        
        /*$req = $db->prepare("INSERT INTO Personne(Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(1,'joueur".$1."','name".$1."','bxl','1000','rue de la pluie',".$1.",'665666','545535','1985-1-1','mailbidon".$1."@mailbidons.com','2015-11-11','',1,0,0)");
        $req->execute();*/
        
        $req = $db->prepare("INSERT INTO Personne(ID, Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $ID1	 	= '';
        $FirstName1	= utf8_decode("JoueurP".$i);
        $LastName1	= utf8_decode("NameP".$i);
        $Title1	    = 1;
        $ZIPCode1	= 1000;
        $PhoneNumber1	= 600000000;
        $GSMNumber1	= 600000000;
        $Ville1		= utf8_decode("Ville".$i);
        $Rue1		= utf8_decode("Rue".$i);
        $Number1		= 1;
        $BirthDate1	= "1985-1-1";
        $Mail1		= $i."address@mail.com";
        $CreationDate = date('Y-m-d');
        $Note1 = utf8_decode("R.A.S.");
        $IsPlayer1	= 1;
        $IsOwner1	= 0;
        $IsStaff1	= 0;

        $req->bind_param("iisssisiiissssiii", $ID1, $Title1, $FirstName1, $LastName1, $Ville1, $ZIPCode1, $Rue1, $Number1, $PhoneNumber1, $GSMNumber1, $BirthDate1, $Mail1, $CreationDate, $Note1, $IsPlayer1, $IsOwner1, $IsStaff1);

        $req->execute();

        $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName1.'" = FirstName AND "'.$LastName1.'" = LastName');
    $donnees1 = $reponse->fetch_array();
        
        $req = $db->prepare("INSERT INTO Player(ID_Personne,IsLeader,Paid,AlreadyPart) VALUES(".$donnees1['ID'].",0,1,1)");
        $req->execute();
        
        
        $IDPlayers[$i] = $db->insert_id;
    }

    for ($i = 0;$i < 10; $i++) {
        $req = $db->prepare("INSERT INTO Personne(ID, Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $ID1	 	= '';
        $FirstName1	= utf8_decode("JoueurO".$i);
        $LastName1	= utf8_decode("NameO".$i);
        $Title1	    = 1;
        $ZIPCode1	= 1000;
        $PhoneNumber1	= 600000000;
        $GSMNumber1	= 600000000;
        $Ville1		= utf8_decode("Ville".$i);
        $Rue1		= utf8_decode("Rue".$i);
        $Number1		= 1;
        $BirthDate1	= "1985-1-1";
        $Mail1		= $i."address@mail.com";
        $CreationDate = date('Y-m-d');
        $Note1 = utf8_decode("R.A.S.");
        $IsPlayer1	= 1;
        $IsOwner1	= 0;
        $IsStaff1	= 0;

        $req->bind_param("iisssisiiissssiii", $ID1, $Title1, $FirstName1, $LastName1, $Ville1, $ZIPCode1, $Rue1, $Number1, $PhoneNumber1, $GSMNumber1, $BirthDate1, $Mail1, $CreationDate, $Note1, $IsPlayer1, $IsOwner1, $IsStaff1);

        $req->execute();

        $reponse = $db->query('SELECT * FROM Personne WHERE "'.$FirstName1.'" = FirstName AND "'.$LastName1.'" = LastName');
    $donnees1 = $reponse->fetch_array();
        
        $req = $db->prepare("INSERT INTO Owner(ID_Personne, ID_Staff) VALUES(".$donnees1['ID'].",7)");
        $req->execute();
        
        $IDOwner[$i] = $db->insert_id;
    }

    for ($i = 1; $i < 50; $i++) {
        $req = $db->prepare("INSERT INTO Team(ID_Player1, ID_Player2, ID_Cat, NbWinMatch) VALUES(".$IDPlayers[($i*2)-1].", ".$IDPlayers[$i*2].", 1,0)");
        $req->execute();
    }

    for ($i = 50; $i < 65; $i++) {
        $req = $db->prepare("INSERT INTO Team(ID_Player1, ID_Player2, ID_Cat, NbWinMatch) VALUES(".$IDPlayers[($i*2)-1].", ".$IDPlayers[$i*2].", 2,0)");
        $req->execute();
    }

    for ($i = 65; $i < 80; $i++) {
        $req = $db->prepare("INSERT INTO Team(ID_Player1, ID_Player2, ID_Cat, NbWinMatch) VALUES(".$IDPlayers[($i*2)-1].", ".$IDPlayers[$i*2].", 3,0)");
        $req->execute();
    }
}