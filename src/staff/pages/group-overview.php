<?php include_once('php/BDD.php'); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin Mode - Poules - Vue d'ensemble</title>

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
        
            $db = new BDD();
            $reponseS = $db->query('SELECT * FROM GroupSaturday');
            $reponseD = $db->query('SELECT * FROM GroupSunday');

        ?>

                <div id="page-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Poules - Vue d'ensemble</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->

                    <div class="form-group">
                        <label for="sel1"><span class="fa fa-dot-circle-o"></span> Choix de la poule</label>
                        <select class="form-control" id="sel1">
                            <optgroup>
                                <?php 
                                    while ($donneesS = $reponseS->fetch_array()){
                                        echo '<option value="'.$donneesS['ID'].'">Samedi - Poule n°'.$donneesS['ID'].'</option>';
                                    }
                                ?>
                            </optgroup>
                            <optgroup label="-----------------------------------------------">
                                <?php
                                    while ($donneesD = $reponseD->fetch_array()){
                                        echo '<option value="'.$donneesD['ID'].'">Dimanche - Poule n°'.$donneesD['ID'].'</option>';
                                    }
                                ?>
                            </optgroup>
                                <!-- <option>propriétaire</option> -->
                        </select>
                    </div>

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
                                                    <th>Equipe 1</th>
                                                    <th>Equipe 2</th>
                                                    <th>Equipe 3</th>
                                                    <th>Equipe 4</th>
                                                    <th>Equipe 5</th>
                                                    <th>Points</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php //require_once("./php/inc/list-team.inc"); ?>
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

                    <input type="submit" name="submit" id="submit" value="Supprimer cette poule" class="btn btn-danger pull-left">

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