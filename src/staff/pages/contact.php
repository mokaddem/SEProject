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
                <div class="page-header">
                    <h1>Envoyer un mail</h1>
                </div>
            </div>
                <!-- Registration form - START -->
                    <div class="row">
                        <form role="form">
                            <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Destinataire (facultatif)" id="Destinataire">
                                <input type="checkbox" name="option1" value="Participants"> Participants<br/>
                                <input type="checkbox" name="option2" value="Propriétaires"> Propriétaires  
                            </div>                              
                            <div class="form-group">
                                  <!-- <label for="sel1"><span class="fa fa-user"></span> Message à tous les propriétaires</label> -->
                                    <input type="text" class="form-control" placeholder="Sujet" id="id" required data-validation-required-message="Veuillez entrer le sujet.">
                                  <br><textarea rows="15" cols="50" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Veuillez entrer votre message."></textarea>
                              </div>
                                <input type="submit" name="submitPlayers" id="submitPlayers" value="Envoyer" class="btn btn-info pull-center" >
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
