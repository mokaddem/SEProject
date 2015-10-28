<?php
include_once('php/BDD.php');
dbAndPrint();

function dbAndPrint() {
    $db = new BDD();
    $reponse = $db->query('SELECT *, Terrain.ID as id FROM `Terrain`, Personne WHERE Personne.ID = Terrain.ID_Personne ');
    while ($donnes = mysql_fetch_array($reponse))
    {
        printListPlayer($donnes);
    }
}

function printListPlayer($donnes) {
    echo "<tr class=\"odd gradeX\">";
    echo "<td>".$donnes['id']."</td>";
    echo "<td>".$donnes['id']."</td>";
    echo "<td>".$donnes['adresse']."</td>";
    echo "<td>".$donnes['surface']."</td>";
    echo "<td>".$donnes['etat']."</td>";
    echo "<td>".$donnes['FirstName'] . " " . $donnes['LastName']."</td>";
    echo "<td>".$donnes['disponibilite']."</td>";
    echo "<td><a href=\"./edit-court.php\" ><i class=\"fa fa-edit fa-fw\"></i></a> <a href=\"delete-court.php\" onclick=\"return confirm('Voulez-vous vraiment suprimer ce participant ?');\"><i class=\"fa fa-trash-o\"></i></a></td>";
    echo "</tr>";
}
?>
