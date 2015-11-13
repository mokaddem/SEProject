<?php
include_once('php/BDD.php');

/*
function dbAndPrint() {
    $db = new BDD();
    $reponse1 = $db->query('SELECT Team.ID, FirstName as F, LastName as L, Team.ID_Player1 as id1, Team.ID_Player2 as id2, Team.ID_Cat as ID_Cat FROM Team, Personne WHERE Personne.ID = Team.ID_Player1 ');
    while ($donnes1 = $reponse1->fetch_array())
    {
      $reponse2 = $db->query('SELECT Team.ID, FirstName as F, LastName as L FROM Team, Personne WHERE Personne.ID = '.$donnes1['id2'].'');

	     $donnes2 = $reponse2->fetch_array();
        printListTeam($donnes1, $donnes2);
    }
}
*/

function getTeam1() {
    $db = new BDD();
    return $db->query('SELECT Team.ID, FirstName as F, LastName as L, Team.ID_Player1 as id1, Team.ID_Player2 as id2 FROM Team, Personne WHERE Personne.ID = Team.ID_Player1 ');
}

function getTeam2($id) {
  $db = new BDD();
  return $db->query('SELECT Team.ID, FirstName as F, LastName as L FROM Team, Personne WHERE Personne.ID = '.$id.'');
}

function printListMatch($id) {
    
    include_once('php/BDD.php');
            
    $db = new BDD();
    $reponse = $db->query('SELECT * FROM `Match` WHERE '.$id.' = ID');
    $donnees = $reponse->fetch_array();

    $t = $db->query('SELECT * FROM `Team` WHERE '.$donnees['ID_Equipe1'].' = ID');
    $t1 = $t->fetch_array();

    $t1p = $db->query('SELECT * FROM `Personne` WHERE '.$t1['ID_Player1'].' = ID');
    $t1p1 = $t1p->fetch_array();

    $t1p = $db->query('SELECT * FROM `Personne` WHERE '.$t1['ID_Player2'].' = ID');
    $t1p2 = $t1p->fetch_array();

    $t1final = $t1p1['FirstName']." ".$t1p1['LastName']." & ".$t1p2['FirstName']." ".$t1p2['LastName'];

    $t = $db->query('SELECT * FROM `Team` WHERE '.$donnees['ID_Equipe2'].' = ID');
    $t2 = $t->fetch_array();

    $t2p = $db->query('SELECT * FROM `Personne` WHERE '.$t2['ID_Player1'].' = ID');
    $t2p1 = $t2p->fetch_array();

    $t2p = $db->query('SELECT * FROM `Personne` WHERE '.$t2['ID_Player2'].' = ID');
    $t2p2 = $t2p->fetch_array();

    $t2final = $t2p1['FirstName']." ".$t2p1['LastName']." & ".$t2p2['FirstName']." ".$t2p2['LastName'];

    $t = $db->query('SELECT * FROM `Terrain` WHERE '.$donnees['ID_Terrain'].' = ID');
    $ter = $t->fetch_array();

    $terfinal = $ter['adresse'] . " - " . $ter['etat'];

    echo "<tr class=\"odd gradeX\">";

    echo "<td data-toggle=\"modal\" data-target=\"#myModal\" data-url=\"./show-match.php?id=$id\">".$donnees['ID']."</td>";
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\" data-url=\"./show-match.php?id=$id\">".$t1final."</td>";
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\" data-url=\"./show-match.php?id=$id\">".$t2final."</td>";
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\" data-url=\"./show-match.php?id=$id\">".$donnees['date']."</td>";
    echo "<td data-toggle=\"modal\" data-target=\"#myModal\" data-url=\"./show-match.php?id=$id\">".$donnees['hour']."</td>";

    echo "<td><a href=\"./edit-match.php?id=".$donnees['ID']."\" ><i class=\"fa fa-edit fa-fw\"></i></a> <a href=\"./php/delete-match.php?id=".$donnees['ID']."\" onclick=\"return confirm('Voulez-vous vraiment supprimer cette entrée ?');\"><i class=\"fa fa-trash-o\"></i></a> <a target=\"_blank\" href=\"./php/print.php?id=".$donnees['ID']."\"><i class=\"fa fa-print\"></i></a></td>";
    echo "</tr>";
}
?>
