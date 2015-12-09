<!DOCTYPE html>
<html lang="en">
<!-- Page d'ajout d'un match -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Match</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../../images/icon.ico">

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
        ?>


            <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Créer un match</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <?php if (array_key_exists("error", $_GET)) {?>
                        <div class="col-lg-4 alert alert-danger">
                            <b>Erreur</b>
                            <?php if ($_GET["error"] == "player") {?>
                                Vous devez choisir deux équipes différentes.
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <!-- Registration form - START -->
                <div class="row">
                    <form role="form" method="GET" action="php/add-new-match.php">
                        <div class="col-lg-6">
                            <!-- <div class="well well-sm"><strong><span class="glyphicon glyphicon-ok"></span>Required Field</strong></div> -->

                            <div class="form-group">
                                <label for="sel1"><span class="fa fa-users"></span> Première équipe</label>
                                <select class="form-control" name="InputEq1" id="InputEq1">
                                    <?php
										$db = BDConnect();
										$reponse = $db->query('SELECT * FROM Team');
										while ($donnes = $reponse->fetch_array())
										{
                                            $p = $db->query('SELECT * FROM Personne WHERE '.$donnes['ID_Player1'].' = ID');
                                            $p1 = $p->fetch_array();
                                            $p = $db->query('SELECT * FROM Personne WHERE '.$donnes['ID_Player2'].' = ID');
											$p2 = $p->fetch_array();
                                            echo "<option value=".$donnes['ID'].">".utf8_encode($p1['FirstName'])." ".utf8_encode($p1['LastName'])." & ".utf8_encode($p2['FirstName'])." ".utf8_encode($p2['LastName'])."</option>";
										}
			 	    				?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sel1"><span class="fa fa-users"></span> Seconde équipe</label>
                                <select class="form-control" name="InputEq2" id="InputEq2">
                                    <?php
										$db = BDconnect();
										$reponse = $db->query('SELECT * FROM Team');
										while ($donnes = $reponse->fetch_array())
										{
                                            $p = $db->query('SELECT * FROM Personne WHERE '.$donnes['ID_Player1'].' = ID');
                                            $p1 = $p->fetch_array();
                                            $p = $db->query('SELECT * FROM Personne WHERE '.$donnes['ID_Player2'].' = ID');
											$p2 = $p->fetch_array();
                                            echo "<option value=".$donnes['ID'].">".utf8_encode($p1['FirstName'])." ".utf8_encode($p1['LastName'])." & ".utf8_encode($p2['FirstName'])." ".utf8_encode($p2['LastName'])."</option>";
										}
			 	    				?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sel1"><span class="fa fa-map-marker"></span> Lieu</label>

                                <select class="form-control" name="InputCourt" id="InputCourt">
                                    <?php
										$db = BDconnect();
										$reponse = $db->query('SELECT * FROM Terrain');
										while ($donnes = $reponse->fetch_array())
										{
											echo "<option value=".$donnes['ID'].">".utf8_encode($donnes['adresse'])." - ".utf8_encode($donnes['etat'])."</option>";
										}
			 	    				?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1"><span class="fa fa-clock-o"></span> Date & Heure</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <?php
                                        echo '<input type="date" min="'.date("Y-m-d").'" max="2048-10-10" id="InputDate" name="InputDate" value="'.date("Y-m-d").'">';
                                        echo '<input type="time" id="InputHour" name="InputHour" value="'.date("H:i").'">';
                                    ?>
                                </div>
                            </div>

                            <input type="submit" name="submit" id="submit" value="Créer" class="btn btn-info pull-right">

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
<?php $reponse->free(); $p->free(); ?>

</html>
