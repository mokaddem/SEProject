<?php
include_once('php/BDD.php');

function getMatchs() {
    $db = new BDD();
    return $db->query('SELECT * FROM `Match`');
}
?>