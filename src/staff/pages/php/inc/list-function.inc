<?php
include_once('php/BDD.php');

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