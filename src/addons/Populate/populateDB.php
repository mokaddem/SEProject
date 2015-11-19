<?php

include('../../staff/pages/php/BDD.php');

function PopulateDB(){
    $db = BDconnect();
    $i = 0;
    for ($i = 0; $i < 160; $i++) {
        $req = $db->prepare("INSERT INTO Personne(Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(1,'joueur$1','name$1','bxl','1000','rue de la pluie',$1,'665666','545535','1985-1-1','mailbidon$1@mailbidons.com','2015-11-11','',1,0,0)");
        $req->execute();
        $req = $db->prepare("INSERT INTO Player(ID_Personne,IsLeader,Paid,AlreadyPart) VALUES($db->insert_id,0,1,1)");
        $req->execute();
        $IDPlayers[$i] = $db->insert_id;
    }

    for ($i = 0;$i < 10; $i++) {
        $req = $db->prepare("INSERT INTO Personne(Title, FirstName, LastName, Ville, ZIPCode, Rue, Number, PhoneNumber, GSMNumber, BirthDate, Mail, CreationDate, Note, IsPlayer, IsOwner, IsStaff) VALUES(1,'owner$1','name$1','bxl','1000','rue de la pluie',$1,'665666','545535','1985-1-1','mailbidon$1@mailbidons.com','2015-11-11','',0,1,0)");
        $req->execute();
        $req = $db->prepare("INSERT INTO Owner(ID_Personne,ID_Staff) VALUES($db->insert_id, 1)");
        $req->execute();
        $IDOwner[$i] = $db->insert_id;
    }

    for ($i = 0; $i < 50; $i++) {
        $req = $db->prepare("INSERT INTO Team(ID_Player1, ID_Player2, ID_Cat, NbWinMatch) VALUES($IDPlayers[($i*2)-1], $IDPlayers[$i*2], 1,0)");
        $req->execute();
    }

    for ($i = 50; $i < 65; $i++) {
        $req = $db->prepare("INSERT INTO Team(ID_Player1, ID_Player2, ID_Cat, NbWinMatch) VALUES($IDPlayers[($i*2)-1], $IDPlayers[$i*2], 2,0)");
        $req->execute();
    }

    for ($i = 65; $i < 80; $i++) {
        $req = $db->prepare("INSERT INTO Team(ID_Player1, ID_Player2, ID_Cat, NbWinMatch) VALUES($IDPlayers[($i*2)-1], $IDPlayers[$i*2], 3,0)");
        $req->execute();
    }
}