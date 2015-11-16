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

            case "extra":
                return getExtra($id);

            case "owner":
                return getOwner($id);

            case "team":
                //return getTeam($id);
            break;

            case "staff":
                return getStaff($id);
            case "category":
                return getCategory($id);

        }
}

function getTitreTable($get) {
    switch ($get) {
        case "match":
           return array("ID", "Première équipe", "Seconde équipe", "score 1", "score 2", "ID Terrain");
            break;
        case "player":
            return array("ID", "Nom", "Prénom", "E-mail", "Né(e) le", "Rue", "Ville", "ZIPCode", "PhoneNumber", "GSMNumber", "Chef?", "A payé", "Créé le");

        case "court":
            return array("ID", "Adresse", "Surface", "Propriétaire", "Etat", "Type", "Disponible", "Jusqu'au", "Crée le", "Note");

        case "extra":
            return array("ID", "Nom", "Prix", "Nombre de personnes", "Description", "Action");

        case "owner":
        return array("ID", "Nom", "Prénom", "E-mail", "Rue", "Ville", "ZIPCode", "PhoneNumber", "GSMNumber", "Créé le");

        case "team":
            return array("ID", "Nom", "Prénom", "Action");
            break;

        case "staff":
            return array("ID", "Nom", "Prénom", "Resp. cat","Né(e) le", "Créé le", "Action");
        case "category":
            return array("ID", "Année", "Désignation", "Action");

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

        case "extra":
            return array("ID", "Name", "Price", "Name", "Description"); // Name à modif (4eme param)

        case "owner":
        return array("ID", "LastName", "FirstName", "Mail", "Rue", "Ville", "ZIPCode", "PhoneNumber", "GSMNumber", "CreationDate");

        case "team":
            return array("ID", "L", "F", "ID_Cat");
            break;

        case "staff":
            return array("ID", "LastName", "FirstName", "ID_Cat", "BirthDate", "CreationDate");
        case "category":
            return array("ID", "Year", "Designation");

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
        case "extra":
            return "extras";
        case "owner":
            return "propriétaires";
        case "team":
            return "équipes";
            break;
        case "staff":
            return "staffeurs";
        case "category":
            return "catégories";

    }
}


function getCourt($id) {
    $db = new BDD();
    return $db->query('SELECT * FROM `Terrain` WHERE ID = '.$id.'');
}

function getExtra($id) {
    $db = new BDD();
    return $db->query('SELECT * FROM Extras WHERE ID = '.$id.'');
}

function getHistories() {
    $db = new BDD(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM History');
}

function getHistory($id) {
    $db = new BDD(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM History WHERE id = '.$id.'');
}

function getMatch($id) {
    $db = new BDD();
    return $db->query('SELECT * FROM `Match` WHERE ID = '.$id.'');
}

function getCategory($id) {
    $db = new BDD();
    return $db->query('SELECT * FROM `Categorie` WHERE ID = '.$id.'');
}

function getOwner($id) {
    $db = new BDD();
    return $db->query('SELECT * FROM Personne WHERE isOwner=1 and ID = '.$id.'');
}

function getPlayer($id) {
    $db = new BDD(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM Personne, Player WHERE Personne.ID = '.$id.'');
}

function getStaff($id) {
    $db = new BDD();
    $reponse = $db->query('SELECT * FROM Personne, Staff WHERE isStaff=1 and Personne.ID = '.$id.'');

    return $reponse;
}


function getTeam1() {
    $db = new BDD();
    return $db->query('SELECT Team.ID, FirstName as F, LastName as L, Team.ID_Player1 as id1, Team.ID_Player2 as id2 FROM Team, Personne WHERE Personne.ID = Team.ID_Player1 ');
}

function getTeam2($id) {
    $db = new BDD();
    return $db->query('SELECT Team.ID, FirstName as F, LastName as L FROM Team, Personne WHERE Personne.ID = '.$id.'');
}

?>

