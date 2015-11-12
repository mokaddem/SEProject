<?php require_once("./php/inc/show-function.inc");
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
            if (array_key_exists("type", $_GET) && array_key_exists("id", $_GET)) {
                $listDonnees = getDonnees($_GET["type"], $_GET['id']);
                $donnees = $listDonnees->fetch_array();
                $titreDonnees = getTitreTable($_GET["type"]);
                $paramDonnees = getParam($_GET["type"]);

                $titre = getTitre($_GET["type"]);
            }

            if (!empty($donnees)) {
              $next = $titreDonnees[0];
              foreach ($paramDonnees as $param){ ?>
                    <p><b><?=$next?>:</b>
                        <?=$donnees[$param]?>
                    </p>
                    <?php $next = next($titreDonnees);?>
              <?php } ?>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger btn-outline" href="php/delete-<?=$_GET['type']?>.php?id=<?=$donnees['ID']?>" onclick="return confirm('Voulez-vous vraiment supprimer ?');">Supprimer</a>
                <a class="btn btn-success btn-outline" href="./edit-<?=$_GET['type']?>.php?id=<?=$donnees['ID']?>">Modifier</a>
                <button type="button" class="btn btn-info btn-outline" data-dismiss="modal">Retour</button>
            </div>
            <?php } ?>

        </div>
    </div>
