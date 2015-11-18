<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Extra</title>

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
                        <h1>Ajouter un extra</h1>
                    </div>

                    <!-- Registration form - START -->
                    <div class="container">
                        <div class="row">
                            <form role="form" method="Get" action="php/add-new-extra.php">
                                <div class="col-lg-6">
                                    <!-- <div class="well well-sm"><strong><span class="glyphicon glyphicon-ok"></span>Required Field</strong></div> -->

                                    <div class="form-group">
                                        <!--<label for="InputNom">Nom</label>-->
                                        <input type="text" class="form-control" name="InputNom" id="InputNom" placeholder="Nom" required>
                                    </div>

                                    <div class="form-group">
                                        <!--<label for="InputPrice">Prix</label>-->
                                        <div class="input-group">
                                            <input type="price" class="form-control" id="InputPrice" name="InputPrice" placeholder="Prix" required>
                                            <span class="input-group-addon">€</span>
                                        </div>
                                    </div>

                                    <!-- Number = 0 --!>
                                
                                <div class="form-group">
                                    <!--<label for="InputMessage">Message</label>-->
                                    <div class="input-group">
                                        <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" placeholder="Description" required></textarea>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-ok"></span></span>
                                    </div>
                                </div>

                                <input type="submit" name="edit-submit" id="edit-submit" value="Valider" class="btn btn-info pull-right">
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