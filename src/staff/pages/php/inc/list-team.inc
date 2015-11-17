<?php
include_once('php/BDD.php');


function dbAndPrint() {
    $db = BDconnect();
    $reponse1 = $db->query('SELECT Team.ID, FirstName as F, LastName as L, Team.ID_Player1 as id1, Team.ID_Player2 as id2, Team.ID_Cat as ID_Cat FROM Team, Personne WHERE Personne.ID = Team.ID_Player1 ');
    
    while ($donnes1 = $reponse1->fetch_array())
    {
      $reponse2 = $db->query('SELECT Team.ID, FirstName as F, LastName as L FROM Team, Personne WHERE Personne.ID = '.$donnes1['id2'].'');

	   $donnes2 = $reponse2->fetch_array();

        $reponse3 = $db->query('SELECT * FROM Categorie WHERE ID = '.$donnes1['ID_Cat'].'');

	   $donnes2 = $reponse2->fetch_array();
        $cat = $reponse3->fetch_array();
        $catFinal = $cat['Designation']." ".$cat['Year'];

        printListTeam($donnes1, $donnes2, $catFinal);
    }
}


function printListTeam($donnes1,$donnes2, $catFinal) {
    echo "<tr class=\"odd gradeX\">";
    $id = $donnes1['ID'];
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\" data-url=\"./show-team.php?id=$id\">".$donnes1['ID']."</td>";
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\" data-url=\"./show-team.php?id=$id\">".$donnes1['F'] . " " . $donnes1['L']."</td>";
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\" data-url=\"./show-team.php?id=$id\">".$donnes2['F'] . " " . $donnes2['L']."</td>";
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\" data-url=\"./show-team.php?id=$id\">".$catFinal."</td>";
    echo "<td><a href=\"./edit-team.php?id=".$donnes1['ID']."\"><i class=\"fa fa-edit fa-fw\"></i></a> <a href=\"./php/delete-team.php?id=".$donnes1['ID']."\" onclick=\"return confirm('Voulez-vous vraiment supprimer cette entrée ?');\"><i class=\"fa fa-trash-o\"></i></a></td>";
    echo "</tr>";
}
?>
