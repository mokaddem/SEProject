<?php
include_once('php/BDD.php');

$db = new BDD();
$reponse = $db->query('SELECT * FROM Terrain ter WHERE '. $_GET['id']. ' = ter.ID');
$donnes = $reponse->fetch_array();
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
                    <p>Adresse:
                        <?=$donnes['adresse']?>
                    </p>
                    <p>Surface:
                        <?=$donnes['surface']?>
                    </p>
                    <p>Etat:
                        <?=$donnes['etat']?>
                    </p>
                    <p>Type:
                        <?=$donnes['Type']?>
                    </p>
                    <p>disponibiliteFrom:
                        <?=$donnes['disponibiliteFrom']?>
                    </p>
                    <p>disponibiliteTo:
                        <?=$donnes['disponibiliteTo']?>
                    </p>
                    <p>Note:
                        <?=$donnes['Note']?>
                    </p>
                    <p>Creation:
                        <?=$donnes['CreationDate']?>
                    </p>

                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" href="php/delete-player.php?id=<?=$donnes['ID']?>" onclick="return confirm('Voulez-vous vraiment supprimer ce terrain ?');">Supprimer</a>
                <a class="btn btn-success" href="edit-player.php?id=<?=$donnes['ID']?>">Modifier</a>
                <button type="button" class="btn btn-info" data-dismiss="modal">Retour</button>
            </div>
        </div>
    </div>
    <?php $reponse->free(); ?>
