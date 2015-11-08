<?php
require_once('php/inc/list-function.inc');
$db = new BDD();

//$reponse = $db->query('SELECT * FROM `Match` match WHERE '. $_GET['id']. ' = match.ID');
$reponse = $db->query('SELECT * FROM `Match` WHERE '. $_GET['id']. '=ID');
$donnes = $reponse->fetch_array();
//$donnes = $db->query('SELECT * FROM Match');
?>
<div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Informations</h4>
            </div>
            <div class="modal-body">
                <div class="container">

                    <p>Joueur 1:
                        <?=$donnes['ID_Equipe1']?>
                    </p>
                    <p>Joueur 2:
                        <?=$donnes['ID_Equipe2']?>
                    </p>
                    <p>Score 1:
                        <?=$donnes['score1']?>
                    </p>
                    <p>Score 2:
                        <?=$donnes['score2']?>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" href="php/delete-match.php?id=<?=$donnes['id']?>" onclick="return confirm('Voulez-vous vraiment supprimer ce participant ?');">Supprimer</a>
                <a class="btn btn-success" href="edit-match.php?id=<?=$donnes['id']?>">Modifier</a>
                <button type="button" class="btn btn-info" data-dismiss="modal">Retour</button>
            </div>
        </div>
    </div>
    <?php $reponse->free(); ?>
