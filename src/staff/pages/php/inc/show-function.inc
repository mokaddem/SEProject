<?php
include_once('php/BDD.php');

function getDonnees($get, $id) {
        switch ($get) {
            case "match":
                return getMatch($id);
                break;

            case "player":
                return getPlayer($id);

            case "court":
                return getCourt($id);

            case "oldCourt":
                return getOldCourt($id);

            case "extra":
                return getExtra($id);

            case "owner":
                return getOwner($id);

            case "oldOwner":
                return getOldOwner($id);

            case "team":
                //return getTeam($id);
            break;

            case "staff":
                return getStaff($id);
            case "category":
                return getCategory($id);

            case "varGlobal":
                return getVarGlobal($id);

        }
}

function getTitreTable($get) {
    switch ($get) {
        case "match":
           return array("ID", "Première équipe", "Seconde équipe", "score 1", "score 2", "ID Terrain");
            break;
        case "player":
            return array("ID", "Nom", "Prénom", "E-mail", "Né(e) le", "Rue", "Ville", "ZIPCode", "PhoneNumber", "GSMNumber", "Chef?", "A payé", "Inscrit(e) le");

        case "court":
            return array("ID", "Adresse", "Surface", "Propriétaire", "Etat", "Type", "Disponible", "Jusqu'au", "Crée le", "Note");

        case "oldCourt":
            return array("ID", "Adresse", "Surface", "Propriétaire", "Etat", "Type", "Disponible", "Jusqu'au", "Crée le", "Note");

        case "extra":
            return array("ID", "Nom", "Prix", "Description");

        case "owner":
            return array("ID", "Nom", "Prénom", "E-mail", "Rue", "Ville", "ZIPCode", "PhoneNumber", "GSMNumber", "Créé le");

        case "oldOwner":
            return array("ID", "Nom", "Prénom", "E-mail", "Rue", "Ville", "ZIPCode", "PhoneNumber", "GSMNumber", "Créé le");

        case "team":
            return array("ID", "Nom", "Prénom", "Action");
            break;

        case "staff":
            return array("ID", "Nom", "Prénom", "Resp. catégorie","Né(e) le", "Créé le", "Action");

        case "category":
            return array("ID", "Tranche d'âge", "Désignation", "Action");

        case "varGlobal":
            return array("ID", "Titre", "Valeur", "Action");

    }
}

function getParam($get) {
    switch ($get) {
        case "match":
            return array("ID", "ID_Equipe1", "ID_Equipe2", "score1", "score2", "ID_Terrain");
            break;

        case "player":
            return array("ID", "LastName", "FirstName", "Mail", "BirthDate", "Rue", "Ville", "ZIPCode", "PhoneNumber", "GSMNumber", "IsLeader", "Paid", "CreationDate");

        case "court":
            return array("ID", "adresse", "surface", "ID_Owner", "etat", "Type", "disponibiliteFrom", "disponibiliteTo", "CreationDate", "Note");

        case "oldCourt":
            return array("ID", "adresse", "surface", "ID_Owner", "etat", "Type", "disponibiliteFrom", "disponibiliteTo", "CreationDate", "Note");

        case "extra":
            return array("ID", "Name", "Price", "Description"); // Name à modif (4eme param)

        case "owner":
            return array("ID", "LastName", "FirstName", "Mail", "Rue", "Ville", "ZIPCode", "PhoneNumber", "GSMNumber", "CreationDate");

        case "oldOwner":
            return array("ID", "LastName", "FirstName", "Mail", "Rue", "Ville", "ZIPCode", "PhoneNumber", "GSMNumber", "CreationDate");

        case "team":
            return array("ID", "L", "F", "ID_Cat");
            break;

        case "staff":
            return array("ID", "LastName", "FirstName", "ID_Cat", "BirthDate", "CreationDate");

        case "category":
            return array("ID", "Age", "Designation");

        case "varGlobal":
            return array("ID", "Name", "Value", "Displayable");

    }
}

function getTitre($get) {
    switch ($get) {
        case "match":
            return "matchs";
            break;
        case "player":
            return "participants";

        case "court":
            return "terrains";
        case "oldCourt":
            return "terrains antérieurs";
        case "extra":
            return "extras";
        case "owner":
            return "propriétaires";
        case "oldOwner":
            return "propriétaires antérieurs";
        case "team":
            return "équipes";
            break;
        case "staff":
            return "staffeurs";
        case "category":
            return "catégories";
        case "varGlobal":
            return "variables globales";

    }
}


function getCourt($id) {
    $db = BDconnect();
    return $db->query('SELECT * FROM `Terrain` WHERE ID = '.$id.'');
}

function getOldCourt($id) {
    $db = BDconnect();
    return $db->query('SELECT * FROM `OldTerrain` WHERE ID = '.$id.'');
}

function getExtra($id) {
    $db = BDconnect();
    return $db->query('SELECT * FROM Extras WHERE ID = '.$id.'');
}

function getHistories() {
    $db = BDconnect(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM History ORDER BY ID DESC');
}

function getHistory($id) {
    $db = BDconnect(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM History WHERE id = '.$id.'');
}

function getMatch($id) {
    $db = BDconnect();
    return $db->query('SELECT * FROM `Match` WHERE ID = '.$id.'');
}

function getCategory($id) {
    $db = BDconnect();
    return $db->query('SELECT * FROM `Categorie` WHERE ID = '.$id.'');
}

function getOwner($id) {
    $db = BDconnect();
    return $db->query('SELECT * FROM Personne WHERE isOwner=1 and ID = '.$id.'');
}

function getOldOwner($id) {
    $db = BDconnect();
    return $db->query('SELECT * FROM Personne WHERE isOwner=1 and ID = '.$id.'');
}

function getPlayer($id) {
    $db = BDconnect(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM Personne, Player WHERE Personne.ID = '.$id.'');
}

function getRanking($id) {
    $db = BDconnect(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM Player WHERE '.$id.' = ID_Personne');
}

function getStaff($id) {
    $db = BDconnect();
    $reponse = $db->query('SELECT * FROM Personne, Staff WHERE isStaff=1 and Personne.ID = '.$id.'');

    return $reponse;
}


function getTeam1() {
    $db = BDconnect();
    return $db->query('SELECT Team.ID, FirstName as F, LastName as L, Team.ID_Player1 as id1, Team.ID_Player2 as id2 FROM Team, Personne WHERE Personne.ID = Team.ID_Player1 ');
}

function getTeam2($id) {
    $db = BDconnect();
    return $db->query('SELECT Team.ID, FirstName as F, LastName as L FROM Team, Personne WHERE Personne.ID = '.$id.'');
}

function getVarGlobal($id){
    $db = BDconnect();
    //$test = $db->query('SELECT * FROM GlobalVariables WHERE `Name`=\''.utf8_encode($name).'\'');
    $test = $db->query('SELECT * FROM GlobalVariables WHERE `ID`='.$id);
    return $test;
}

?>
