<?php
include_once('BDD.php');

$db = new BDD();

$reponse = $db->query('SELECT * FROM Staff WHERE Username = "'.$_POST['username'].'"', $db);
$donnes = $reponse->fetch_array();

if ($donnes['Password'] == $_POST['password']){
    session_start();
    $_SESSION["ID"] = $donnes["ID_Personne"];
    
    header("Location: ../index.php");
    die();
}
else{
    header("Location: ../login.php");
    die(); 
}

?>
