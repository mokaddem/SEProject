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
                <h1 class="page-header">Knock-Off - Saisir les résultats</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- Registration form - START -->

        <div class="row">
            <div class="row">
                <ul class="nav nav-tabs">
                    <li <?php if ($_GET['jour']=="sam" ) echo 'class="active" ' ;?>><a href="input-knock-score.php?jour=sam&cat=1">Samedi</a></li>
                    <li <?php if ($_GET['jour']=="dim" ) echo 'class="active" ' ;?>><a href="input-knock-score.php?jour=dim&cat=1">Dimanche</a></li>
                </ul>
                <ul class="nav nav-tabs nav-justified">
                    <?php $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, KnockoffSaturday WHERE KnockoffSaturday.Category = Categorie.ID');
                    if ($_GET['jour'] == "dim") {
                      $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, KnockoffSunday WHERE KnockoffSunday.Category = Categorie.ID');
                    }
                        while ($donnes = $reponse->fetch_array()) { ?>
                          <li <?php if ($_GET['cat']==$donnes['ID'] ) echo 'class="active" ';?>><a href="input-knock-score.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>"><?=utf8_encode($donnes['Designation'])?></a></li>
                        <?php }?>
                </ul>
            </div>
            <div class="row">
                <br/>
            </div>
            <div class="col-lg-3">
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
                $numberOfMatchCol = -1;
                $iter = 1;
                $newColNeeded = False;
                $numberOfTeams = -1;
                $numberOfColDone = 0;
                $numberOfPixels = 0;
                foreach($knockoff_all as $knockoff){
                    $match = $db->query("SELECT * FROM `Match` WHERE ID =" . $knockoff['ID_Match'])->fetch_array();
                ?>
                <div class="row"> <?php
                    if ($match['ID_Equipe2'] == 0){
                        if ($numberOfMatchCol == -1){ // We begin the second round.
                            $numberOfMatchCol = $iter-1;
                            //$iter = 1;
                            $impair = ($match['ID_Equipe1'] == 0) ? 0 : 1;
                            $numberOfTeams = 2*$numberOfMatchCol + $impair; // Total number of teams that we have to place.
                            $newColNeeded = True;
                        } else{
                            if ($numberOfColDone >= $numberOfMatchCol){
                                $newColNeeded = True;
                            }
                        }
                        if ($newColNeeded){
                            $numberOfPixels += (int) 75*$numberOfColDone/2;
                            $position = $numberOfPixels."px";
                            $newColNeeded = False;
                            $numberOfTeams -= $numberOfMatchCol; // There were $numberOfMatchCol matches, so this number of team lost.
                            $impair = $numberOfTeams % 2;
                            $numberOfMatchCol = (int) ($numberOfTeams/2);
                            $numberOfColDone = 0;
                            if ($numberOfTeams == 3){
                                $numberOfMatchCol = 3;
                                $numberOfPixels -= 100;
                                $position = $numberOfPixels."px";
                            }
                            ?>
                            </div>
                            </div>
                            <div class="col-lg-3" style="position: relative; top: <?=$position?>;">
                            <div class="row"> <?php
                        }
                        if($match['ID_Equipe1'] == 0) { ?>
                            <div class="form-group <?=$s_a_m?>">
                                <div class="text-center">
                                    <label ><span class="fa fa-users"></span> Match <?=$knockoff['Position'] ?> </label>
                                </div>
                                <?php
                                displayVoidMatch($match, $knockoff['Position'], $db); ?>
                            </div> <?php
                        } else { ?>
                            <div class="form-group <?=$s_a_m?>">
                                <div class="text-center">
                                    <label ><span class="fa fa-users"></span> Match <?=$knockoff['Position']?> </label>
                                </div> <?php
                                displayImpairMatch($match, $knockoff['Position'], $db); ?>
                            </div> <?php
                        }
                    } else{ ?>
                        <div class="form-group <?=$s_a_m?>">
                            <div class="text-center">
                                <label ><span class="fa fa-users"></span> Match <?=$knockoff['Position'] ?> </label>
                            </div> <?php
                            displayMatch($match, $knockoff['Position'], $db); ?>
                        </div> <?php
                    }
                    if ($s_a_m == "server-action-menu") {
                        $s_a_m = "server-other-menu";
                    } else {
                        $s_a_m = "server-action-menu";
                    }
                    $numberOfColDone++;
                    $iter++;
                    ?>
                    </div> <?php
                }
                ?>

                </div>
            </div>
                <!-- Registration form - END -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    </div>

    <!-- Display functions ! -->
    <?php
    function displayVoidMatch($match, $position, $db){
        ?>
        <div class="form-group text-center">
            <button class="btn btn-default btn-outline" data-toggle="idteam1" data-target="#idteam1" data-id="-1" data-position="<?=$position?>" data-matchID="<?=$match["ID"]?>">Vide</button>
        </div>
        <?php
    }

    function displayImpairMatch($match, $position, $db){
        $teamID = $match["ID_Equipe1"];
        $team = $db->query('SELECT * FROM Team WHERE ID= ' . $teamID . ' AND ID_Cat=' . $_GET['cat'] . ' ')->fetch_array();
        $IDPersonne1 = $team['ID_Player1'];
        $player1 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne1 . "\"")->fetch_array();

        $IDPersonne2 = $team['ID_Player2'];
        $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne2 . "\"")->fetch_array();

        $nameField = "score".$position;

        ?>
        <div class="row">
            <div class="col-lg-6">
                <button class="btn btn-default" disabled> [<?= $teamID ?> - <?= $team['AvgRanking'] ?>] <?= utf8_encode($player1['LastName']) ?> & <?= utf8_encode($player2['LastName']) ?> </button>
            </div>
            <div class="col-lg-4">
                <input type="number" class="form-control" name=<?=$nameField?>-1 id=<?=$nameField?>-1 placeholder="0" min="0"
                       step="1" style="float: left;" required>
            </div>
            <div class="col-lg-1">
                <i class="fa fa-2x fa-arrow-circle-right"></i>
            </div>
        </div>
        <label> Team impaire ! </label>
        <?php
    }

    function displayMatch($match, $position, $db){
        $teamID1 = $match["ID_Equipe1"];
        $team1 = $db->query('SELECT * FROM Team WHERE ID= ' . $teamID1 . ' AND ID_Cat=' . $_GET['cat'] . ' ')->fetch_array();
        $IDPersonne11 = $team1['ID_Player1'];
        $player11 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne11 . "\"")->fetch_array();

        $IDPersonne12 = $team1['ID_Player2'];
        $player12 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne12 . "\"")->fetch_array();

        $teamID2 = $match["ID_Equipe2"];
        $team2 = $db->query('SELECT * FROM Team WHERE ID= ' . $teamID2 . ' AND ID_Cat=' . $_GET['cat'] . ' ')->fetch_array();
        $IDPersonne21 = $team2['ID_Player1'];
        $player21 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne21 . "\"")->fetch_array();

        $IDPersonne22 = $team2['ID_Player2'];
        $player22 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne22 . "\"")->fetch_array();

        $nameField = "score".$position;
        ?>
        <br/>

        <div class="row">
            <div class="col-lg-6">
                <button class="btn btn-default" disabled> [<?= $teamID1 ?> - <?= $team1['AvgRanking'] ?>] <?= utf8_encode($player11['LastName']) ?> & <?= utf8_encode($player12['LastName']) ?> </button>
            </div>
            <div class="col-lg-4">
                <input type="number" class="form-control" name=<?=$nameField?>-1 id=<?=$nameField?>-1 placeholder="0" min="0"
                       step="1" style="float: left;" required>
            </div>
            <div class="col-lg-1">
                <i class="fa fa-2x fa-arrow-circle-right"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <button class="btn btn-default" disabled> [<?= $teamID2 ?> - <?= $team2['AvgRanking'] ?>]
                    <?= utf8_encode($player21['LastName']) ?> & <?= utf8_encode($player22['LastName']) ?> </button>
            </div>
            <div class="col-lg-4">
                <input type="number" class="form-control" name=<?=$nameField?>-2 id=<?=$nameField?>-2 placeholder="0" min="0"
                       step="1" style="float: right;" required>
            </div>
            <div class="col-lg-1">
                <i class="fa fa-2x fa-arrow-circle-right"></i>
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
