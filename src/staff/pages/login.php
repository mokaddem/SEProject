<?php session_start(); ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        if (array_key_exists("action", $_GET)) {
            if ($_GET["action"] == "logout") {
                $_SESSION=array(); 
                session_unset(); 
                session_destroy();
            }
        }
        
        if (array_key_exists("ID", $_SESSION)) {
            header("Location: ./index.php");
        }
    ?>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Admin Mode - Login</title>

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

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Connectez-vous <a href="../../index.php" class="btn btn-default pull-right">Accueil</a></h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="Post" action="php/test-password.php">

                                <fieldset>

                                    <div class="form-group">
                                        <input class="form-control" placeholder="User Name" id="username" name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" id="password" name="password" type="password" value="">
                                    </div>
                                    <!--<div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Se</input>
                                    </label>
                                </div>-->
                                    <!-- Change this to a button or input when using this as a form -->
                                    <!--          <a href="test-password.php" class="btn btn-lg btn-success btn-block">Login</a> -->
                                    <input type="submit" class="btn btn-lg btn-success btn-block" value="Login" />
                                </fieldset>
                            </form>
                            <?php
                                if (array_key_exists("error", $_GET)) {
                                    $_SESSION=array(); 
                                    session_unset(); 
                                    session_destroy();
                            ?>
                                <div class='text-danger'>
                                    <h3>Erreur</h3>
                                    <?php
                                    if ($_GET["error"] == "identifiants") {
                            ?>
                                        Utilisateur ou mot de passe incorrect
                                        <?php
                                    } else if ($_GET["error"] == "reject") {
                            ?>
                                            Vous n'avez pas les droits suffisant pour visiter cette page";
                                            <?php } ?>
                                </div>
                                <?php    }  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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