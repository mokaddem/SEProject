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
        ?>


        <div id="page-wrapper">
            <div class="container">

                <div class="page-header">
                    <h1>Modifier une équipe</h1>
                </div>

                <!-- Registration form - START -->
                <div class="container">
                    <div class="row">
                        <form role="form" method="Get" action="php/inc/edit-team.inc">
                            <div class="col-lg-6">                              
                                <div class="form-group">
                                  <label for="sel1"><span class="fa fa-user"></span> Premier joueur</label>
                                  <select class="form-control" id="sel1" name="sel1">
				    <?php
					$db = new BDD();
					$reponse = $db->query('SELECT * FROM Personne ');
					while ($donnes = $reponse->fetch_array())
					{
						if ($_GET['id1'] == $donnes['ID']){
							echo "<option value=".$donnes['ID']." selected=\"selected\">".$donnes['FirstName']." ".$donnes['LastName']."</option>";
						}						
						echo "<option value=".$donnes['ID'].">".$donnes['FirstName']." ".$donnes['LastName']."</option>";
					}
			 	    ?>	
                                    <!-- <option>propriétaire</option> -->
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="sel1"><span class="fa fa-user"></span> Second joueur</label>
                                  <select class="form-control" id="sel2" name="sel2">
				    <?php
					$db = new BDD();
					$reponse = $db->query('SELECT * FROM Personne ');
					while ($donnes = $reponse->fetch_array())
					{
						if ($_GET['id2'] == $donnes['ID']){
							echo "<option value=".$donnes['ID']." selected=\"selected\">".$donnes['FirstName']." ".$donnes['LastName']."</option>";
						}						
						echo "<option value=".$donnes['ID'].">".$donnes['FirstName']." ".$donnes['LastName']."</option>";
					}
			 	    ?>	
                                  </select>
                                </div>

                                <a class="btn btn-info" href="list-team.php">Retour</a>
                                <input type="submit" name="submit" id="submit" value="Sauvegarder" class="btn btn-success pull-right">

                            </div>
                        </form>
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
