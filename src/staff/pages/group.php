<!DOCTYPE html>
<!-- Page de modification des groupes (transfert de joueur ou changement de terrain) -->
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Poules</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        <?php
            include("./html/header.php");
            include_once('php/BDD.php');

        $db = BDconnect();

        ?>


            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Modifier les poules</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <?php if (array_key_exists("submitting", $_GET)) {?>
                        <?php if ($_GET["submitting"] == "correct") {?>
                            <div class="col-lg-8 alert alert-success text-center">
                                <b>Opération réussite !</b>
                                Succès lors de l'enregistrement des groupes.
                            </div>
                        <?php } else { ?>
                            <div class="col-lg-8 alert alert-danger text-center">
                                <b>Echec de l'opération !</b>
                                Certains groupes utilisent le même terrain.
                            </div>
                    <?php } } ?>
                </div>

                <div class="row">
                    <?php if (array_key_exists("generate", $_GET)) {?>
                        <div class="col-lg-8 alert alert-success">
                            <b>Opération réussite !</b>
                            <?php if ($_GET["generate"] == "true") {?>
                                La génération des groupes est terminée. Vous pouvez à présent les modifier à souhait.
                                <?php } ?>
                        </div>
                        <?php } ?>
                </div>


                <!-- Registration form - START -->
                <div class="row">
                    <ul class="nav nav-tabs">
                        <li <?php if ($_GET[ 'jour']=="sam" ) echo 'class="active" ' ;?>><a href="group.php?jour=sam&cat=1">Samedi</a></li>
                        <li <?php if ($_GET[ 'jour']=="dim" ) echo 'class="active" ' ;?>><a href="group.php?jour=dim&cat=1">Dimanche</a></li>
                        <div class="col-lg-2 text-center">
                            <div class="alert alert-success" id="popupSave" >Terrain enregistré</div>
                        </div>
                    </ul>
                    <ul class="nav nav-tabs nav-justified">
                        <?php $reponse = $db->query('SELECT * FROM Categorie');
                            while ($donnes = $reponse->fetch_array()) { ?>
                                <li <?php if ($_GET['cat']==$donnes['ID'] ) echo 'class="active" ';?>><a href="group.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>"><?=utf8_encode($donnes['Designation']);?></a></li>
                            <?php }?>
                    </ul>
                </div>
                <div class="row">
                    <br/>
                </div>
                <div class="row">
                    <nav class="navbar navbar-inverse navbar-perso navbar-fixed-bottom">
                        <div class="container">
                            <form id="echanger" class="navbar-form" action="./php/group-switch.php?jour=<?=$_GET['jour']?>&cat=<?=$_GET['cat']?>" method="post">
                                <input type="submit" class="btn btn-success pull-right" value="Echanger" />
                                <span class="pull-right"> </span><input type="text" class="form-control pull-right" id="idteam2" name="idteam2" placeholder="ID Equipe 2" required>
                                <p class="pull-right"> </p><input type="text" class="form-control pull-right" id="idteam1" name="idteam1" placeholder="ID Equipe 1" required>

                                <span class="pull-right" data-toggle="pList" data-target="#pList" data-url="./php/group-note-vide.php">
                                <button class="btn btn-default">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                            </span>

                            </form>


                            <form class="navbar-left" action="./php/group-submit.php?jour=<?=$_GET['jour']?>&cat=<?=$_GET['cat']?>" method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Ce bouton est là pour procéder à la vérification que tous les terrains sont différents.
                                             Voir la fonction utilisée dans php/group-submit.php
                                             Est-ce que ça fonctionne? -->
                                        <input type="submit" class="btn btn-primary pull-right" value="Enregistrer Terrains" />
                                    </div>
                                </div>
                            </form>
                            <br/><br/>
                            <div id="pList"></div>
                        </div>
                    </nav>
                </div>
                <div class="row">
                    <div class="text-center">
                        <?php
                            $db = BDconnect();
                            if ($_GET['jour'] == "sam"){
                                $groups = $db->query('SELECT *, GroupSaturday.ID as Gid FROM GroupSaturday, Team WHERE GroupSaturday.ID_t1 = Team.ID AND Team.ID_Cat = '.$_GET['cat'].'');
                            } else{
                                $groups = $db->query('SELECT *, GroupSunday.ID as Gid FROM GroupSunday, Team WHERE GroupSunday.ID_t1 = Team.ID AND Team.ID_Cat = '.$_GET['cat'].'');
                                //$row = $db->query('SELECT COUNT(ID) as numberOfGroups FROM GroupSunday, Team WHERE GroupSunday.ID_t1 = Team.ID AND Team.ID_Cat = '.$_GET['cat'].'')->fetch_array();
                                //extract($row);
                            }
                            $lineNum = 2;
                            $j = 0;
                            $s_a_m = "";
                            $k = 0;
                            while($group = $groups->fetch_array()){
                                $k++;
                                if ($s_a_m == "server-action-menu") {
                                    $s_a_m = "server-other-menu";
                                } else {
                                    $s_a_m = "server-action-menu";
                                }
                                $j++;
                                if ($j > $lineNum){
                                    $j = 0;
                                }
                                if ($group != NULL){?>
                                    <div class="col-lg-3 <?=$s_a_m?>" data-groupID="<?=$group['Gid']?>" data-day="<?=$_GET['jour']?>" data-category="<?=$_GET['cat']?>">
                                        <label><span class="fa fa-users"></span> Groupe
                                            <?= $k?>
                                        </label>
                                        <div class="form-group" >
                                            <label><span class="fa fa-users"></span> Terrain</label>
                                            <select class="form-control" id="terrain <?=$k?>" name="ExpandableListTerrain">
                                                <?php
                                                        $terrains = $db->query('SELECT * FROM Terrain');
                                                        while ($terrain = $terrains->fetch_array())
                                                        { ?>
                                                            <option value=<?=$terrain['ID']?> <?php if ($group['ID_terrain']==$terrain['ID']) { echo "selected=\"selected\""; }?> >
                                                                    <?=$terrain['ID']?> : [<?=utf8_encode($terrain['Type']);?>/<?=utf8_encode($terrain['etat']);?>] <?=utf8_encode($terrain['Note']);?> (<?=utf8_encode($terrain['adresse']);?>)
                                                            </option>
                                                    <?php }
                                                    ?>
                                            </select>
                                        </div>

                                        <?php
                                            if ($_GET['jour']=="sam"){
                                                $teamNum = 5;
                                            } elseif($_GET['jour']=="dim"){
                                                $teamNum = 6;
                                            } else{
                                                $teamNum = 0;
                                            }
                                        ?>
                                        <label><span class="fa fa-users"></span> Equipes </label>
                                        <?php
                                        for ($i = 1; $i <= $teamNum; $i++) {

                                                $teamID = $group["ID_t".$i];
                                                $team = $db->query("SELECT * FROM Team WHERE ID=\"".$teamID."\"")->fetch_array();
                                                $IDPersonne = $team['ID_Player1'];
                                                $player = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne."\"")->fetch_array();

                                                $IDPersonne2 = $team['ID_Player2'];
                                                $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne2."\"")->fetch_array();
                                                ?>
                                            <div class="form-group text-center">
                                                <?php $color = "default";
                                                // N'AFFICHE RIEN SI LE NOM DU PREMIER JOUEUR EST VIDE
                                                // MET EN BLEU ET UN LIEN VERS LA NOTE SI LE JOUEUR EN A UNE
                                                if (($player['Note'] || $player2['Note']) && !empty($player['LastName'])) {
                                                    $color = "primary";
                                                    ?>
                                                    <span data-toggle="pList" data-target="#pList" data-url="./php/group-note.php?id=<?=$teamID?>">
                                                        <button class="btn btn-<?=$color?> btn-outline" data-toggle="idteam1" data-target="#idteam1" data-id="<?=$teamID?>" value="<?=$teamID ?>">
                                                            [<?=$teamID?>] <?=utf8_encode($player['LastName'])?> & <?=utf8_encode($player2['LastName'])?>
                                                        </button>
                                                        </span>
                                                    <?php // N'AFFICHE RIEN SI LE NOM DU PREMIER JOUEUR EST VIDE
                                                } elseif (!empty($player['LastName'])) { ?>
                                                    <button class="btn btn-<?=$color?> btn-outline" data-toggle="idteam1" data-target="#idteam1" data-id="<?=$teamID?>">
                                                        [<?=$teamID?>]
                                                        <?=utf8_encode($player['LastName'])?> -
                                                        <?=utf8_encode($player2['LastName'])?>
                                                    </button>

                                                <?php } ?>
                                            </div>

                                            <?php

                                        }?>
                                    </div>
                                    <?php }
                                        } // End of k loop.
                                    if ($k == 0){ ?>
                                        <div class="col-lg-3 alert alert-danger">
                                            Les groupes n'ont pas encore été générés pour cette catégorie et/ou ce jour.
                                        </div>
                                    <?php } ?>

                    </div>
                    <!-- Registration form - END -->
                </form>
                </div>
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script>
        $(document).ready(function () {
            $('#popupSave').hide();
        });
    </script>

    <script type="text/javascript">
        // On click, get html content from url and update the corresponding modal
        $("[data-toggle='pList']").on("click", function (event) {
            event.preventDefault();
            var url = $(this).attr('data-url');
            var modal_id = $(this).attr('data-target');
            $.get(url, function (data) {
                $(modal_id).html(data);
            });
        });

        $("[data-toggle='idteam1']").on("click", function (event) {
            var id = $(this).attr('data-id');
            if (document.getElementById('idteam1').value == "") {
                document.getElementById('idteam1').value = id;
            } else if (document.getElementById('idteam1').value != "" && document.getElementById('idteam2').value != "") {
                document.getElementById('idteam1').value = id;
                document.getElementById('idteam2').value = "";
            } else {
                document.getElementById('idteam2').value = id;
            }
        });
    </script>

    <script>
          function saveCourt(e){
            var dropDownList = document.getElementById(e.target.id);

            var groupID = dropDownList .parentNode.parentNode.getAttribute('data-groupID');
            var CatID = dropDownList .parentNode.parentNode.getAttribute('data-category');
            var Day = dropDownList .parentNode.parentNode.getAttribute('data-day');

            var js_idT = dropDownList.options[dropDownList.selectedIndex].value;
            var js_idG = groupID ;
            var js_idC = CatID ;
            var js_jour=  Day;
            var url="../pages/php/inc/edit-court-group.php";

            var data={ 'idG':js_idG, 'idT':js_idT, 'idC':js_idC, 'jour': js_jour };

            $.ajax({
                type: "POST",
                url: url,
                data: data

            });

            setTimeout(function() {  $('#popupSave').fadeIn('slow');}, 0);
            setTimeout(function() {  $('#popupSave').fadeOut('slow');},3000);
            console.log("tim");
        }

    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var i=0;
            while(document.getElementsByName("ExpandableListTerrain")[i] != null){
                var List = document.getElementsByName("ExpandableListTerrain")[i];
                i++;
                List.addEventListener("change", saveCourt);
            }
        });

    </script>

</body>

</html>
