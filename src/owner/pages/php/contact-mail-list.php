<?php
include_once('BDD.php');

    $db = BDconnect();
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
   } else if (array_key_exists('list', $_GET)) {
         //$result = $db->query("SELECT ID, Mail FROM Personne where Personne.Mail like '%{$_GET['query']}%'");
         if ($_GET['list'] == "part") {

             $result = $db->query("SELECT * FROM Personne where isPlayer = 1 ");
             while ($row = $result->fetch_object()){
                 $user_arr1[] = $row->Mail;
             }
             $result->close();
             echo json_encode($user_arr1);
         } else if ($_GET['list'] == "prop") {
             $result = $db->query("SELECT * FROM Personne where isOwner = 1");
             while ($row = $result->fetch_object()){
                 $user_arr1[] = $row->Mail;
             }
             $result->close();
             echo json_encode($user_arr1);
         }
     }
?>