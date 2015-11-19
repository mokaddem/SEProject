<?php
include_once('php/BDD.php');


function dbAndPrint() {
    $db = BDconnect();
    $reponse1 = $db->query('SELECT * FROM Extras');
    
    while ($donnes1 = $reponse1->fetch_array())
    {

        $reponse2 = $db->query("SELECT count(ID) as nbr FROM PersonneExtra WHERE Extra_ID=".$donnes1['ID']);

	    $donnes2 = $reponse2->fetch_array();

        printListExtras($donnes1, $donnes2);
    }
}


function printListExtras($donnes1,$donnes2) {
    echo "<tr class=\"odd gradeX\">";
    $id = $donnes1['ID'];
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\" data-url=\"./show-extras.php?id=$id\">".utf8_encode($donnes1['ID'])."</td>";
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\" data-url=\"./show-extras.php?id=$id\">".utf8_encode($donnes1['Name'])."</td>";
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\" data-url=\"./show-extras.php?id=$id\">".utf8_encode($donnes1['Price'])."</td>";
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\" data-url=\"./show-extras.php?id=$id\">".utf8_encode($donnes1['Description'])."</td>";
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\" data-url=\"./show-extras.php?id=$id\">".utf8_encode($donnes2['nbr'])."</td>";
    echo "<td><a href=\"./edit-extras.php?id=".$donnes1['ID']."\"><i class=\"fa fa-edit fa-fw\"></i></a> <a href=\"./php/delete-extras.php?id=".$donnes1['ID']."\" onclick=\"return confirm('Voulez-vous vraiment supprimer cette entrée ?');\"><i class=\"fa fa-trash-o\"></i></a></td>";
    echo "</tr>";
}
?>
