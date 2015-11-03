<?php
include_once('php/BDD.php');

/*function dbAndPrintPlayer() {
    $db = new BDD();
    $reponse = $db->query('SELECT * FROM Personne ');
    $id=0;
    while ($donnes = $reponse->fetch_array())
    {
        $id=$id+1;
        printListPlayer($donnes);
    }
}*/

function dbAndPrintModal() {
    $db = new BDD();
    $reponse = $db->query('SELECT * FROM Personne WHERE isStaff=1');
    $id=0;
    while ($donnes = $reponse->fetch_array())
    {
        $id=$id+1;
        printModalPlayer($donnes);
    }
}

function getDb() {
    $db = new BDD();
    $reponse = $db->query('SELECT * FROM Personne WHERE isStaff=1');

    return $reponse;
}

/*function printListPlayer($donnes) {
    echo "<tr class=\"odd gradeX\">";
    $id = $donnes['ID'];
    echo "<td data-toggle=\"modal\" data-target=\"#myModal$id\">".$donnes['ID']."</td>";
    echo "<td data-toggle=\"modal\" data-target=\"#myModal$id\">".$donnes['LastName']."</td>";
    echo "<td data-toggle=\"modal\" data-target=\"#myModal$id\">".$donnes['FirstName']."</td>";
    echo "<td class=\"center\" data-toggle=\"modal\" data-target=\"#myModal$id\">".$donnes['BirthDate']."</td>";
    echo "<td class=\"center\" data-toggle=\"modal\" data-target=\"#myModal$id\">".$donnes['CreationDate']."</td>";
    echo "<td><a href=\"./edit-player.php?id=".$donnes['ID']."\" ><i class=\"fa fa-edit fa-fw\"></i></a> <a href=\"php/delete-player.php?id=".$donnes['ID']."\" onclick=\"return confirm('Voulez-vous vraiment suprimer ce participant ?');\"><i class=\"fa fa-trash-o\"></i></a></td>";
    echo "</tr>";
}*/

function printModalPlayer($donnes) {
    $id = $donnes['ID'];
    echo "<div class=\"modal fade\" id=\"myModal$id\" role=\"dialog\">";
    echo    "<div class=\"modal-dialog\">";
    echo        "<!-- Modal content-->";
    echo        "<div class=\"modal-content\">";
    echo            "<div class=\"modal-header\">";
    echo                "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";
    echo                "<h4 class=\"modal-title\">Modal Header</h4>";
    echo            "</div>";
    echo            "<div class=\"modal-body\">";
    echo                "<p>Some text in the modal$id</p>";
    echo            "</div>";
    echo            "<div class=\"modal-footer\">";
    echo                "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>";
    echo            "</div>";
    echo        "</div>";
    echo    "</div>";
    echo "</div>";
}
?>
