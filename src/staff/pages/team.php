<!DOCTYPE html>
<html lang="en">
<!-- Page d'ajout d'une équipe en selectionnant deux joueurs qui n'ont pas d'équipe -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Equipe</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        <?php
            include("./html/header.php");
	    	include_once('php/BDD.php');
            include_once('php/test-delete.php');
        ?>


            <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Créer une équipe</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <?php if (array_key_exists("error", $_GET)) {?>
                        <div class="col-lg-4 alert alert-danger">
                            <b>Erreur</b>
                            <?php if ($_GET["error"] == "player") {?>
                                Vous devez choisir deux joueurs différents.
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <!-- Registration form - START -->
                <div class="row">
                    <form role="form" method="Get" action="php/add-new-team.php">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="sel1"><span class="fa fa-user"></span> Premier joueur</label>
                                <select class="form-control" id="sel1" name="sel1">
                                    <?php
										$db = BDconnect();
										$reponse = $db->query('SELECT * FROM Personne WHERE isPlayer=1');
										while ($donnes = $reponse->fetch_array())
										{
                                            if (canDeletePlayer($donnes['ID'])){
                                                echo "<option value=".$donnes['ID'].">".utf8_encode($donnes['FirstName'])." ".utf8_encode($donnes['LastName'])."</option>";
                                            }
										}
			 	    				?>
                                        <!-- <option>propriétaire</option> -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sel2"><span class="fa fa-user"></span> Second joueur</label>
                                <select class="form-control" id="sel2" name="sel2">
                                <?php
            										  $db = BDconnect();
              										$reponse = $db->query('SELECT * FROM Personne WHERE isPlayer=1');
                                  while ($donnes = $reponse->fetch_array())
              										{
                                    $player = $db->query('SELECT * FROM Player WHERE '.$donnes['ID'].' = ID_Personne');
                                    $player = $player->fetch_array();
                                    if (canDeletePlayer($donnes['ID'])){
    									                  echo "<option value=".$donnes['ID'].">".utf8_encode($donnes['FirstName'])." ".utf8_encode($donnes['LastName'])." [".utf8_encode($player['Ranking'])."]</option>";

                                    }
                                }
                                  ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sel2"><span class="fa fa-user"></span> Catégorie</label>
                                <select class="form-control" id="InputCat" name="InputCat">
                                    <?php
										$db = BDconnect();
										$reponse = $db->query('SELECT * FROM Categorie');
										while ($donnes = $reponse->fetch_array())
										{
										    echo "<option value=".$donnes['ID'].">".utf8_encode($donnes['Designation'])." ".$donnes['Age']."</option>";
                                        }
                                    ?>

                                </select>
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
<?php $reponse->free(); ?>
</html>
