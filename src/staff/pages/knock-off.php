<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <?php            
            include("./html/header.php");
            include_once('php/BDD.php');
        ?>


            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Créer un tournois de knock-off</h1>
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
                                <li <?php if ($_GET['jour']=="sam" ) echo 'class="active" ' ;?>><a href="knock-off.php?jour=sam">Samedi</a></li>
                                <li <?php if ($_GET['jour']=="dim" ) echo 'class="active" ' ;?>><a href="knock-off.php?jour=dim">Dimanche</a></li>
                            </ul>
                        </div>
                        <div class="row">
                            <br/>
                        </div>
                        <div class="row">
                            <form class="form-horizontal" action="./php/group-switch.php?jour=<?=$_GET['jour']?>" method="post">
                                <div class="col-lg-2">
                                    <input type="text" class="form-control" id="idteam1" name="idteam1" placeholder="ID Equipe 1" required>
                                </div>
                                <div class="col-lg-2">

                                    <input type="text" class="form-control" id="idteam2" name="idteam2" placeholder="ID Equipe 2" required>
                                </div>
                                <div class="col-lg-8">
                                    <input type="submit" class="btn btn-primary pull-left" value="Echanger" />
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-2">
                            <hr>
                            <?php
                                $db = new BDD();
                                if ($_GET['jour'] == "sam"){
                                    $knockoff_all = $db->query('SELECT * FROM KnockoffSaturday ORDER BY `Position` ASC');
                                    $row = $db->query('SELECT COUNT(ID) as numberOfGroups FROM GroupSaturday')->fetch_array();
                                    extract($row);
                                } else{
                                    $knockoff_all = $db->query('SELECT * FROM KnockoffSaturday ORDER BY `Position` ASC');
                                    $row = $db->query('SELECT COUNT(ID) as numberOfGroups FROM GroupSunday')->fetch_array();
                                    extract($row);
                                }

                            for ($i = 1; $i <= $numberOfGroups; $i++) {
                                $knockoff = $knockoff_all->fetch_array();
                                $match = $db->query("SELECT * FROM `Match` WHERE ID =".$knockoff['ID_Match'])->fetch_array();
                                ?> <div class="form-group text-center">
                                    <label for="sel1"><span class="fa fa-users"></span> Match
                                        <?=$i?>
                                    </label>
                                </div> <?php
                                for ($j = 1; $j <= 2; $j++){
                                    $teamID = $match["ID_Equipe".$j];
                                    if ($teamID == NULL){ ?>
                                        <div class="alert alert-danger">
                                            Au moins un groupe ne contient pas de vainqueur.
                                        </div>
                                    <?php $j++; $NumberOfGroups = 0;} else {
                                    $team = $db->query("SELECT * FROM Team WHERE ID=\"".$teamID."\"")->fetch_array();
                                    $IDPersonne1 = $team['ID_Player1'];
                                    $player1 = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne1."\"")->fetch_array();

                                    $IDPersonne2 = $team['ID_Player2'];
                                    $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne2."\"")->fetch_array();
                                ?>
                                <div class="form-group text-center">
                                    <label> </label>
                                        <button class="btn btn-<?="default"?> btn-outline" data-toggle="idteam1" data-target="#idteam1" data-id="<?=$teamID?>">
                                            <?=$teamID?>,
                                            <?=$player1['LastName']?> &
                                            <?=$player2['LastName']?>
                                        </button>
                                </div>
                                <?php } } } ?>


                        </div>

                        <?php // Quand on gèrera les terrains: utiliser $knockoff-all
                            $matchNum = 1;
                            $iter = 0;
                            $numberOfPixels = 75;
                            for ($k = $numberOfGroups; $k >= 1; $k = $k/2){
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
												$db = new BDD();
												$terrains = $db->query('SELECT * FROM Terrain');
												while ($terrain = $terrains->fetch_array())
												{ ?>
													<option value=<?=$terrain['ID']?>> <?=$terrain['ID']?> : <?=$terrain['Note']?>, <?=$terrain['adresse']?></option>
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
				            } ?>
                    <!-- Registration form - END -->

                </div>
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