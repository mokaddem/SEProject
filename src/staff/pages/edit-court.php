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
	    include_once('php/BDD.php');
	    $db = new BDD();
        ?>


        <div id="page-wrapper">
            <div class="container">

                <div class="page-header">
                    <h1>Modifier un terrain</h1>
                </div>

                <!-- Registration form - START -->
                <div class="container">
                    <div class="row">
                        <form role="form" method="Get" action="php/edit-court.php">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-circle-thin"></i></span>
                                        <select class="form-control" id="sel1" name="sel1">
                                            <?php if ($_GET['type'] == "Terre battue")
							echo "<option selected=\"selected\">Terre battue</option>";						
						else echo "<option>Terre battue</option>";
					    ?>
                                            <?php if ($_GET['type'] == "Gazon")
							echo "<option selected=\"selected\">Gazon</option>";						
						else echo "<option>Gazon</option>";
					    ?>
                                            <?php if ($_GET['type'] == "Synthétique")
							echo "<option selected=\"selected\">Synthétique</option>";						
						else echo "<option>Synthétique</option>";
					    ?>
                                        </select>
                                        <select class="form-control" id="sel2" name="sel2">
					    <?php if ($_GET['etat'] == "Neuf")
							echo "<option selected=\"selected\">Neuf</option>";						
						else echo "<option>Neuf</option>";
					    ?>
                                            <?php if ($_GET['etat'] == "Passable")
							echo "<option selected=\"selected\">Passable</option>";						
						else echo "<option>Passable</option>";
					    ?>
                                            <?php if ($_GET['etat'] == "Usé")
							echo "<option selected=\"selected\">Usé</option>";						
						else echo "<option>Usé</option>";
					    ?>
                                        </select>
                                        <input type="number" class="form-control" name="surface" id="surface" placeholder="Surface (m²)" min="0" step="1" value="<?php echo $_GET['surface'] ?>" required>
                        	    </div>
                                 <div class="form-group">
                                  <label for="sel1"><span class="fa fa-user"></span> Propriétaire</label>
                                  <select class="form-control" id="sel3" name="sel3">
				    <?php
					$reponse = $db->query('SELECT *, Owner.ID as O_id FROM Personne, Owner WHERE Personne.ID = Owner.ID_Personne');
					while ($donnes = $reponse->fetch_array())
					{										
						if ($_GET['O_id'] == $donnes['O_id']){
							echo "<option value=".$donnes['O_id']." selected=\"selected\">".$donnes['FirstName']." ".$donnes['LastName']."</option>";
						}						
						echo "<option value=".$donnes['O_id'].">".$donnes['FirstName']." ".$donnes['LastName']."</option>";
					}
			 	    ?>	
                                  </select>
                                </div>
				
				<div class="form-group">
                                    <!--<label for="InputPrenom">Adresse</label>-->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        <input type="text" class="form-control" id="InputAdresse" name="InputAdresse" placeholder="Adresse" value="<?php echo $_GET['adresse'] ?>" required>
                                    </div>
                                </div>

				 <div class="form-group">
                                    <!--<label for="InputMessage">Message</label>-->
                                    <div class="input-group">
                                        <textarea name="InputNote" id="InputNote" class="form-control" rows="5" required><?php echo $_GET['note'] ?></textarea>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-ok"></span></span>
                                    </div>
                                </div>
                                                                
                                <input type="submit" name="submit" id="submit" value="Ajouter" class="btn btn-info pull-right">

                            </div>
                        </form>
                        <div class="col-lg-5 col-md-push-1">
                            <div class="col-md-12">
                                <div class="alert alert-success">
                                    <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
                                </div>
                                <div class="alert alert-danger">
                                    <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>
