<!DOCTYPE html>
<html lang="en">
<!-- Page de modification du tournoi knock-off (echange d'équipes et terrains) -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Knock-off</title>

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
                        <h1 class="page-header">Modifier le knock-off</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <?php if (array_key_exists("generate", $_GET)) {?>
                        <div class="col-lg-8 alert alert-success">
                            <b>Opération réussite !</b>
                            <?php if ($_GET["generate"] == "true") {?>
                                La génération du tournoi est terminée. Vous pouvez à présent le modifier comme bon vous semble.
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <!-- Registration form - START -->

                    <div class="row">
                        <div class="row">
                            <ul class="nav nav-tabs">
                                <li <?php if ($_GET['jour']=="sam" ) echo 'class="active" ' ;?>><a href="knock-off.php?jour=sam&cat=1">Samedi</a></li>
                                <li <?php if ($_GET['jour']=="dim" ) echo 'class="active" ' ;?>><a href="knock-off.php?jour=dim&cat=1">Dimanche</a></li>
                            </ul>
                            <ul class="nav nav-tabs nav-justified">
                                <?php $reponse = $db->query('SELECT * FROM Categorie');
                                while ($donnes = $reponse->fetch_array()) { ?>
                                    <li <?php if ($_GET['cat']==$donnes['ID_Cat'] ) echo 'class="active" ';?>><a href="knock-off.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>"><?=utf8_encode($donnes['Designation'])?></a></li>
                                <?php} ?>
                            </ul>
                        </div>
                        <div class="row">
                            <br/>
                        </div>
                        <div class="row">
                            <nav class="navbar navbar-inverse navbar-perso navbar-fixed-bottom">
                                <div class="container">
                                    <form id="echanger" class="navbar-form" action="./php/knock-off-switch.php?jour=<?=$_GET['jour']?>&cat=<?=$_GET['cat']?>" method="post">
                                        <input type="submit" class="btn btn-success pull-right" value="Echanger" />
                                        <span class="pull-right"> </span><input type="text" class="form-control pull-right" id="idteam2" name="idteam2" placeholder="ID Equipe 2" required>
                                        <p class="pull-right"> </p><input type="text" class="form-control pull-right" id="idteam1" name="idteam1" placeholder="ID Equipe 1" required>

                                <span class="pull-right" data-toggle="pList" data-target="#pList" data-url="./php/group-note-vide.php">
                                <button class="btn btn-default">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                            </span>

                                    </form>

                                    <br/><br/>
                                    <div id="pList"></div>
                                </div>
                            </nav>
                        </div>
                        <div class="col-lg-2">
                            <hr>
                            <?php
                                if ($_GET['jour'] == "sam"){
                                $knockoff_all = $db->query('SELECT * FROM KnockoffSaturday WHERE Category = '.$_GET['cat'].' ORDER BY `Position` ASC');
                                $row = $db->query('SELECT COUNT(ID) as numberOfMatch FROM KnockoffSaturday WHERE Category = '.$_GET['cat'])->fetch_array();
                                extract($row);
                            } elseif ($_GET['jour'] == "dim") {
                                $knockoff_all = $db->query('SELECT * FROM KnockoffSunday WHERE Category = '.$_GET['cat'].' ORDER BY `Position` ASC');
                                $row = $db->query('SELECT COUNT(ID) as numberOfMatch FROM KnockoffSunday WHERE Category = '.$_GET['cat'])->fetch_array();
                                extract($row);
                            }
                            if ($numberOfMatch == 0){ ?>
                                <div class="alert alert-danger">
                                    Le tournoi n'a pas encore été généré pour cette catégorie et/ou ce jour.
                                </div>
                            <?php } else {
                                for ($i = 1; $i <= $numberOfMatch; $i++) {
                                    $knockoff = $knockoff_all->fetch_array();
                                    $match = $db->query("SELECT * FROM `Match` WHERE ID =" . $knockoff['ID_Match'])->fetch_array();
                                    if ($match['ID_Equipe2'] == 0) {
                                        $numberFirstRound = $i-1;
                                        $i = $numberOfMatch;
                                    } else{
                                    ?>
                                    <div class="form-group text-center">
                                        <label for="sel1"><span class="fa fa-users"></span> Match
                                            <?= $i ?>
                                        </label>
                                    </div> <?php
                                    for ($j = 1; $j <= 2; $j++) {
                                        $teamID = $match["ID_Equipe" . $j];
                                        $team = $db->query('SELECT * FROM Team WHERE ID= ' . $teamID . ' AND ID_Cat=' . $_GET['cat'] . ' ')->fetch_array();
                                        $IDPersonne1 = $team['ID_Player1'];
                                        $player1 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne1 . "\"")->fetch_array();

                                        $IDPersonne2 = $team['ID_Player2'];
                                        $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne2 . "\"")->fetch_array();

                                            ?>
                                            <div class="form-group text-center">
                                                <?php $color = "default";
                                                $videOrNot = "-vide";
                                                if (!empty($player1['LastName'])) {
                                                if ($player1['Note'] || $player2['Note']) {
                                                    $color = "primary";
                                                    $videOrNot = "";
                                                } ?>
                                                <span data-toggle="pList" data-target="#pList" data-url="./php/knock-off-note<?=$videOrNot?>.php?id=<?=$teamID?>">
                                                    <button class="btn btn-<?=$color?> btn-outline" data-toggle="idteam1" data-target="#idteam1" data-id="<?=$teamID?>">
                                                        [<?= $teamID ?> - <?= $team['AvgRanking'] ?>]
                                                        <?= utf8_encode($player1['LastName']) ?> &
                                                        <?= utf8_encode($player2['LastName']) ?>
                                                    </button>
                                                <span/>
                                            </div>
                                        <?php }
                                        }
                                    }
                                } ?>

                                </div>
                                    <?php // ATTENTION: montrer le bon terrain
                                        $matchNum = 1;
                                        $iter = 0;
                                        $numberOfPixels = 75;
                                        for ($k = $numberFirstRound; $k >= 1; $k = ceil($k/2)){
                                            $position = $numberOfPixels."px";
                                    ?>
                                        <div class="col-lg-2 text-center" style="position: relative; top: <?=$position?>;">
                                            <?php for ($j = 1; $j <= $k; $j++) { ?>
                                                <div class="form-group">
                                                    <label for="sel1"><span class="fa fa-users"></span> Match
                                                        <?=$matchNum?>
                                                    </label>
                                                    <select class="form-control" id="sel1">
                                                        <?php
                                                            $db = BDconnect();
                                                            $terrains = $db->query('SELECT * FROM Terrain');
                                                            while ($terrain = $terrains->fetch_array())
                                                            { ?>
                                                                <option value=<?=$terrain['ID']?>> <?=$terrain['ID']?> : <?=utf8_encode($terrain['Note'])?>, <?=utf8_encode($terrain['adresse'])?></option>
                                                            <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                                <?php
                                                    $matchNum++;
                                            } ?>
                                        </div>
                                        <?php
                                            $iter++;
                                            $numberOfPixels += (int) 75*$k/4;
                                        if ($k == 1){ // To stop the loop
                                            $k = 0;
                                        }} ?>
                                <!-- Registration form - END -->
                            </div>
                    <?php }?>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

    </div>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

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

</body>

</html>
