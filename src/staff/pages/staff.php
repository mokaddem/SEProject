<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Joueur</title>

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
        
        $ID = $_SESSION['ID'];

        $reponse = $db->query('SELECT * FROM Personne WHERE '. $ID. ' = ID');
		$donnes = $reponse->fetch_array();
        ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12 noDeco">
                        <h1 class="page-header"><i class="fa fa-user"></i> <?=utf8_encode($_SESSION['NAME'])?></h1>
                    </div>
                </div>
                <!-- Registration form - START -->
                <div class="row">
                    <form role="form" method="GET" action="php/inc/edit-player.php">
                        <div class="col-lg-6">
                            <!-- <div class="well well-sm"><strong><span class="glyphicon glyphicon-ok"></span>Required Field</strong></div> -->
                            <div class="form-group">
                                <!--<label for="InputEmail">Email</label>-->
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <p type="text" class="form-control">
                                        <?=$donnes['BirthDate']?>
                                    </p>
                                </div>
                            </div>

                            <div class="form-group">
                                <!--<label for="InputPrenom">Adresse</label>-->
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                    <p type="text" class="form-control">
                                        <?=utf8_encode($donnes['Rue'])?>
                                    </p>
                                    <p type="text" class="form-control">
                                        <?=utf8_encode($donnes['Number'])?>
                                    </p>
                                    <p type="text" class="form-control">
                                        <?=utf8_encode($donnes['ZIPCode'])?>
                                    </p>
                                    <p type="text" class="form-control">
                                        <?=utf8_encode($donnes['Ville'])?>
                                    </p>
                                </div>
                            </div>

                            <div class="form-group">
                                <!--<label for="InputEmail">Email</label>-->
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                    <p type="text" class="form-control">
                                        <?=utf8_encode($donnes['Mail'])?>
                                    </p>
                                </div>
                            </div>

                            <div class="form-group">
                                <!--<label for="InputPhone">Numéro de téléphone</label>-->
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <p type="text" class="form-control">
                                        <?=$donnes['PhoneNumber']?>
                                    </p>

                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <p type="text" class="form-control">
                                        <?=$donnes['GSMNumber']?>
                                    </p>
                                </div>
                            </div>
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