<?php
include_once('php/BDD.php');

$db = new BDD();
$reponse = $db->query('SELECT * FROM Personne pers, Player play WHERE '. $_GET['id']. ' = pers.ID');
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
                    <p>Nom:
                        <?=$donnes['LastName']?>
                    </p>
                    <p>Prénom:
                        <?=$donnes['FirstName']?>
                    </p>
                    <p>E-mail:
                        <?=$donnes['Mail']?>
                    </p>
                    <p>Née le:
                        <?=$donnes['BirthDate']?>
                    </p>
                    <p>Adresse:
                        <?=$donnes['Rue']?>
                    </p>
                    <p>Ville:
                        <?=$donnes['Ville']?>
                    </p>
                    <p>Code Postal:
                        <?=$donnes['ZIPCode']?>
                    </p>
                    <p>Tel:
                        <?=$donnes['PhoneNumber']?>
                    </p>
                    <p>Mobile:
                        <?=$donnes['GSMNumber']?>
                    </p>

                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" href="php/delete-owner.php?id=<?=$donnes['ID']?>" onclick="return confirm('Voulez-vous vraiment supprimer ce propriétaire ?');">Supprimer</a>
                <a class="btn btn-success" href="edit-owner.php?id=<?=$donnes['ID']?>">Modifier</a>
                <button type="button" class="btn btn-info" data-dismiss="modal">Retour</button>
            </div>
        </div>
    </div>
    <?php $reponse->free(); ?>
