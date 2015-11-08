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

    $result = $db->query("SELECT Mail FROM Personne LIMIT 0,10");
    while ($row = $result->fetch_object()){
         $user_arr1[] = $row->Mail;
     }
     $result->close();
     echo json_encode($user_arr1);
?>