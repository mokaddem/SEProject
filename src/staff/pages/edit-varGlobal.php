<!DOCTYPE html>
<!-- Page de modification d'extra selectionné dans la liste -->
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Extras</title>

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
            $db = BDconnect();
        
            if (array_key_exists("Name",$_GET)) {
                $reponse = $db->query('SELECT * FROM GlobalVariables WHERE \''. $_GET['Name']. '\' = Name');
            } else {
                $reponse = $db->query('SELECT * FROM GlobalVariables WHERE ' . $_GET['id']. ' = id');
            }
            $donnes = $reponse->fetch_array();
        ?>


            <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
                <div class="row">
                    <div class="col-lg-12 noDeco">
                        <h1 class="page-header"><a href="listVarGlobal.php">Gestion des variables</a> > Modifier</h1>
                    </div>
                </div>

                <!-- Registration form - START -->
                <div class="row">
                    <form role="form" method="Get" action="php/inc/edit-varGlobal.php">
                        <div class="col-lg-6">
                            <!-- <div class="well well-sm"><strong><span class="glyphicon glyphicon-ok"></span>Required Field</strong></div> -->

                            <div class="form-group">
                                <!--<label for="InputNom">Nom</label>-->
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" class="form-control" name="InputNom" id="InputNom" value="<?=$donnes["Name"]?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label for="InputMessage">Message</label>-->
                                <div class="input-group">
                                    <textarea name="InputValue" id="InputValue" class="form-control" rows="5" required><?php echo utf8_encode($donnes["Value"]); ?></textarea>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-edit"></span></span>
                                </div>
                            </div>

                            <a class="btn btn-info" href="listVarGlobal.php">Retour</a>
                            <button class="btn btn-success pull-right" type="submit" name="id" id="id" value="<?=$donnes["id"]?>">Sauvegarder</button>

                        </div>
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('#InputNom').val("<?php echo utf8_encode($donnes["Name"]); ?>");
            $('#InputPrice').val("<?php echo $donnes["Price"]; ?>");
        });
    </script>

</body>
<?php $reponse->free(); ?>
</html>