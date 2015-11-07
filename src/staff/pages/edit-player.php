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

		$db = new BDD();
		$reponse = $db->query('SELECT * FROM Personne pers, Player play WHERE '. $_GET['id']. ' = pers.ID');
		$donnes = $reponse->fetch_array();
        ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12 noDeco">
                        <h1 class="page-header"><a href="list-player.php"> Liste des participants</a> > Modifier</h1>
                    </div>
                </div>
                <!-- Registration form - START -->
                <div class="row">
                    <form role="form">
                        <div class="col-lg-6">
                            <!-- <div class="well well-sm"><strong><span class="glyphicon glyphicon-ok"></span>Required Field</strong></div> -->
                            <div class="form-group">
                                <!--<label for="sel1">Titre:</label>-->
                                <select class="form-control" id="sel1">
                                    <option>M.</option>
                                    <option>Mme.</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <!--<label for="InputNom">Nom</label>-->
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" id="InputNom" placeholder="Nom" required>
                                    <input type="text" class="form-control" id="InputPrenom" placeholder="Prenom" required>
                                    <input type="text" class="form-control" id="InputBirth" placeholder="Née le jj/mm/aaaa" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label for="InputPrenom">Adresse</label>-->
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" class="form-control" id="InputAdresse" placeholder="Adresse" required>
                                    <input type="text" class="form-control" id="InputBat" placeholder="Numero - Batiment">
                                    <input type="text" class="form-control" id="InputCP" placeholder="Code Postal" required>
                                    <input type="text" class="form-control" id="InputLoc" placeholder="Localité">
                                </div>
                            </div>

                            <div class="form-group">
                                <!--<label for="InputEmail">Email</label>-->
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                    <input type="email" class="form-control" id="InputEmailFirst" name="InputEmail" placeholder="Email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <!--<label for="InputPhone">Numéro de téléphone</label>-->
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" class="form-control bfh-phone" placeholder="+33 fixe" id="fixnumber">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" class="form-control bfh-phone" placeholder="+33 mobile" id="gsmnumber" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Classement </label>
                                <select class="form-control" id="sel1">
                                    <option>NC</option>
                                    <option>Trofor</option>
                                </select>
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
                            <!--<div class="form-group">
                                    <!--<label for="InputNamePartner">Enter Name Partner</label>-->
                            <!--<div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                        <input type="text" class="form-control" name="InputNamePartner" id="InputNamePartner" placeholder="Nom du partenaire" required>
                                    </div>
                                </div>-->
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
                                <div class="input-group">
                                    <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-ok"></span></span>
                                </div>
                            </div>

                            <a class="btn btn-info" href="list-player.php">Retour</a>
                            <input type="submit" name="edit-submit" id="edit-submit" value="Sauvegarder" class="btn btn-success pull-right">
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
            $('#InputBat').val('<?php echo $donnes["Ville"]; ?>');
            $('#InputCP').val('<?php echo $donnes["ZIPCode"]; ?>');
            $('#InputLoc').val('<?php echo $donnes["Ville"]; ?>');
            $('#InputEmailFirst').val('<?php echo $donnes["Mail"]; ?>');
            $('#fixnumber').val('<?php echo $donnes["PhoneNumber"]; ?>');
            $('#gsmnumber').val('<?php echo $donnes["GSMNumber"]; ?>');
        });
    </script>
    <?php $reponse->free(); ?>
</body>

</html>