<?php
include_once('php/BDD.php');

function getCourts() {
    $db = new BDD();
    return $db->query('SELECT *, Terrain.ID as T_id, Owner.ID as O_id FROM `Terrain`, `Personne`, `Owner` WHERE Owner.ID = Terrain.ID_Owner AND Personne.ID = Owner.ID_Personne');
}
?>
