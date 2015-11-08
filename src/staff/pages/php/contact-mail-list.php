<?php
include_once('BDD.php');

    $db = new BDD();
/*    $reponse = $db->query('SELECT * FROM Personne');
    $donnes = $reponse->fetch_array();

    foreach ($reponse as $d) {
             $user_arr2[] = $d;
    }
     $reponse->close();
     echo json_encode($user_arr2);*/
     if (array_key_exists('query', $_GET)) {

    $result = $db->query("SELECT ID, Mail FROM Personne where Personne.Mail like '%{$_GET['query']}%'");
    while ($row = $result->fetch_object()){
         $user_arr[] = $row->ID;
         $user_arr1[] = $row->Mail;
     }
     $result->close();
     echo json_encode($user_arr1);
   }
?>
