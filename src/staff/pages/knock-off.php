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
                                <?php $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, KnockoffSaturday WHERE KnockoffSaturday.Category = Categorie.ID');
                                if ($_GET['jour'] == "dim") {
                                  $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, KnockoffSunday WHERE KnockoffSunday.Category = Categorie.ID');
                                }
                                    while ($donnes = $reponse->fetch_array()) { ?>
                                      <li <?php if ($_GET['cat']==$donnes['ID'] ) echo 'class="active" ';?>><a href="knock-off.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>"><?=utf8_encode($donnes['Designation'])?></a></li>
                                    <?php }?>
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
                        <div class="col-lg-12 text-center">

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
                                ?> <h3> <b> Modifier les équipes et les terrains pour le tour 1. </b> </h3>
                            <div class="col-lg-12 text-center">
                            <?php
                                $impairTeam = 0;
                                $s_a_m = "server-other-menu";
                                for ($i = 1; $i <= $numberOfMatch; $i++) {
                                ?> <div class="col-lg-3 text-center"> <?php
                                    if ($s_a_m == "server-action-menu") {
                                        $s_a_m = "server-other-menu";
                                    } else {
                                        $s_a_m = "server-action-menu";
                                    }
                                    $knockoff = $knockoff_all->fetch_array();
                                    $match = $db->query("SELECT * FROM `Match` WHERE ID =" . $knockoff['ID_Match'])->fetch_array();
                                    if ($match['ID_Equipe1'] == 0 and $match['ID_Equipe2'] == 0) {
                                        $numberFirstRound = $i - 1;
                                        $i = $numberOfMatch;
                                    } else{
                                        ?>
                                        <div class="form-group text-center <?=$s_a_m?>"  data-groupID="<?=$knockoff['ID']?>" data-day="<?=$_GET['jour']?>" data-category="<?=$_GET['cat']?>" data-teamNum="2" data-matchID="<?=$match['ID']?>" >
                                            <label for="sel1"><span class="fa fa-users"></span> Match
                                                <?= $i ?>
                                            </label>
                                            <?php
                                            if ($match['ID_Equipe2'] == 0) {
                                                $numberFirstRound = $i - 1;
                                                $i = $numberOfMatch;
                                                $impairTeam = 1;
                                                ?> <label class="text-center">Cette équipe commence au second
                                                    tour</label> <?php
                                            } else{
                                            ?>
                                                <select class="form-control" id="sel<?= $i ?>" name="ExpandableListTerrain">
                                                    <?php
                                                    $terrains = $db->query('SELECT * FROM Terrain');
                                                    while ($terrain = $terrains->fetch_array())
                                                    { ?>
<!--                                                        <option value=--><?//=$terrain['ID']?><!--> --><?//=$terrain['ID']?><!-- : --><?//=utf8_encode($terrain['Note'])?><!--, --><?//=utf8_encode($terrain['adresse'])?><!--</option>-->

                                                        <option value=<?=$terrain['ID']?> <?php if ($match['ID_Terrain']==$terrain['ID']) { echo "selected=\"selected\""; }?> >
                                                            <?=$terrain['ID']?> : [<?=utf8_encode($terrain['Type']);?>/<?=utf8_encode($terrain['etat']);?>] <?=utf8_encode($terrain['Note']);?> (<?=utf8_encode($terrain['adresse']);?>)
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                <label></label>
                                                <?php }?>
                                         <?php
                                        for ($j = 1; $j <= 2; $j++) {
                                            $teamID = $match["ID_Equipe" . $j];
                                            $team = $db->query('SELECT * FROM Team WHERE ID= ' . $teamID . ' AND ID_Cat=' . $_GET['cat'] . ' ')->fetch_array();
                                            $IDPersonne1 = $team['ID_Player1'];
                                            $player1 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne1 . "\"")->fetch_array();

                                            $IDPersonne2 = $team['ID_Player2'];
                                            $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne2 . "\"")->fetch_array();
                                            if ($match['ID_Equipe2'] == 0) {
                                                $j++;
                                            }
                                            ?>
                                            <div class="form-group text-center">
                                            <?php $color = "default";
                                            $videOrNot = "-vide";
                                            if (!empty($player1['LastName'])) {
                                                if ($player1['Note'] || $player2['Note']) {
                                                    $color = "primary";
                                                    $videOrNot = "";
                                                } ?>
                                                <span data-toggle="pList" data-target="#pList"
                                                      data-url="./php/knock-off-note<?= $videOrNot ?>.php?id=<?= $teamID ?>">
                                                    <button class="btn btn-<?= $color ?> btn-outline"
                                                            data-toggle="idteam1" data-target="#idteam1"
                                                            data-id="<?= $teamID ?>">
                                                        [<?= $teamID ?> - <?= $team['AvgRanking'] ?>]
                                                        <?= utf8_encode($player1['LastName']) ?> &
                                                        <?= utf8_encode($player2['LastName']) ?>
                                                    </button>
                                                <span/>
                                                </div>
                                            <?php }
                                        } ?>
                                         </div>
                                    <?php }
                                    ?> </div> <?php
                                } ?>

                                </div>
                                <div class="col-lg-12 text-center">
                                    <h3> <b> Modifier les terrains pour les tours suivants. </b> </h3>
                                    <?php // ATTENTION: montrer le bon terrain
                                        $matchNum = $numberFirstRound + $impairTeam;
                                        $iter = 0;
                                        $numberOfPixels = (int) -75/2;
                                        $numberOfTeams = $numberFirstRound + $impairTeam;
                                        $stop = False;


                                        if ($_GET['jour'] == "sam"){
                                            $knockoff = $db->query('SELECT * FROM KnockoffSaturday WHERE Position='.$matchNum)->fetch_array();
                                        } elseif ($_GET['jour'] == "dim") {
                                            $knockoff = $db->query('SELECT * FROM KnockoffSunday WHERE Position='.$matchNum)->fetch_array();
                                        }
                                        $matchRep = $db->query("SELECT * FROM `Match` WHERE ID =" . $knockoff['ID_Match']);
                                        $match = $matchRep->fetch_array();

                                        while ($numberOfTeams > 1 and !$stop){
                                            $impairTeam = $numberOfTeams % 2;
                                            //echo $numberOfTeams." team(s).\n";
                                            $numberOfPixels += (int) 75*$numberOfTeams/4 - $impairTeam*(75/2);
                                            $position = $numberOfPixels."px";
                                    ?>
                                        <div class="col-lg-3 text-center" style="position: relative; top: <?=$position?>;">
                                             <label> Tour <?=$iter+2?> </label>
                                            <?php if($impairTeam == 1 and $numberOfTeams != 3) { ?>
                                                <label class="text-danger"> Une team n'aura pas de match à ce tour. </label >
                                            <?php } elseif ($numberOfTeams == 3){
                                                    ?> </br> <label class="text-danger"> Il reste 3 équipes en finale. </label>
                                                     <?php
                                                     $numberOfTeams = 7;
                                                     $stop = True;
                                                  } elseif ($numberOfTeams == 2){
                                                    ?> </br> <label class="text-danger"> FINALE </label> <?php
                                                  }
                                            for ($j = $impairTeam; $j < $numberOfTeams/2; $j++) {
                                                    $s_a_m = "server-new-menu";
                                                ?>
                                                <div class="form-group <?=$s_a_m?>"data-day="<?=$_GET['jour']?>" data-category="<?=$_GET['cat']?>" data-matchID="<?=$match['ID']?>">
                                                    <label for="sel1"><span class="fa fa-users"></span> Match
                                                        <?=$matchNum?>
                                                    </label>
                                                    <select class="form-control" id="sel<?= ($j+$matchNum) ?>" name="ExpandableListTerrain">
                                                        <?php
                                                            $terrains = $db->query('SELECT * FROM Terrain');
                                                            while ($terrain = $terrains->fetch_array())
                                                            { ?>
                                                                <option value=<?=$terrain['ID']?> <?php if ($match['ID_Terrain']==$terrain['ID']) { echo "selected=\"selected\""; }?> >
                                                                    <?=$terrain['ID']?> : [<?=utf8_encode($terrain['Type']);?>/<?=utf8_encode($terrain['etat']);?>] <?=utf8_encode($terrain['Note']);?> (<?=utf8_encode($terrain['adresse']);?>)
                                                                </option>

                                                            <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                                <?php
                                                    $matchNum++;
                                                    if ($matchNum <= $numberOfMatch) {
                                                        if ($_GET['jour'] == "sam") {
                                                            $knockoff = $db->query('SELECT * FROM KnockoffSaturday WHERE Position=' . $matchNum)->fetch_array();
                                                        } elseif ($_GET['jour'] == "dim") {
                                                            $knockoff = $db->query('SELECT * FROM KnockoffSunday WHERE Position=' . $matchNum)->fetch_array();
                                                        }
                                                        $matchRep = $db->query("SELECT * FROM `Match` WHERE ID =" . $knockoff['ID_Match']);
                                                        $match = $matchRep->fetch_array();
                                                    }
                                            } ?>
                                        </div>
                                        <?php
                                            $iter++;
                                        if ($numberOfTeams == 1){ // To stop the loop
                                            $stop = True;
                                        } else {
                                            $numberOfTeams = intval($numberOfTeams / 2) + $impairTeam;
                                        }
                                        } ?>
                                    </div>
                                <!-- Registration form - END -->
                            </div>
                    <?php }?>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
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

            var CatID = dropDownList .parentNode.getAttribute('data-category');
            var Day = dropDownList .parentNode.getAttribute('data-day');
            var matchID = dropDownList .parentNode.getAttribute('data-matchID');

            var js_idT = dropDownList.options[dropDownList.selectedIndex].value;
            var js_idC = CatID ;
            var js_jour=  Day;
            var js_matchID = matchID;
            var url="../pages/php/inc/edit-court-knock-off.php";

            var data={ 'idT':js_idT, 'idC':js_idC, 'idM' : js_matchID, 'jour': js_jour };
            console.log(data);
            $.ajax({
                type: "POST",
                url: url,
                data: data
            });
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
