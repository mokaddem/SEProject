<?php
include_once('php/BDD.php');
dbAndPrint();

function dbAndPrint() {
    $db = new BDD();
    $reponse = $db->query('SELECT *, Terrain.ID as T_id FROM `Terrain`, Personne, Owner WHERE Owner.ID = Terrain.ID_Owner AND Personne.ID = Owner.ID_Personne');
    while ($donnes = $reponse->fetch_array())
    {
        printListPlayer($donnes);
    }
}

function printListPlayer($donnes) {
    echo "<tr class=\"odd gradeX\">";
    echo "<td>".$donnes['T_id']."</td>";
    echo "<td>".$donnes['adresse']."</td>";
    echo "<td>".$donnes['surface']."</td>";
    echo "<td>".$donnes['FirstName'] . " " . $donnes['LastName']."</td>";
    echo "<td>".$donnes['etat']."</td>";
    echo "<td>".$donnes['Type']."</td>";
    echo "<td>".$donnes['disponibiliteFrom']."</td>";
    echo "<td>".$donnes['CreationDate']."</td>";
    echo "<td>".$donnes['Note']."</td>";
    echo "<td><a href=\"./edit-court.php\" ><i class=\"fa fa-edit fa-fw\"></i></a> <a href=\"delete-court.php\" onclick=\"return confirm('Voulez-vous vraiment suprimer ce participant ?');\"><i class=\"fa fa-trash-o\"></i></a></td>";
    echo "</tr>";
}
?>
