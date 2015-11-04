<?php
include_once('php/BDD.php');

function getCourts() {
    $db = new BDD();
    return $db->query('SELECT *, Terrain.ID as T_id, Owner.ID as O_id FROM `Terrain`, `Personne`, `Owner` WHERE Owner.ID = Terrain.ID_Owner AND Personne.ID = Owner.ID_Personne');
}

function dbAndPrint() {
    $db = new BDD();
    $reponse = $db->query('SELECT *, Terrain.ID as T_id, Owner.ID as O_id FROM `Terrain`, `Personne`, `Owner` WHERE Owner.ID = Terrain.ID_Owner AND Personne.ID = Owner.ID_Personne');
    while ($donnes = $reponse->fetch_array())
    {
        printListPlayer($donnes);
    }
}

function printListPlayer($donnes) {
    echo "<tr class=\"odd gradeX\">";
    echo "<td>".$donnes['ID_Owner']."</td>";
    echo "<td>".$donnes['adresse']."</td>";
    echo "<td>".$donnes['surface']."</td>";
    echo "<td>".$donnes['FirstName'] . " " . $donnes['LastName']."</td>";
    echo "<td>".$donnes['etat']."</td>";
    echo "<td>".$donnes['Type']."</td>";
    echo "<td>".$donnes['disponibiliteFrom']."</td>";
    echo "<td>".$donnes['CreationDate']."</td>";
    echo "<td>".$donnes['Note']."</td>";
    echo "<td><a href=\"./edit-court.php?O_id=".$donnes['O_id']."&type=".$donnes['Type']."&etat=".$donnes['etat']."&surface=".$donnes['surface']."&adresse=".$donnes['adresse']."&note=".$donnes['Note']."\" ><i class=\"fa fa-edit fa-fw\"></i></a> <a href=\"php/delete-court.php?id=".$donnes['T_id']."\" onclick=\"return confirm('Voulez-vous vraiment suprimer ce terrain ?');\"><i class=\"fa fa-trash-o\"></i></a></td>";
    echo "</tr>";
}
?>
