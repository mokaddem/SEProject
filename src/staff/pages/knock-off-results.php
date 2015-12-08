<!DOCTYPE html>
<html lang="en">
<!-- Page de modification du tournoi knock-off (echange d'équipes et terrains) -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Knock-Off - Saisir Score</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="wrapper">

    <?php
    include("./html/header.php");
    include_once('php/BDD.php');

    $db = BDconnect();
    ?>


    <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Résultats du tournoi de Knock-Off</h1>
            
                <ul class="nav nav-tabs">
                    <li <?php if ($_GET[ 'jour']=="sam" ) echo 'class="active" ' ;?>><a href="knock-off-results.php?jour=sam&cat=0" >Samedi <i class="fa fa-venus-mars" style="font-size: 150%"></i> </a></li>
                    <li <?php if ($_GET[ 'jour']=="dim" ) echo 'class="active" ' ;?>><a href="knock-off-results.php?jour=dim&cat=0">Dimanche <i class="fa fa-venus" style="font-size: 150%"></i> || <i class="fa fa-mars" style="font-size: 150%"></i></a></li>
                </ul>
                <div class="panel panel-default">
                <ul class="nav nav-pills nav-justified">
                    <?php $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, KnockoffSaturday WHERE KnockoffSaturday.Category = Categorie.ID');
                    if ($_GET['jour'] == "dim") {
                        $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, KnockoffSunday WHERE KnockoffSunday.Category = Categorie.ID');
                    }
                    while ($donnes = $reponse->fetch_array()) { ?>
                      <?php if ($_GET['cat']=="0") { ?>
                        <script>document.location.href="./knock-off-results.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>";</script>
                      <?php  } ?>
                        <li <?php if ($_GET['cat']==$donnes['ID'] ) echo 'class="active" ';?>><a href="knock-off-results.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>"><?=utf8_encode($donnes['Designation'])?></a></li>
                    <?php }?>
                </ul>
                </div>
            </div>
            <div class="row">
                <br/>
            </div>
            <div class="col-lg-3 vcenter">
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
                <?php }
                $s_a_m = "server-action-menu";
                $matchInRound = ($numberOfMatch+1)/2;
                $matchDoneThisRound = 0;
                $round = 1;
                $maxCol = 4;
                foreach($knockoff_all as $knockoff){
                    $match = $db->query("SELECT * FROM `Match` WHERE ID =" . $knockoff['ID_Match'])->fetch_array();
                    ?> <div class="row"> <?php
                    if ($matchDoneThisRound >= $matchInRound){
                        $matchDoneThisRound = 0;
                        $matchInRound = $matchInRound/2;
                        $round++;
                        if (($round-1) % $maxCol == 0){ ?>
                        </div>
                        <div class="col-lg-12 vcenter">
                            <h4><b> Résultats des tours suivants </b></h4>
                        <?php
                        }
                        ?>
                        </div>
                        </div>
                        <div class="col-lg-3 vcenter">
                        <div class="row">
                        <?php
                    } ?>
                    <div class="form-group <?=$s_a_m?>">
                    <div class="text-center">
                        <label ><span class="fa fa-users"></span> Match <?=$knockoff['Position'] ?> </label>
                    </div>
                    <?php
                    $aloneTeam = false;
                    if ($match['ID_Equipe2'] == -2){
                        $aloneTeam = true;
                        ?>
                        <label class="text-danger">Cette équipe commence au second tour</label>
                        <?php
                    }
                    for ($j = 1; $j <= 2; $j++) {
                        $teamID = $match['ID_Equipe'.$j];
                        if ($teamID == 0) {
                            displayVoidTeam($match, $knockoff['Position'], $db);
                        } else {
                            $team = $db->query('SELECT * FROM Team WHERE ID= ' . $teamID . ' AND ID_Cat=' . $_GET['cat'] . ' ')->fetch_array();
                            displayTeam($team, $match, $j, $knockoff['Position'], $db);
                        }
                        if ($aloneTeam){
                            $j++;
                        }
                    }
                    ?>
                    </div> <?php
                    if ($s_a_m == "server-action-menu") {
                        $s_a_m = "server-other-menu";
                    } else {
                        $s_a_m = "server-action-menu";
                    }
                    $matchDoneThisRound++;
                    ?>
                </div> <?php
                }
                ?>

            </div>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <!-- Registration form - END -->
    </div>

    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
</div>

<!-- Display functions ! -->
<?php

function displayVoidTeam($match, $position, $db){
    ?>
    <div class="form-group text-center">
        <p> Equipe non choisie. </p>
    </div>
    <?php
}

function displayTeam($team, $match, $teamInMatch, $position, $db){
    $teamID = $team["ID"];
    $team = $db->query('SELECT * FROM Team WHERE ID= ' . $teamID . ' AND ID_Cat=' . $_GET['cat'] . ' ')->fetch_array();
    $IDPersonne1 = $team['ID_Player1'];
    $player1 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne1 . "\"")->fetch_array();

    $IDPersonne2 = $team['ID_Player2'];
    $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne2 . "\"")->fetch_array();

    $ranking = ($team['AvgRanking'] == NULL) ? "NC" : $team['AvgRanking'];
    ?>
    <div class="row">
        <div class="col-lg-10">
            <p> [<?=$ranking?>] <?= utf8_encode($player1['LastName']) ?> & <?= utf8_encode($player2['LastName']) ?> </p>
        </div>
        <div class="col-lg-1">
            <p> <?= $match['score'.$teamInMatch]?> </p>
        </div>
    </div>
    <?php
}
?>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<script type="text/javascript"></script>

</body>

</html>
