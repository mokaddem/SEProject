<?php
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


$db = getDb();

mysql_query("SET character_set_results=utf8", $db);
$reponse = mysql_query('SELECT Password FROM Staff WHERE ID=1 ', $db);
$donnes = mysql_fetch_array($reponse);
if ($donnes['Password'] == $_GET['password'] & 1 == $_GET['username']){
    header("Location: index.php");
    die();
}
else{
    header("Location: login.php");
    die();
}

?>
