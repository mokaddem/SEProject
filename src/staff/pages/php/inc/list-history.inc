<?php
include_once('php/BDD.php');

function getHistories() {
    $db = new BDD(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM History');
}

function getHistory($id) {
    $db = new BDD(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    return $db->query('SELECT * FROM History WHERE id = '.$id.'');
}

function getDb() {
    $db = new BDD();
    $reponse = $db->query('SELECT * FROM History WHERE id = 1');

    return $reponse;
}