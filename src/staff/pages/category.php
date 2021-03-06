<!DOCTYPE html>
<!-- Ajout d'une catégorie -->
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Catégorie</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

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
        ?>


            <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
                <div class="container">

                    <div class="page-header">
                        <h1>Ajouter une catégorie</h1>
                    </div>

                        <div class="row">
                            <!-- Registration form - START -->
                            <form role="form" method="Get" action="php/add-new-category.php">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="basic-addon1">De: </span>
                                              <input type="number" class="form-control" id="De" name="De" placeholder="(âge min)"/>
                                              <span class="input-group-addon" id="basic-addon1">À: </span>
                                              <input type="number" class="form-control" id="A" name="A" placeholder="(âge max)"/>
                                            </div>
                                            <input type="text" class="form-control" id="Designation" name="Designation" placeholder="Nom" required>

                                        </div>
                                    </div>

                                <input type="submit" name="add-submit" id="add-submit" name="Year" value="Créer" class="btn btn-info pull-left">
                            </form>
                            <!-- Registration form - END -->
                        </div>

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
