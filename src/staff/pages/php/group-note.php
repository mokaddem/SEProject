<?php require_once("./BDD.php");
?>
            <?php
            if (array_key_exists("id", $_GET)) {

                $db = new BDD(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
                $listDonnees = $db->query('SELECT * FROM Personne WHERE ID = '.$_GET['id'].'');
                $donnees = $listDonnees->fetch_array();
            } ?>
             <p>Nom: <?=$donnees['LastName']?></p>
             <p>Preference: <?=$donnees['Note']?></p>