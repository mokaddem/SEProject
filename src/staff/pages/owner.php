<!DOCTYPE html>
<html lang="en">
<!-- Page d'ajout d'un propriétaire -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Propriétaire</title>

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
                <div class="container col-lg-12">

                    <div class="page-header">
                        <h1>Ajouter un propriétaire</h1>
                    </div>

                    <!-- Registration form - START -->
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" method="Get" action="php/add-new-owner.php">
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <!--<label for="sel1">Titre:</label>-->
                                            <select class="form-control" id="title" name="title">
                                                <option value="1">M.</option>
                                                <option value="2">Mme.</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <!--<label for="InputNom">Nom</label>-->
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="text" class="form-control" Nom="InputNom" id="InputNom" name="InputNom" placeholder="Nom" required>
                                                <input type="text" class="form-control" Prenom="InputPrenom" id="InputPrenom" name="InputPrenom" placeholder="Prenom" required>
                                                <span>Né(e)le </span>
                                                <select name='birth_day' id='birth_day1'>
                                                    <option value="na">Jour</option>
                                                    <?php
                                                  for ($i = 1; $i <= 31; $i++) {
                                                        echo "<option>$i</option>\n";
                                                      }

                                                ?>
                                                </select>
                                                <select name='birth_month' id='birth_month1'>
                                                    <option value="na">Mois</option>
                                                    <option value="1">Janvier</option>
                                                    <option value="2">Fevrier</option>
                                                    <option value="3">Mars</option>
                                                    <option value="4">Avril</option>
                                                    <option value="5">Mai</option>
                                                    <option value="6">Juin</option>
                                                    <option value="7">Juillet</option>
                                                    <option value="8">Aout</option>
                                                    <option value="9">Septembre</option>
                                                    <option value="1°">Octobre</option>
                                                    <option value="11">Novembre</option>
                                                    <option value="12">Decembre</option>
                                                </select>
                                                <select name='birth_year' id='birth_year1'>
                                                    <option value="na">Année</option>
                                                    <?php
                                                  for ($i = date('Y'); $i >= 1900; $i--) {
                                                    echo "<option>$i</option>\n";
                                                  }
                                            ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!--<label for="InputPrenom">Adresse</label>-->
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                <input type="text" class="form-control" id="InputAdresse" name="InputAdresse" placeholder="Adresse" required>
                                                <input type="text" class="form-control" id="InputBat" name="InputBat" placeholder="Numero - Batiment">
                                                <input type="text" class="form-control" id="InputCP" name="InputCP" placeholder="Code Postal" required>
                                                <input type="text" class="form-control" id="InputLoc" name="InputLoc" placeholder="Localité">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <!--<label for="InputEmail">Email</label>-->
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                                <input type="email" class="form-control" id="InputEmailFirst" name="InputEmailFirst" placeholder="Email" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <!--<label for="InputPhone">Numéro de téléphone</label>-->
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                <input type="text" class="form-control bfh-phone" placeholder="+33 fixe" id="InputFixe" name="InputFixe">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                <input type="text" class="form-control bfh-phone" placeholder="+33 mobile" id="InputMob" name="InputMob" required>
                                            </div>
                                        </div>

                                        <input type="submit" name="submit" id="submit" value="Valider" class="btn btn-info pull-right">

                                    </div>
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
    <br/>
    <br/>
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
