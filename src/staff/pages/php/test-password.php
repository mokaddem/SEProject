<?php
include_once('BDD.php');

$db = new BDD();

$reponse = $db->query('SELECT Password FROM Staff WHERE ID=1 ', $db);
$donnes = mysql_fetch_array($reponse);
if ($donnes['Password'] == $_POST['password'] & 1 == $_POST['username']){
    header("Location: ../index.php");
    die();
}
else{
    header("Location: ../login.php");
    die();
}

?>
