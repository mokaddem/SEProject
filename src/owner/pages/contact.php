<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Owner Mode - Contact</title>

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


            <div id="page-wrapper">
                <div class="row">
                    <div class="page-header">
                        <h1>Envoyer un mail</h1>
                    </div>
                </div>
                <!-- Registration form - START -->
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" method="POST" id="conStaff" action="php/contact-send.php">
                            <div class="row">
                                <div class="col-lg-8"><input class="form-control" id="dest" placeholder="Destinataire" type="text">
                                </div>
                            </div>
                            <div id="listPart" class="collapse">
                                <p>
                                    <?php
                  while ($row = $listPart->fetch_object()){ ?>
                                        <?php echo $row->Mail; ?>,
                                            <?php }
                  ?>
                                </p>

                            </div>
                            <div id="listProp" class="collapse">
                                <p>
                                    <?php
                      while ($row = $listProp->fetch_object()){ ?>
                                        <?php echo $row->Mail; ?>,
                                            <?php }
                      ?>
                                </p>
                            </div>

                            <br/>
                            <div class="form-group">
                                <!-- <label for="sel1"><span class="fa fa-user"></span> Message à tous les propriétaires</label> -->
                                <input type="text" class="form-control" placeholder="Sujet" id="sujet" required data-validation-required-message="Veuillez entrer le sujet.">
                                <br>
                                <textarea rows="15" cols="50" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Veuillez entrer votre message."></textarea>
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
    <script src="js/contactStaff.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
</body>

</html>