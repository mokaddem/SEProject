<?php require_once("./php/inc/show-function.inc");

if ($_GET["type"]=="extra") { ?>
  <div class="modal-dialog">
<?php } elseif ($_GET["type"]=="court") { ?>
  <div class="modal-dialog modal-lg">
<?php } else { ?>
  <div class="modal-dialog modal-sm">
<?php } ?>

<!-- Page de détail qui apparait lorsque l'on clique sur un participants/matchs/propriétaires/catégories/staff dans la liste -->
        <!-- Modal content-->
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
      ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Informations
                <?php if ($_GET['type'] == 'court') {
                  // Pour les teams et terrains
                    ?>
                  <a class="btn btn-default pull-right" target="_blank" href="./php/print-court.php?id=<?=$donnees['ID']?>"><i class="fa fa-print"></i></a>
                <?php } ?>
                </h4>
            </div>
            <div class="modal-body">
                <div class="container">
            <?php


            if (!empty($donnees)) {
                if ($_GET['type'] == "varGlobal"){
                    $donnees['ID'] = $donnees['id']; // Because global variables don't have any ID.
                }
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
              <?php }
            if ($_GET['type'] == "player"){ ?>
              <p><b>Classement :</b> <?php if ($player["Ranking"] == "") { echo "NC"; } else { echo $player["Ranking"]; } ?></p>
            <?php } ?>
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
