<?php
include_once('php/BDD.php');

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
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\">".$donnes['ID']."</td>";
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\">".$donnes['LastName']."</td>";
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\">".$donnes['FirstName']."</td>";
    echo "<td class=\"center\" data-toggle=\"modal\" data-target=\"#myModal\">".$donnes['BirthDate']."</td>";
    echo "<td class=\"center\" data-toggle=\"modal\" data-target=\"#myModal\">".$donnes['CreationDate']."</td>";
    echo "<td><a href=\"./edit-player.php?id=".$donnes['ID']."\" ><i class=\"fa fa-edit fa-fw\"></i></a> <a href=\"php/delete-player.php?id=".$donnes['ID']."\" onclick=\"return confirm('Voulez-vous vraiment suprimer ce participant ?');\"><i class=\"fa fa-trash-o\"></i></a></td>";
    echo "</tr>";
}
?>
