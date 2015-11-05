<?php
include_once('php/BDD.php');

function getExtras() {
    $db = new BDD();
    return $db->query('SELECT * FROM Extras ');
}

function dbAndPrint() {
    $db = new BDD();
    $reponse = $db->query('SELECT * FROM Extras ');
    $id=0;
    while ($donnes =$reponse->fetch_array())
    {
        $id=$id+1;
        printListExtra($donnes);
    }
}

function printListExtra($donnes) {
    echo "<tr class=\"odd gradeX\">";
    echo "<td>".$donnes['ID']."</td>";
    echo "<td>".$donnes['Name']."</td>";
    echo "<td>".$donnes['Price']."</td>";
    echo "<td class=\"center\">"."????"."</td>";
    echo "<td class=\"center\">".$donnes['Description']."</td>";
    echo "<td><a href=\"./edit-extra.php\" ><i class=\"fa fa-edit fa-fw\"></i></a> <a href=\"delete-extra.php\" onclick=\"return confirm('Voulez-vous vraiment suprimer cet extra ?');\"><i class=\"fa fa-trash-o\"></i></a></td>";
    echo "</tr>";
}
?>
