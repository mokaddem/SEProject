<!DOCTYPE html>
<!-- Page permettant d'envoyer des e-mails (se trouvant dans la catégorie commmunication) -->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Contact</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../dist/css/alicia.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <?php
            include("./html/header.php");
        include_once('php/BDD.php');

        $db = BDconnect();

        $listPart = $db->query("SELECT * FROM Personne where isPlayer = 1 ");
        $listProp = $db->query("SELECT * FROM Personne where isOwner = 1 ");
	
    ?>


            <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
                <div class="row">
                    <div class="page-header">
                        <h1>Envoyer un mail</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                    <!-- Registration form - START -->
                        <form role="form" name="conStaff"  id="conStaff" novalidate>
                            <div class="row">
                                <div class="col-lg-8">
                                    <input class="form-control" id="dest" placeholder="Destinataire" type="text">
                                </div>
                            </div>
            			<input type="checkbox" name="participant" value="partici">Participants</br>
            			<input type="checkbox" name="proprio" value="proprio">Propriétaires<br/>
                            <br/>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Sujet" id="sujet" required data-validation-required-message="Veuillez entrer le sujet.">
				<p class="help-block text-danger"></p>
                                <br>
                                <textarea rows="15" cols="50" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Veuillez entrer votre message."></textarea>
				<p class="help-block text-danger"></p>
                            </div>
                            <div id="contactStaff"></div>
                            <input type="submit" value="Envoyer" class="btn btn-primary pull-right" />
                        </form>
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
    <script src="../dist/js/alicia.js"></script>

    <script src="http://cdn.jsdelivr.net/typeahead.js/0.9.3/typeahead.min.js"></script>

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script src="../../js/contactStaff.js"></script>
    <script src="../../js/jqBootstrapValidation.js"></script>
 	<script>
                $(document).ready(function (e) {
                    var lis = $('.nav > li');
                    menu_focus(lis[0], 1);

                    $(".fancybox").fancybox({
                        padding: 10,
                        helpers: {
                            overlay: {
                                locked: false
                            }
                        }
                    });

                });
            </script>
	    <script type="text/javascript">
                <!--
                $('#myModal').modal('show');
                //-->
            </script>
	    <script src="../../js/html5shiv.js"></script>
            <script src="../../js/jquery-1.10.2.min.js"></script>
            <script src="../../js/jquery-migrate-1.2.1.min.js"></script>
            <script src="../../js/bootstrap.min.js"></script>
            <script src="../../js/jquery.easing.1.3.js"></script>
            <script type="text/javascript" src="../../../fancybox/jquery.fancybox.pack-v=2.1.5.js"></script>
            <script src="../../js/script.js"></script>
</body>

</html>
