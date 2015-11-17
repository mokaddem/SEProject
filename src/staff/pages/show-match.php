<?php require_once("./php/inc/show-function.inc");
require_once("./php/inc/list-team.inc");
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
            <?php
                $id = $_GET['id'];

            $db = BDconnect();
            $reponse = $db->query('SELECT * FROM `Match` WHERE '.$id.' = ID');
            $donnees = $reponse->fetch_array();

            $t = $db->query('SELECT * FROM `Team` WHERE '.$donnees['ID_Equipe1'].' = ID');
            $t1 = $t->fetch_array();

            $t1p = $db->query('SELECT * FROM `Personne` WHERE '.$t1['ID_Player1'].' = ID');
            $t1p1 = $t1p->fetch_array();

            $t1p = $db->query('SELECT * FROM `Personne` WHERE '.$t1['ID_Player2'].' = ID');
            $t1p2 = $t1p->fetch_array();

            $t1final = $t1p1['FirstName']." ".$t1p1['LastName']." & ".$t1p2['FirstName']." ".$t1p2['LastName'];

            $t = $db->query('SELECT * FROM `Team` WHERE '.$donnees['ID_Equipe2'].' = ID');
            $t2 = $t->fetch_array();

            $t2p = $db->query('SELECT * FROM `Personne` WHERE '.$t2['ID_Player1'].' = ID');
            $t2p1 = $t2p->fetch_array();

            $t2p = $db->query('SELECT * FROM `Personne` WHERE '.$t2['ID_Player2'].' = ID');
            $t2p2 = $t2p->fetch_array();

            $t2final = $t2p1['FirstName']." ".$t2p1['LastName']." & ".$t2p2['FirstName']." ".$t2p2['LastName'];

            $t = $db->query('SELECT * FROM `Terrain` WHERE '.$donnees['ID_Terrain'].' = ID');
            $ter = $t->fetch_array();

            $terfinal = $ter['adresse'] . " - " . $ter['etat'];


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
                    <p><b>Equipe 1</b> : <?=$t1final?></p>
                    <p><b>Equipe 2</b> : <?=$t2final?></p>
                    <p><b>Terrain</b> : <?=$terfinal?></p>
                    <p><b>Date du match</b> : <?=$donnees["hour"]?></p>
                    <p><b>Heure du match</b> : <?=$donnees["date"]?></p>

                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default pull-left" target="_blank" href="./php/print.php?id=<?=$donnees['ID']?>"><i class="fa fa-print"></i></a>
                <a class="btn btn-danger btn-outline" href="php/delete-match.php?id=<?=$donnees['ID']?>" onclick="return confirm('Voulez-vous vraiment supprimer ce match ?');">Supprimer</a>
                <a class="btn btn-success btn-outline" href="./edit-match.php?id=<?=$donnees['ID']?>">Modifier</a>
                <button type="button" class="btn btn-info btn-outline" data-dismiss="modal">Retour</button>
            </div>

        </div>
    </div>
