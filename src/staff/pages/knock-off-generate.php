<!DOCTYPE html>
<html lang="en">
<!-- Page de génération du tournoi knock-off -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Knock-off</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <?php
            include("./html/header.php");
            include_once('php/BDD.php');

        ?>

            <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Générer le tournoi de knock-off</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
            <?php if (array_key_exists("error", $_GET)) {?>
                    <div class="col-lg-4 alert alert-danger">
                    <?php if ($_GET["error"] == "no_selection") {?>
                    Veuillez selectionner un jour.
                <?php } elseif ($_GET["error"] == "no_sam") { ?>
                        Aucun vainqueur du samedi trouvé. <br/>
                        Ils doivent être choisis préalablement.
                <?php } elseif ($_GET["error"] == "no_dim") { ?>
                        Aucun vainqueur du dimanche trouvé. <br/>
                        Ils doivent être choisis préalablement.
                    <?php } elseif ($_GET["error"] == "yes_sam") { ?>
                        Le tournoi du samedi a déjà été généré.
                        <?php } elseif ($_GET["error"] == "yes_dim") { ?>
                        Le tournoi du dimanche a déjà été généré.
                        <?php } elseif ($_GET["error"] == "no_team") { ?>
                        Au moins un des groupe n'a pas de vainqueur.
                        <?php } ?>
                    </div>
            <?php } ?>
                </div>

                <!-- Registration form - START -->
                <div class="row">
                    <form role="form" method="get" action="php/add-new-knock-off.php">
                        <div class="row">
                        <div class="col-lg-4 text-center">

                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <label for="sam">Samedi</label>
                                <input type="radio" name="jour" value="sam">
                                <label for="dim">Dimanche</label>
                                <input type="radio" name="jour" value="dim">
                                <div class="form-group">
                                <select class="form-control" id="InputCat" name="InputCat">
                                    <?php
                                    $db = BDconnect();
                                    $reponse = $db->query('SELECT * FROM Categorie');
                                    while ($donnes = $reponse->fetch_array())
                                    {
                                        echo "<option value=".$donnes['ID'].">".utf8_encode($donnes['Designation'])." ".$donnes['Year']."</option>";
                                    }
                                    ?>
                                </select>
                                </div>

                                <input type="submit" name="submit" id="submit" value="Générer" class="btn btn-info pull-right">
                            </fieldset>
                            <hr>
                        </div>
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

</body>

</html>
