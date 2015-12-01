<?php require_once("./php/inc/show-function.inc");
require_once("./php/inc/list-team.inc");
?>
      <div class="modal-dialog modal-sm">
<!-- Page de détail qui apparait lorsque l'on clique sur une équipe dans la liste -->
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

                $db = BDconnect();
                $reponse = $db->query('SELECT * FROM `Team` WHERE '. $_GET['id']. ' = ID');
                $donnees = $reponse->fetch_array();

                $reponse = $db->query('SELECT * FROM `Personne` WHERE '. $donnees['ID_Player1']. ' = ID');
                $p1 = $reponse->fetch_array();

                $reponse = $db->query('SELECT * FROM `Personne` WHERE '. $donnees['ID_Player2']. ' = ID');
                $p2 = $reponse->fetch_array();

                $finalp1 = utf8_encode($p1['FirstName']). " " .utf8_encode($p1['LastName']);
                $finalp2 = utf8_encode($p2['FirstName']). " " .utf8_encode($p2['LastName']);

                $rcat = $db->query('SELECT * FROM Categorie WHERE ID = '.$donnees['ID_Cat'].'');
                $cat = $rcat->fetch_array();
                $catFinal = utf8_encode($cat['Designation'])." ".$cat['Year'];
                ?>
                    <p><b>ID </b> : <?=$donnees['ID']?></p>
                    <p><b>Catégorie</b> : <?=utf8_encode($catFinal)?></p>
                    <p><b>Joueur 1</b> : <?=utf8_encode($finalp1)?> (<?=$donnees['ID_Player1']?>)</p>
                    <p><b>Joueur 2</b> : <?=utf8_encode($finalp2)?> (<?=$donnees['ID_Player2']?>)</p>


                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger btn-outline" href="php/delete-team.php?id=<?=$donnees['ID']?>" onclick="return confirm('Voulez-vous vraiment supprimer cette équipe ?');">Supprimer</a>
                <a class="btn btn-success btn-outline" href="./edit-team.php?id=<?=$donnees['ID']?>">Modifier</a>
                <button type="button" class="btn btn-info btn-outline" data-dismiss="modal">Retour</button>
            </div>

        </div>
    </div>
    <?php $reponse->free(); $rcat->free(); ?>
