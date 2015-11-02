<?php
include_once('php/BDD.php');
dbAndPrint();

function dbAndPrint() {
    $db = new BDD();
    $reponse1 = $db->query('SELECT Team.ID, FirstName as F, LastName as L, Team.ID_Player1 as id1, Team.ID_Player2 as id2 FROM Team, Personne WHERE Personne.ID = Team.ID_Player1 ');
    $reponse2 = $db->query('SELECT Team.ID, FirstName as F, LastName as L FROM Team, Personne WHERE Personne.ID = Team.ID_Player2 ');
    while ($donnes1 = $reponse1->fetch_array())
    {
	$donnes2 = $reponse2->fetch_array();
        printListTeam($donnes1, $donnes2);
    }
}

function printListTeam($donnes1,$donnes2) {
    echo "<tr class=\"odd gradeX\">";
    echo "<td>".$donnes1['ID']."</td>";
    echo "<td>".$donnes1['F'] . " " . $donnes1['L']."</td>";
    echo "<td>".$donnes2['F'] . " " . $donnes2['L']."</td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td><a href=\"./edit-team.php?id=".$donnes1['ID']."&id1=".$donnes1['id1']."&id2=".$donnes1['id2']."\" ><i class=\"fa fa-edit fa-fw\"></i></a> <a href=\"php/delete-team.php?id=".$donnes1['ID']."\" onclick=\"return confirm('Voulez-vous vraiment suprimer ce participant ?');\"><i class=\"fa fa-trash-o\"></i></a></td>";
    echo "</tr>";
}
?>
