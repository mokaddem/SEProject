<?php
include_once('php/BDD.php');

function getHistories() {
    $db = new BDD(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    $rep = $db->query('SELECT * FROM History');
    
    $rep2 = $db->query('SELECT * FROM Personne WHERE '.$rep['id'].' = ID');
    
    $rep['personName'] = $rep2['FirstName'] . "-" . $rep2['LastName'];
    
    return $rep;
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