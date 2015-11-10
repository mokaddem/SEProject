<?php
include_once('BDD.php');


if (!array_key_exists('password', $_POST) || !array_key_exists('username', $_POST)) {
	header("location: ../login.php?error=identifiants");
    die();
} else {
    $db = new BDD();

    $reponse = $db->query('SELECT * FROM Staff WHERE Username = "'.$_POST['username'].'"', $db);
    $donnes = $reponse->fetch_array();
     if ($donnes['Password'] == $_POST['password'] && !empty($donnes)){

        session_start();

        $_SESSION["ID"] = $donnes["ID_Personne"];

        $reponse = $db->query('SELECT * FROM Personne WHERE ID = '.$_SESSION["ID"].'', $db);
        $donnes = $reponse->fetch_array();

        $_SESSION["NAME"] = $donnes["FirstName"]." ".$donnes["LastName"];


        header("Location: ../index.php");
        die();
    } else{
        header("Location: ../login.php?error=identifiants");
        die(); 
    }
}
?>
