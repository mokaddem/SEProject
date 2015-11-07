<?php
include_once('php/BDD.php');

function getDonnees($get) {
        switch ($get) {
            case "match":
                return getMatchs();
                break;
            case "player":
                return getPlayers();
                break;
            case "court":
                return getCourts();
                break;
            case "extra":
                return getExtras();
                break;
            case "owner":
                return getOwners();
                break;
            case "team":
                return getTeams();
                break;
            case "staff":
                return getStaff();
                break;
        }
}

function getTitre($get) {
    switch ($get) {
        case "match":
            return getMatchs();
            break;
        case "player":
            return array("ID", "Nom", "Prénom", "Né(e) le", "Créé le", "Action");
            break;
        case "court":
            return array("ID", "Adresse", "Surface", "Propriétaire", "Etat", "Type", "Disponible", "Crée le", "Note", "Action");
            break;
        case "extra":
            return array("ID", "Nom", "Prix", "Nombre de personnes", "Description");
            break;
        case "owner":
            return array("ID", "Nom", "Prénom", "Créé le", "Action");
            break;
        case "team":
            return getTeams();
            break;
        case "staff":
            return getStaff();
            break;
    }
}

function getParam($get) {
    switch ($get) {
        case "match":
            return getMatchs();
            break;
        case "player":
            return array("ID", "LastName", "FirstName", "BirthDate", "CreationDate");
            break;
        case "court":
            return array("ID", "adresse", "surface", "FirstName", "etat", "Type", "disponibiliteFrom", "CreationDate", "Note");
            break;
        case "extra":
            return array("ID", "Name", "Price", "Name", "Description"); // Name à modif (4eme param)
            break;
        case "owner":
            return array("ID", "LastName", "FirstName", "CreationDate");
            break;
        case "team":
            return getTeams();
            break;
        case "staff":
            return getStaff();
            break;
    }
}

function getCourts() {
    $db = new BDD();
    return $db->query('SELECT *, Terrain.ID as T_id, Owner.ID as O_id FROM `Terrain`, `Personne`, `Owner` WHERE Owner.ID = Terrain.ID_Owner AND Personne.ID = Owner.ID_Personne');
}

function getExtras() {
    $db = new BDD();
    return $db->query('SELECT * FROM Extras ');
}

function getHistories() {
    $db = new BDD(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM History');
}

function getHistory($id) {
    $db = new BDD(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM History WHERE id = '.$id.'');
}

function getMatchs() {
    $db = new BDD();
    return $db->query('SELECT * FROM `Match`');
}

function getOwners() {
    $db = new BDD();
    return $db->query('SELECT * FROM Personne WHERE isOwner=1');
}

function getPlayers() {
    $db = new BDD(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM Personne WHERE isPlayer=1');
}

function getPlayer($id) {
    $db = new BDD(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM Personne WHERE ID = '.$id.'');
}

?>