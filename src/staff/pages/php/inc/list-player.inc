<?php
include_once('php/BDD.php');

function getPlayers() {
    $db = new BDD(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM Personne WHERE isPlayer=1');
}

function getPlayer($id) {
    $db = new BDD(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM Personne WHERE ID = '.$id.'');
}

function getDb() {
    $db = new BDD();
    $reponse = $db->query('SELECT * FROM Personne WHERE isPlayer=1');

    return $reponse;
}