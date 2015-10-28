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
            include("./html/header.html");
        ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ajouter une paire</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                <!-- Registration form - START -->
                    <div class="row">
                        <div class="col-lg-6">
                        <form role="form" method="Get" action="php/add-new-pair.php">
                            <div class="col-lg-9">
                                <!-- <div class="well well-sm"><strong><span class="glyphicon glyphicon-ok"></span>Required Field</strong></div> -->

                                <!-- <div class="form-group">
                                  <label for="sel1">Je m'inscire en tant que </label>
                                  <select class="form-control" id="sel1">
                                    <option>participant</option>
                                    <option>propriétaire</option>
                                  </select>
                                </div> -->
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
                                        <input type="text" class="form-control" Nom="InputNom" id="InputNom1" placeholder="Nom" required>
                                        <input type="text" class="form-control" Prenom="InputPrenom" id="InputPrenom1" placeholder="Prenom" required>
                                        <input type="text" class="form-control" id="InputBirth1" placeholder="Née le jj/mm/aaaa" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!--<label for="InputPrenom">Adresse</label>-->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        <input type="text" class="form-control" id="InputAdresse1" placeholder="Adresse" required>
                                        <input type="text" class="form-control" id="InputBat1" placeholder="Numero - Batiment">
                                        <input type="text" class="form-control" id="InputCP1" placeholder="Code Postal" required>
                                        <input type="text" class="form-control" id="InputLoc1" placeholder="Localité">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!--<label for="InputEmail">Email</label>-->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                        <input type="email" class="form-control" id="InputEmailFirst1" name="InputEmail" placeholder="Email" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!--<label for="InputPhone">Numéro de téléphone</label>-->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input type="text" class="form-control bfh-phone" id="InputFixe1" placeholder="+33 fixe">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input type="text" class="form-control bfh-phone" id="InputMob1" placeholder="+33 mobile" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="sel2">Classement </label>
                                  <select class="form-control" id="sel2">
                                    <option>NC</option>
                                    <option>Trofor</option>
                                  </select>
                                </div>     
                                <div class="form-group">
                                    <label for="InputPhone">Déjà participé au tournoi?</label>
                                    <label class="radio-inline">
                                      <input id="InputPartYes1" type="radio" name="optradio">Oui
                                    </label>
                                    <label class="radio-inline">
                                      <input id="InputPartNo1" type="radio" name="optradio">Non
                                    </label>
                                </div>
                                <!-- <div class="form-group"> -->
                                    <!--<label for="InputNamePartner">Enter Name Partner</label>-->
                                    <!-- <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                        <input type="text" class="form-control" name="InputNamePartner" id="InputNamePartner" placeholder="Nom du partenaire" required>
                                    </div> -->
                                <!-- </div>                 -->
                                <div class="form-group">
                                    <!--<label for="InputCredit">Paiement</label>-->
                                    <label for="InputPhone">Montant à payer</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" placeholder="15" disabled>
                                      <span class="input-group-addon">€</span>
                                    </div>
                                    <div class="input-group">
                                        <label class="radio-inline"><input type="radio" name="optradio">CB</label>
                                        <label class="radio-inline"><input type="radio" name="optradio">Paypal</label>
                                        <label class="radio-inline"><input type="radio" name="optradio">Chèque</label> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!--<label for="InputMessage">Message</label>-->
                                    <div class="input-group">
                                        <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-ok"></span></span>
                                    </div>
                                </div>

                            </div>
                        </form>
                        </div>
                        <div class="col-lg-6">
                        <form role="form">
                            <div class="col-lg-9">
                                <!-- <div class="well well-sm"><strong><span class="glyphicon glyphicon-ok"></span>Required Field</strong></div> -->

                                <!-- <div class="form-group">
                                  <label for="sel1">Je m'inscire en tant que </label>
                                  <select class="form-control" id="sel1">
                                    <option>participant</option>
                                    <option>propriétaire</option>
                                  </select>
                                </div> -->
                                <div class="form-group">
                                  <!--<label for="sel1">Titre:</label>-->
                                  <select class="form-control" id="sel3">
                                    <option>M.</option>
                                    <option>Mme.</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                    <!--<label for="InputNom">Nom</label>-->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" Nom="InputNom" id="InputNom2" placeholder="Nom" required>
                                        <input type="text" class="form-control" Prenom="InputPrenom" id="InputPrenom2" placeholder="Prenom" required>
                                        <input type="text" class="form-control" id="InputBirth2" placeholder="Née le jj/mm/aaaa" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!--<label for="InputPrenom">Adresse</label>-->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        <input type="text" class="form-control" id="InputAdresse2" placeholder="Adresse" required>
                                        <input type="text" class="form-control" id="InputBat2" placeholder="Numero - Batiment">
                                        <input type="text" class="form-control" id="InputCP2" placeholder="Code Postal" required>
                                        <input type="text" class="form-control" id="InputLoc2" placeholder="Localité">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!--<label for="InputEmail">Email</label>-->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                        <input type="email" class="form-control" id="InputEmailFirst2" name="InputEmail" placeholder="Email" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!--<label for="InputPhone">Numéro de téléphone</label>-->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input type="text" class="form-control bfh-phone" id="InputFixe2" placeholder="+33 fixe">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input type="text" class="form-control bfh-phone" id="InputMob2" placeholder="+33 mobile" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="sel4">Classement </label>
                                  <select class="form-control" id="sel4">
                                    <option>NC</option>
                                    <option>Trofor</option>
                                  </select>
                                </div>     
                                <div class="form-group">
                                    <label for="InputPhone">Déjà participé au tournoi?</label>
                                    <label class="radio-inline">
                                      <input id="InputPartYes2" type="radio" name="optradio">Oui
                                    </label>
                                    <label class="radio-inline">
                                      <input id="InputPartNo2" type="radio" name="optradio">Non
                                    </label>
                                </div>
                                <!-- <div class="form-group"> -->
                                    <!--<label for="InputNamePartner">Enter Name Partner</label>-->
                                    <!-- <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                        <input type="text" class="form-control" name="InputNamePartner" id="InputNamePartner" placeholder="Nom du partenaire" required>
                                    </div>
                                </div> -->                
                                <div class="form-group">
                                    <!--<label for="InputCredit">Paiement</label>-->
                                    <label for="InputPhone">Montant à payer</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" placeholder="15" disabled>
                                      <span class="input-group-addon">€</span>
                                    </div>
                                    <div class="input-group">
                                        <label class="radio-inline"><input type="radio" name="optradio">CB</label>
                                        <label class="radio-inline"><input type="radio" name="optradio">Paypal</label>
                                        <label class="radio-inline"><input type="radio" name="optradio">Chèque</label> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!--<label for="InputMessage">Message</label>-->
                                    <div class="input-group">
                                        <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-ok"></span></span>
                                    </div>
                                </div>
                            </div>
				<div class="col-lg-offset-5 col-lg-2">
             				<input type="submit" name="submit" id="submit" value="Valider" class="btn btn-info">
          		  	</div>
                        </form>
                        </div>
                    

            </div>
                <!-- Registration form - END -->

                </div>
            <!-- /.row -->
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <br/><br/>
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
