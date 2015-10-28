<?php
include_once('php/BDD.php');
dbAndPrint();

function dbAndPrint() {
    $db = new BDD();
    $reponse = $db->query('SELECT * FROM Personne ');
    $id=0;
    while ($donnes = $reponse->fetch_array())
    {
        $id=$id+1;
        printListPlayer($donnes);
    }
}

function printListPlayer($donnes) {
    echo "<tr class=\"odd gradeX\">";
    echo "<td>".$donnes['ID']."</td>";
    echo "<td>".$donnes['LastName']."</td>";
    echo "<td>".$donnes['FirstName']."</td>";
    echo "<td class=\"center\">".$donnes['BirthDate']."</td>";
    echo "<td class=\"center\">".$donnes['CreationDate']."</td>";
    echo "<td><a href=\"./edit-player.php?id=".$donnes['ID']."\" ><i class=\"fa fa-edit fa-fw\"></i></a> <a href=\"delete-player.php?id=".$donnes['ID']."\" onclick=\"return confirm('Voulez-vous vraiment suprimer ce participant ?');\"><i class=\"fa fa-trash-o\"></i></a></td>";
    echo "</tr>";
}
?>
