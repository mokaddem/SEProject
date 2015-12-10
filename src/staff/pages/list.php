<?php require_once("./php/inc/list-function.inc");
?>
    <!DOCTYPE html>
<!-- Page affichant tous les participants/matchs/propriétaires/catégories/staff existants aux URLs suivant
list.php?type=player
list.php?type=match
list.php?type=owner
list.php?type=category
list.php?type=staff
 -->
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Staff - Charles de Lorraine - Liste</title>

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

        <link rel="shortcut icon" href="../../images/icon.ico">

        </head>

    <body>

        <div id="wrapper">
            


            <?php
            include("./html/header.php");

            if (array_key_exists("type", $_GET)) {
                $listDonnees = getDonnees($_GET["type"]);
                $titreDonnees = getTitreTable($_GET["type"]);
                $paramDonnees = getParam($_GET["type"]);

                $titre = getTitre($_GET["type"]);
            }



            if (!empty($listDonnees)) {
            ?>

                <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Liste des <?=$titre?>
                            <a class="btn btn-default btn-outline pull-right" href="./<?=$_GET["type"]?>.php"> Créer</a>
                            </h1>
                        </div>


                        <!-- /.col-lg-12 -->
                    </div>
                    <?php if (array_key_exists("stafferror", $_GET)) {
                            if ($_GET['stafferror'] == "edit") { ?>
                                <div class="alert alert-danger">Les membres du Staff ne peuvent pas être modifiés</div>
                            <?php } elseif ($_GET['stafferror'] == "delete") { ?>
                                <div class="alert alert-danger">Les membres du Staff ne peuvent pas être supprimés</div>
                    <?php } ?>
                    <?php } ?>


                    <?php
                        if (array_key_exists("error", $_GET)) {
                          if ($_GET['error'] == "creation") {?>
                            <p class="alert alert-danger"> Vous ne pouvez pas supprimer
                                <?=$_GET['type']?> car utilisé dans une autre rubrique</p>
                        <?php } elseif ($_GET['error'] == "1") { ?>
                          <p class="alert alert-danger"> Vous ne pouvez pas supprimer l'id=1 de
                              <?=$_GET['type']?></p>
                    <?php }
                      }
                    ?>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <!--<div class="panel-heading">
                                </div>-->
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                                    <thead>

                                                        <tr>
                                                            <?php foreach ($titreDonnees as $titreD){ ?>
                                                                <th>
                                                                    <?=$titreD?>
                                                                </th>
                                                                <?php } ?>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($listDonnees as $donnee){?>
                                                            <tr class="odd gradeX">
                                                                <?php foreach ($paramDonnees as $param){ ?>
                                                                    <td data-toggle="modal" data-target="#myModal" data-url="./show.php?type=<?=$_GET['type']?>&id=<?=$donnee['ID']?>">
                                                                        <?=utf8_encode($donnee[$param])?>
                                                                    </td>
                                                                    <?php } ?>
                                                                        <td>
                                                                            <a href="./edit-<?=$_GET['type']?>.php?id=<?=$donnee['ID']?>"><i class="fa fa-edit fa-fw"></i></a>
                                                                            <a href="php/delete-<?=$_GET['type']?>.php?id=<?=$donnee['ID']?>" onclick="return confirm('Voulez-vous vraiment supprimer cette entrée ?');"><i class="fa fa-trash-o"></i></a>
                                                                            <?php if ($_GET['type'] == 'court') {
                                                                              // Pour les teams et terrains ?>
                                                                              <a href="./php/print-<?=$_GET['type']?>.php?id=<?=$donnee['ID']?>" target="_blank"><i class="fa fa-print fa-fw"></i></a>
                                                                            <?php }?>
                                                                        </td>
                                                            </tr>
                                                            <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                            </div>
                            <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                </div>


        </div>
        <!-- /#page-wrapper -->

        <?php } else {?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Cette liste n'existe pas.</h1>
                    </div>
                </div>
            </div>
            <?php }?>

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
                <script type="text/javascript">
                    // On click, get html content from url and update the corresponding modal
                    $("[data-toggle='modal']").on("click", function (event) {
                        event.preventDefault();
                        var url = $(this).attr('data-url');
                        var modal_id = $(this).attr('data-target');
                        $.get(url, function (data) {
                            $(modal_id).html(data);
                        });
                    });
                </script>


    </body>

    </html>
