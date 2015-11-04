<?php
include_once('php/BDD.php');

function getMatchs() {
    $db = new BDD();
    return $db->query('SELECT * FROM `Match`');
}

function dbAndPrint() {
    $db = new BDD();
    $reponse = $db->query('SELECT `id` , `ID_Equipe1` , `ID_Equipe2` , `date` FROM `Match` ');
    while ($donnes = $reponse->fetch_array())
    {
        printListPlayer($donnes);
    }
}

function printListPlayer($donnes) {
    echo "<tr class=\"odd gradeX\">";
    echo "<td>".$donnes['id']."</td>";
    echo "<td>".$donnes['ID_Equipe1']."</td>";
    echo "<td>".$donnes['ID_Equipe2']."</td>";
    echo "<td>".$donnes['date']."</td>";
    echo "<td>1</td>";
    echo "<td>2</td>";
    echo "<td>3</td>";
    echo "<td><a href=\"./edit-player.php\" ><i class=\"fa fa-edit fa-fw\"></i></a> <a href=\"delete-player.php\" onclick=\"return confirm('Voulez-vous vraiment suprimer ce participant ?');\"><i class=\"fa fa-trash-o\"></i></a></td>";
    echo "</tr>";
}
?>