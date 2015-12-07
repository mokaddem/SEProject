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
               
            case "varGlobal":
                return getVarGlobal();

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
            return array("ID", "Nom", "Prix (€)", "Description","Nombre de personne", "Action");
           
        case "varGlobal":
            return array("Titre","Message");

        case "owner":
            return array("ID", "Nom", "Prénom", "Créé le", "Action");
        case "team":
//            return getTeams();
            break;
        case "staff":
            return array("ID", "Nom", "Prénom", "Né(e) le", "Créé le", "Action");
        case "category":
            return array("ID", "Tranche d'âge", "Désignation", "Action");

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
            
        case "varGlobal":
            return array("Name", "Value"); 

        case "owner":
            return array("ID_O", "LastName", "FirstName", "CreationDate");

        case "team":
//            return getTeams();
            break;

        case "staff":
            return array("ID", "LastName", "FirstName", "BirthDate", "CreationDate");
        case "category":
            return array("ID", "Age", "Designation");

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
        case "varGlobal":
            return "Variables Globales";
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
    return $db->query('SELECT *, Terrain.ID as ID, Terrain.Note as Note, Owner.ID as O_id FROM `Terrain`, `Personne`, `Owner` WHERE Owner.ID = Terrain.ID_Owner AND Personne.ID = Owner.ID_Personne');
}

function getExtras() {
    $db = BDconnect();
    return $db->query('SELECT Extras.*, NULL as nbr FROM Extras');
}

function getVarGlobal() {
    $db = BDconnect();
    return $db->query('SELECT GlobalVariables.* FROM GlobalVariables');
}

function getHistories() {
    $db = BDconnect(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!

    return $db->query('SELECT * FROM History ORDER BY ID DESC');

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
//    return $db->query('SELECT *, Owner.ID_Personne as ID, Owner.ID as ID_O FROM Personne, Owner WHERE isOwner=1');//     GROUP BY Owner.ID');
    return $db->query('SELECT *, Owner.ID_Personne as ID, Owner.ID as ID_O FROM Owner, Personne WHERE Owner.ID_Personne = Personne.ID');//     GROUP BY Owner.ID');
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
