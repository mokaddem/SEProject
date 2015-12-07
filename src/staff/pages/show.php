<?php require_once("./php/inc/show-function.inc");

if ($_GET["type"]=="extra") { ?>
  <div class="modal-dialog">
<?php } else { ?>
  <div class="modal-dialog modal-sm">
<?php } ?>

<!-- Page de détail qui apparait lorsque l'on clique sur un participants/matchs/propriétaires/catégories/staff dans la liste -->
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

                if ($_GET["type"] == "player") {
                  $player = getRanking($donnees['ID']);
                  $player = $player->fetch_array();
                }
            }

            if (!empty($donnees)) {
              $next = $titreDonnees[0];
              foreach ($paramDonnees as $param){ ?>
                    <p><b><?=$next?>:</b>
              <?php if ($donnees[$param] == "0") {
                        echo 'Non';
                      } else { ?>
                        <?=utf8_encode($donnees[$param])?>
                  <?php  }?>
                    </p>
                    <?php $next = next($titreDonnees);?>
<<<<<<< HEAD
              <?php } ?>
              <?php if ($_GET["type"] == "player") { ?>
                <p><b>Classement :</b> <?php if ($player["Ranking"] == "") { echo "NC"; } else { echo $player["Ranking"]; } ?></p>
              <?php } ?>
=======
              <?php }
            if ($_GET['type'] == "player"){ ?>
              <p><b>Classement :</b> <?php if ($player["Ranking"] == "") { echo "NC"; } else { echo $player["Ranking"]; } ?></p>
            <?php } ?>
>>>>>>> d30c9e18011e001a58f4d3bddb9d0defa601ec2d
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger btn-outline" href="php/delete-<?=$_GET['type']?>.php?id=<?=$donnees['ID']?>" onclick="return confirm('Voulez-vous vraiment supprimerQ ?');">Supprimer</a>
                <a class="btn btn-success btn-outline" href="./edit-<?=$_GET['type']?>.php?id=<?=$donnees['ID']?>">Modifier</a>
                <button type="button" class="btn btn-info btn-outline" data-dismiss="modal">Retour</button>
            </div>
            <?php } ?>

        </div>
    </div>
