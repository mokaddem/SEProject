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
            <div class="container">

                <div class="page-header">
                    <h1>Ajouter un Staffer</h1>
                </div>

                <!-- Registration form - START -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                        <form role="form">
                            <div class="col-lg-9">
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
                                        <input type="text" class="form-control" Nom="InputNom" id="InputNom" placeholder="Nom" required>
                                        <input type="text" class="form-control" Prenom="InputPrenom" id="InputPrenom" placeholder="Prenom" required>
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
                                        <input type="text" class="form-control bfh-phone"  placeholder="+33 fixe">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input type="text" class="form-control bfh-phone"  placeholder="+33 mobile" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!--<label for="InputMessage">Message</label>-->
                                    <div class="input-group">
                                        <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-ok"></span></span>
                                    </div>
                                </div>

                                <input type="submit" name="submit" id="submit" value="Valider" class="btn btn-info pull-right">

                            </div>
                        </form>
                        </div>
                        
                    
                        <!--<div class="col-lg-5 col-md-push-1">
                            <div class="col-md-12">
                                <div class="alert alert-success">
                                    <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
                                </div>
                                <div class="alert alert-danger">
                                    <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
                <!-- Registration form - END -->

                </div>
            <!-- /.row -->
        </div>
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
