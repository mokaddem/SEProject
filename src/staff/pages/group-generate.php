<!DOCTYPE html>
<!-- Page permettant de générer les poules, en choisissant la catégorie et le jour (se trouvant dans l'onglet Poules) -->
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Poule</title>

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
            include_once('php/BDD.php');

        ?>




            <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Générer les poules</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
            <?php if (array_key_exists("error", $_GET)) {?>
                    <div class="col-lg-5 alert alert-danger">
                    <?php if ($_GET["error"] == "no_selection") {?>
                    Veuillez selectionner un jour
                <?php } elseif ($_GET["error"] == "no_sam") { ?>
                        Les groupes du samedi ont déjà été générés
                    <a class="btn btn-danger pull-right" href="./reset.php">Supprimer</a>
                <?php } elseif ($_GET["error"] == "no_dim") { ?>
                        Les groupes du dimanche ont déjà été générés
                    <a class="btn btn-danger pull-right" href="./reset.php">Supprimer</a>
                <?php } ?>
                    </div>
            <?php } ?>
                </div>

                <!-- Registration form - START -->
                <div class="row">
                    <div class="col-lg-6 text-center">
                      <fieldset data-role="controlgroup" data-type="horizontal">
                          <form name="form" method="get" action="php/add-new-group.php">
                              <label for="sam">Samedi</label>
                              <input type="radio" name="jour" value="sam" onclick="document.form2.jour.value = this.value;" checked>
                              <label for="dim">Dimanche</label>
                              <input type="radio" name="jour" onclick="document.form2.jour.value = this.value;" value="dim">

                              <div class="form-group">
                                  <select class="form-control" id="InputCat" name="InputCat">
                                      <?php
                                      $db = BDconnect();
                                      $reponse = $db->query('SELECT * FROM Categorie');
                                      while ($donnes = $reponse->fetch_array())
                                      {
                                          echo "<option value=".$donnes['ID'].">".utf8_encode($donnes['Designation'])." ".$donnes['Age']."</option>";
                                      }
                                      ?>
                                  </select>
                              </div>
                              <input type="submit" name="submit" id="submit" value="Générer la poule sélectionnée" class="btn btn-info pull-right">
                          </form>
                          <form name="form2" action="./php/add-all-group.php">
                            <input class="hidden" type="text" name="jour" value="sam"/>
                            <button type="submit" class="btn btn-success pull-left">Tout générer pour ce jour <i class="fa fa-refresh"></i></button>
                          </form>
                        </fieldset>
                        <hr>
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
<?php $reponse->free(); ?>
</html>
