<?php include_once('php/BDD.php'); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Staff - Charles de Lorraine - Poules - Vue d'ensemble</title>

        <!-- Bootstrap Core CSS -->
        <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

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
        
            $db = BDconnect();
            $reponseS = $db->query('SELECT * FROM GroupSaturday');
            $reponseD = $db->query('SELECT * FROM GroupSunday');

        ?>

                <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Poules - Vue d'ensemble</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                            <ul class="nav nav-tabs">
                                <li <?php if ($_GET[ 'jour']=="sam" ) echo 'class="active" ' ;?>><a href="group-overview.php?jour=sam">Samedi</a></li>
                                <li <?php if ($_GET[ 'jour']=="dim" ) echo 'class="active" ' ;?>><a href="group-overview.php?jour=dim">Dimanche</a></li>
                            </ul>
                        </div>
                    
                        <div class="row">
                            <div class="panel panel-default">
                            <br/>
                        

                        <!--<div class="form-group">
                        <label for="sel1"><span class="fa fa-dot-circle-o"></span> Choix de la poule</label>
                        Ne sert à rien lol
                        <select class="form-control" id="sel1">
                            <optgroup label="--- Samedi">
                                <?php 
                                //    while ($donneesS = $reponseS->fetch_array()){
                                //        echo '<option value="'.$donneesS['ID'].'">Poule n°'.$donneesS['ID'].'</option>';
                                //    }
                                ?>
                            </optgroup>
                            <optgroup label="--- Dimanche">
                                <?php
                                //    while ($donneesD = $reponseD->fetch_array()){
                                //        echo '<option value="'.$donneesD['ID'].'">Poule n°'.$donneesD['ID'].'</option>';
                                //    }
                                ?>
                            </optgroup>
                        </select>
                    </div> -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">

                                    <!-- <div class="panel-heading">
                            DataTables Advanced Tables
                        </div> -->
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Terrain</th>
                                                        <th>Equipe 1</th>
                                                        <th>Equipe 2</th>
                                                        <th>Equipe 3</th>
                                                        <th>Equipe 4</th>
                                                        <th>Equipe 5</th>
                                                        <?php if ($_GET[ 'jour']=="dim"){ ?>
                                                            <th>Equipe 6</th>
                                                            <?php } ?>
                                                                <th>Vainqueurs 1</th>
                                                                <th>Vainqueurs 2</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                            if ($_GET[ 'jour']=="sam" ){
                                                $listDonnees = $db->query('SELECT * FROM GroupSaturday');
                                            }else {
                                                $listDonnees = $db->query('SELECT * FROM GroupSunday');
                                            }
                                            foreach ($listDonnees as $donnees) { $i = 1; ?>
                                                        <tr class="odd gradeX text-center">
                                                            <?php foreach ($donnees as $donnee) { ?>
                                                                <td>
                                                                    <?php
                                                        if ($i == 2 and $donnee != NULL) {
                                                            $terrain = $db->query("SELECT * FROM Terrain WHERE ID=\"" . $donnee . "\"")->fetch_array();
                                                            ?>
                                                                        <option value=<?=$terrain[ 'ID']?>>
                                                                            <?=$terrain['ID']?>,
                                                                                <?=utf8_encode($terrain['Note'])?>
                                                                        </option>
                                                                        <?php
                                                        }elseif($i > 2 and $donnee != NULL) {
                                                            $team = $db->query("SELECT * FROM Team WHERE ID=\"" . $donnee . "\"")->fetch_array();
                                                            $IDPersonne = $team['ID_Player1'];
                                                            $player = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne . "\"")->fetch_array();

                                                            $IDPersonne2 = $team['ID_Player2'];
                                                            $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne2 . "\"")->fetch_array();
                                                            ?>
                                                                            <?=$donnee?>,
                                                                                <?= utf8_encode($player['LastName'])?> &
                                                                                    <?=utf8_encode($player2['LastName'])?>
                                                                                        <?php
                                                        } else{
                                                            echo $donnee;
                                                        }
                                                    ?>
                                                                </td>
                                                                <?php    $i++; } ?>
                                                        </tr>
                                                        <?php    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                            </div>
                            <!-- /.col-lg-6 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /#page-wrapper -->
                </div></div>
        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>

    </body>

    </html>