<?php require_once("./php/inc/list-function.inc");
?>

<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine</title>

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
        ?>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Accueil</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="sel1"><span class="fa fa-history"></span> Historique des modifications</label>
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
                                                    <th>Admin</th>
                                                    <th>ID Entité modifiée</th>
                                                    <th>Type Entité</th>
                                                    <th>Action effectuée</th>
                                                    <th>Date</th>
                                                    <th>Heure</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach (getHistories() as $histo){
                                                    $color = "";
                                                    switch ($histo['action']) {
                                                        case "Ajout":
                                                            $color = "success";
                                                            break;
                                                        case "Suppression":
                                                            $color = "danger";
                                                            break;
                                                        case "Edition":
                                                            $color = "info";
                                                            break;
                                                    }
                                                    ?>
                                                    <tr class="odd gradeX <?=$color?>">
                                                        <td>
                                                            <?=$histo['id']?>
                                                        </td>
                                                        <td>
                                                            <?=utf8_encode(getStaffName($histo['idPerson']))?>
                                                        </td>
                                                        <td>
                                                            <?=$histo['idEntite']?>
                                                        </td>
                                                        <td>
                                                            <?=utf8_encode($histo['typeEntite'])?>
                                                        </td>
                                                        <td>
                                                            <?=utf8_encode($histo['action'])?>
                                                        </td>
                                                        <td>
                                                            <?=$histo['date']?>
                                                        </td>
                                                        <td>
                                                            <?=$histo['hour']?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
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
                    
                    <div>
                        <a href="./php/delete-history.php" class="btn btn-danger">Effacer</a>
                    </div>
                    
                    <div class="row text-center">
                        <a class="twitter-timeline" href="https://twitter.com/SimonsCat" data-widget-id="661635155916890112">Tweets de @SimonsCat</a>
                        <script>
                            ! function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0],
                                    p = /^http:/.test(d.location) ? 'http' : 'https';
                                if (!d.getElementById(id)) {
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = p + "://platform.twitter.com/widgets.js";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }
                            }(document, "script", "twitter-wjs");
                        </script>


                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.container-fluid -->
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

    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
    </script>

</body>

</html>