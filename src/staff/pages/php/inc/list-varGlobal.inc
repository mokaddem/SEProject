<?php
include_once('php/BDD.php');


function dbAndPrint() {
    $db = BDconnect();
    $reponse1 = $db->query('SELECT * FROM GlobalVariables');

    while ($donnes1 = $reponse1->fetch_array())
    {

        //$reponse2 = $db->query("SELECT count(Name) as nbr FROM GlobalVariables WHERE GlobalVariables=".$donnes1['Name']);

	    //$donnes2 = $reponse2->fetch_array();

        printListExtras($donnes1);
    }
    // printListExtras($donnes1);
}


function printListExtras($donnes1) {
    echo "<tr class=\"odd gradeX\">";
    $id = $donnes1['Name'];
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\" data-url=\"./show.php?id=$id&type=varGlobal\">".utf8_encode($donnes1['Name'])."</td>";
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\" data-url=\"./show.php?id=$id&type=varGlobal\">".utf8_encode($donnes1['Value'])."</td>";
    echo "<td><a href=\"./inc/edit-varGlobal.php?Name=".$donnes1['Name']."\"><i class=\"fa fa-edit fa-fw\"></i></a> <a href=\"./php/delete-varGlobal.php?Name=".$donnes1['Name']."\" onclick=\"return confirm('Voulez-vous vraiment supprimer cette entrée ?');\"><i class=\"fa fa-trash-o\"></i></a></td>";
    echo "</tr>";
}
?>
