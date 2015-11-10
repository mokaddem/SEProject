<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Mode - Catégorie</title>

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
        ?>


            <div id="page-wrapper">
                <div class="container">

                    <div class="page-header">
                        <h1>Ajouter une catégorie</h1>
                    </div>

                    <!-- Registration form - START -->
                    <div class="container">
                        <div class="row">
                            <form role="form" method="Get" action="php/add-new-category.php">
                                <div class="col-lg-6">
                                    <!-- <div class="well well-sm"><strong><span class="glyphicon glyphicon-ok"></span>Required Field</strong></div> -->

                                    <div class="form-group">
                                        <!--<label for="InputNom">Année</label>-->
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                            <select class="form-control" name='Year' id='Year'>
                                                <option value="na">Année</option>
                                                <?php
                                                      for ($i = date("Y"); $i <= 2500; $i++) {
                                                        echo "<option>$i</option>\n";
                                                      }
                                                ?>
                                            </select>
                                            <input type="text" class="form-control" id="Designation" name="Designation" placeholder="Nom" required>
                                    
                                        </div>
                                    </div>

                                <input type="submit" name="add-submit" id="add-submit" name="Year" value="Créer" class="btn btn-info pull-right">
                            </form>
                        </div>
                    </div>
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