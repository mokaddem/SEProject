<?php require_once("./php/inc/show-function.inc");
require_once("./php/inc/list-team.inc");
?>
      <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Informations</h4>
            </div>
            <div class="modal-body">
                <div class="container">
            <?php
                $ID = $_GET['id'];

                include_once('php/BDD.php');

                $db = new BDD();
                $reponse = $db->query('SELECT * FROM `Team` WHERE '. $_GET['id']. ' = ID');
                $donnees = $reponse->fetch_array();

                $reponse = $db->query('SELECT * FROM `Personne` WHERE '. $donnees['ID_Player1']. ' = ID');
                $p1 = $reponse->fetch_array();

                $reponse = $db->query('SELECT * FROM `Personne` WHERE '. $donnees['ID_Player2']. ' = ID');
                $p2 = $reponse->fetch_array();

                $finalp1 = $p1['FirstName']. " " .$p1['LastName'];
                $finalp2 = $p2['FirstName']. " " .$p2['LastName'];

//            if (array_key_exists("id", $_GET)) {
//                $listDonnees = getTeam2();
//                var_dump($donnees);
//
//                $listDonnees2 = getTeam2($donnees['id1']);
//                $listDonnees2 = getTeam2($donnees['id2']);
//                $donnees2 = $listDonnees2->fetch_array();
//                //$donnees  = getTeam1($_GET['id']);
//                $titreDonnees = getTitreTable("team");
//                $paramDonnees = getParam("team");
//
//                $titre = getTitre("team");
//            }?>
                    <p><b>Joueur 1</b> : <?=$finalp1?></p>
                    <p><b>Joueur 2</b> : <?=$finalp2?></p>
                    <p><b>Catégorie</b> : <?=$donnees['ID_Cat']?></p>


                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger btn-outline" href="php/delete-team.php?id=<?=$donnees['ID']?>" onclick="return confirm('Voulez-vous vraiment supprimer ce participant ?');">Supprimer</a>
                <a class="btn btn-success btn-outline" href="./edit-team.php?id=<?=$donnees['ID']?>">Modifier</a>
                <button type="button" class="btn btn-info btn-outline" data-dismiss="modal">Retour</button>
            </div>

        </div>
    </div>
