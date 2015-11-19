<?php
include_once('php/BDD.php');

function getDonnees($get) {
        switch ($get) {
            case "match":
                return getMatchs();
                break;

            case "player":
                return getPlayers();

            case "court":
                return getCourts();

            case "extra":
                return getExtras();

            case "owner":
                return getOwners();

            case "team":
                //return getTeams();
            break;

            case "staff":
                return getStaffs();
            case "category":
                return getCategories();

        }
}

function getTitreTable($get) {
    switch ($get) {
        case "match":
           return array("ID", "Première équipe", "Seconde équipe", "Date du match", "Heure du match", "Action");
            break;
        case "player":
            return array("ID", "Nom", "Prénom", "Né(e) le", "Créé le", "Action");

        case "court":
            return array("ID", "Adresse", "Surface", "Propriétaire", "Etat", "Type", "Disponible", "Jusqu'au", "Crée le", "Note", "Action");

        case "extra":
            return array("ID", "Nom", "Nombre de personne" , "Prix (€)", "Description", "Action");

        case "owner":
            return array("ID", "Nom", "Prénom", "Créé le", "Action");
        case "team":
//            return getTeams();
            break;
        case "staff":
            return array("ID", "Nom", "Prénom", "Né(e) le", "Créé le", "Action");
        case "category":
            return array("ID", "Année", "Désignation", "Action");

    }
}

function getParam($get) {
    switch ($get) {
        case "match":
            return array("ID", "ID_Equipe1", "ID_Equipe2", "date", "hour");
            break;

        case "player":
            return array("ID", "LastName", "FirstName", "BirthDate", "CreationDate");

        case "court":
            return array("ID", "adresse", "surface", "FirstName", "etat", "Type", "disponibiliteFrom", "disponibiliteTo","CreationDate", "Note");

        case "extra":
            return array("ID", "Name", "nbr", "Price", "Description"); // Name à modif (4eme param)

        case "owner":
            return array("ID", "LastName", "FirstName", "CreationDate");

        case "team":
//            return getTeams();
            break;

        case "staff":
            return array("ID", "LastName", "FirstName", "BirthDate", "CreationDate");
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

function getCourts() {
    $db = BDconnect();
    
    $d = $db->query('SELECT * FROM `Owner` WHERE ID_Personne = '.$_SESSION['ID'].'');
    $res = $d->fetch_array();
    
    return $db->query('SELECT *, Terrain.ID as ID, Terrain.Note as Note, Owner.ID as O_id FROM `Terrain`, `Personne`, `Owner` WHERE '.$res['ID'].' = Terrain.ID_Owner AND Personne.ID = '.$_SESSION['ID'].' GROUP BY Terrain.ID');

}

function getExtras() {
    $db = BDconnect();
    return $db->query('SELECT Extras.*, count(PersonneExtra.Extra_ID) as nbr FROM Extras INNER JOIN PersonneExtra ON Extras.ID=PersonneExtra.Extra_ID');
}

function getHistories() {
    $db = BDconnect(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!

    return $db->query('SELECT * FROM History');

}

function getStaffName($idPerson) {
    $db = BDconnect(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    
    $rep = $db->query('SELECT * FROM Personne WHERE '.$idPerson.' = ID');
    $donnees = $rep->fetch_array();
    
    $res = $donnees['FirstName'] . " " . $donnees['LastName'];
    
    return $res;
}



function getHistory($id) {
    $db = BDconnect(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM History WHERE id = '.$id.'');
}

function getMatchs() {
    $db = BDconnect();
    return $db->query('SELECT * FROM `Match`');
}

function getCategories() {
    $db = BDconnect();
    return $db->query('SELECT * FROM `Categorie`');
}


function getOwners() {
    $db = BDconnect();
    return $db->query('SELECT * FROM Personne WHERE isOwner=1');
}

function getPlayers() {
    $db = BDconnect(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM Personne WHERE isPlayer=1');
}

function getPlayer($id) {
    $db = BDconnect(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM Personne WHERE ID = '.$id.'');
}

function getStaffs() {
    $db = BDconnect();
    $reponse = $db->query('SELECT * FROM Personne WHERE isStaff=1');

    return $reponse;
}

?>