<?php
dbAndPrint();

function dbAndPrint() {
    $db = getDb();
    mysql_query("SET character_set_results=utf8", $db);
    $reponse = mysql_query('SELECT * FROM Personne ', $db);
    $id=0;
    while ($donnes = mysql_fetch_array($reponse))
    {
        $id=$id+1;
        printListPlayer($donnes);
    }
}

function getDb() {
    $db = mysql_connect("localhost","root","123"); 
     if (!$db) {
        die("Database connection failed miserably: " . mysql_error());
     }
    $db_select = mysql_select_db("SEProjectC",$db);
     if (!$db_select) {
        die("Database selection also failed miserably: " . mysql_error());
     }	 
    return $db;
}

function printListPlayer($donnes) {
    echo "<tr class=\"odd gradeX\">";
    echo "<td>.$donnes['ID'].</td>";
    echo "<td>.$donnes['LastName'].</td>";
    echo "<td>.$donnes['FirstName'].</td>";
    echo "<td class=\"center\">.$donnes['BirthDate'].</td>";
    echo "<td class=\"center\">.$donnes['CreationDate'].</td>";
    echo "<td><i class=\"fa fa-edit fa-fw\"></i> <i class=\"fa fa-trash-o\"></i></td>";
    echo "</tr>";
}
?>