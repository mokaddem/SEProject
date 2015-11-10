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
                        <h1 class="page-header">Générer les poules</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- Registration form - START -->
                <div class="row">
                    <form role="form" action="php/add-new-group.php">
                        <div class="row">
                        <div class="col-lg-4 text-center">

                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <label for="sam">Samedi</label>
                                <input type="radio" name="jour" value="sam">
                                <label for="dim">Dimanche</label>
                                <input type="radio" name="jour" value="dim">
                                <input type="submit" name="submit" id="submit" value="Générer" class="btn btn-info pull-right">
                            </fieldset>
                            <hr>
                        </div>
                        </div>
                        <?php
                            if (isset($_GET['jour'])){
                                if ($_GET['jour']=="sam"){ 
                                    $teamNum = 5;
                                } elseif($_GET['jour']=="dim"){
                                    $teamNum = 6;
                                }
                                
                            }
                        ?>
                    </form>
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

</body>

</html>