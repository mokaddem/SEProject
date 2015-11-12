<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Mode - Joueur</title>

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

		$db = new BDD();

        $reponse = $db->query('SELECT * FROM Personne pers, Player play WHERE '. $_GET['id']. ' = pers.ID');
		$donnes = $reponse->fetch_array();
        ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12 noDeco">
                        <h1 class="page-header"><a href="list.php?type=player"> Liste des participants</a> > Modifier</h1>
                    </div>
                </div>
                <!-- Registration form - START -->
                <div class="row">
                    <form role="form" method="GET" action="php/inc/edit-player.php">
                        <div class="col-lg-6">
                            <!-- <div class="well well-sm"><strong><span class="glyphicon glyphicon-ok"></span>Required Field</strong></div> -->
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
                                    <input type="text" class="form-control" id="InputNom" name="InputNom" placeholder="Nom" required>
                                    <input type="text" class="form-control" id="InputPrenom" name="InputPrenom" placeholder="Prenom" required>

                                    <span>Née le</span>
                                    <select name='birth_day' id='birth_day1'>
                                        <option value="na">Jour</option>
                                        <?php
                                        for ($i = 1; $i <= 31; $i++) {
                                            if (idate("d",strtotime($donnes['BirthDate'])) == $i){
                                                echo "<option selected=\"selected\">$i</option>";
                                            }
                                            else{
                                                echo "<option>$i</option>\n";
                                            }
                                        }

                                        ?>
                                    </select>
                                    <select name='birth_month' id='birth_month1'>
                                        <option value="na">Mois</option>
                                        <?php if (date("m",strtotime($donnes['BirthDate'])) == 1){ echo "<option value=\"1\" selected=\"selected\">Janvier</option>";} else {echo "<option value=\"1\">Janvier</option>";}
                                        if (date("m",strtotime($donnes['BirthDate'])) == 2){ echo "<option value=\"2\" selected=\"selected\">Février</option>";} else {echo "<option value=\"2\">Février</option>";}
                                        if (date("m",strtotime($donnes['BirthDate'])) == 3){ echo "<option value=\"3\" selected=\"selected\">Mars</option>";} else {echo "<option value=\"3\">Mars</option>";}
                                        if (date("m",strtotime($donnes['BirthDate'])) == 4){ echo "<option value=\"4\" selected=\"selected\">Avril</option>";} else {echo "<option value=\"4\">Avril</option>";}
                                        if (date("m",strtotime($donnes['BirthDate'])) == 5){ echo "<option value=\"5\" selected=\"selected\">Mai</option>";} else {echo "<option value=\"5\">Mai</option>";}
                                        if (date("m",strtotime($donnes['BirthDate'])) == 6){ echo "<option value=\"6\" selected=\"selected\">Juin</option>";} else {echo "<option value=\"6\">Juin</option>";}
                                        if (date("m",strtotime($donnes['BirthDate'])) == 7){ echo "<option value=\"7\" selected=\"selected\">Juillet</option>";} else {echo "<option value=\"7\">Juillet</option>";}
                                        if (date("m",strtotime($donnes['BirthDate'])) == 8){ echo "<option value=\"8\" selected=\"selected\">Aout</option>";} else {echo "<option value=\"8\">Aout</option>";}
                                        if (date("m",strtotime($donnes['BirthDate'])) == 9){ echo "<option value=\"9\" selected=\"selected\">Septembre</option>";} else {echo "<option value=\"9\">Septembre</option>";}
                                        if (date("m",strtotime($donnes['BirthDate'])) == 10){ echo "<option value=\"10\" selected=\"selected\">Octobre</option>";} else {echo "<option value=\"10\">Octobre</option>";}
                                        if (date("m",strtotime($donnes['BirthDate'])) == 11){ echo "<option value=\"11\" selected=\"selected\">Novembre</option>";} else {echo "<option value=\"11\">Novembre</option>";}
                                        if (date("m",strtotime($donnes['BirthDate'])) == 12){ echo "<option value=\"12\" selected=\"selected\">Décembre</option>";} else {echo "<option value=\"12\">Décembre</option>";} ?>
                                    </select>
                                    <select name='birth_year' id='birth_year1'>
                                        <option value="na">Année</option>
                                        <?php
                                        for ($i = idate('Y'); $i >= 1900; $i--) {
                                            if (idate("Y",strtotime($donnes['BirthDate'])) == $i){
                                                echo "<option selected=\"selected\">$i</option>\n";
                                            }
                                            else{
                                                echo "<option>$i</option>\n";
                                            }
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
                            <div class="form-group">
                                <label for="InputPhone">Déjà participé au tournoi?</label>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio">Oui
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio">Non
                                </label>
                            </div>
                            <div class="form-group">
                                <!--<label for="InputCredit">Paiement</label>-->
                                <label for="InputPhone">Montant à payer</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="15" disabled>
                                    <span class="input-group-addon">€</span>
                                </div>
                                <div class="input-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio">CB</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio">Paypal</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio">Chèque</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label for="InputMessage">Message</label>-->
                                <label>Préférence</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                                    <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5"></textarea>
                                </div>
                            </div>

                            <a class="btn btn-info" href="list.php?type=player">Retour</a>
                            <button type="submit" name="id" id="id" value="<?php echo $_GET['id'] ?>" class="btn btn-success pull-right">Sauvegarder</button>
                            <br/>
                            <br/>
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
            $('#InputNom').val('<?php echo $donnes["LastName"]; ?>');
            $('#InputPrenom').val('<?php echo $donnes["FirstName"]; ?>');
            $('#InputBirth').val('<?php echo $donnes["BirthDate"]; ?>');
            $('#InputAdresse').val('<?php echo $donnes["Rue"]; ?>');
            $('#InputCP').val('<?php echo $donnes["ZIPCode"]; ?>');
            $('#InputBat').val('<?php echo $donnes["Number"]; ?>');
            $('#InputLoc').val('<?php echo $donnes["Ville"]; ?>');
            $('#InputEmailFirst').val('<?php echo $donnes["Mail"]; ?>');
            $('#InputFixe').val('<?php echo $donnes["PhoneNumber"]; ?>');
            $('#InputMob').val('<?php echo $donnes["GSMNumber"]; ?>');
            $('#InputMessage').val('<?php echo $donnes["Note"]; ?>');
        });
    </script>
    <?php $reponse->free(); ?>
</body>

</html>