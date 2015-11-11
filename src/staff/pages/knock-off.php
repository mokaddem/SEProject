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
            include("./html/header.php");
            include_once('php/BDD.php');
        ?>


            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Créer un tournois de knock-off</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- Registration form - START -->
                <div class="row">
                    <form role="form" action="../pages/knock-off.php?jour="<?=$jour?>"&size="<?=$_GET['size']?>"&submit=Créer">
                        <div class="row">
                            <ul class="nav nav-tabs">
                                <li <?php if ($_GET['jour']=="sam" ) echo 'class="active" ' ;?>><a href="knock-off.php?jour=sam">Samedi</a></li>
                                <li <?php if ($_GET['jour']=="dim" ) echo 'class="active" ' ;?>><a href="knock-off.php?jour=dim">Dimanche</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <hr>

                            <div class="form-group">
                                <!--<label for="size">Size</label>-->
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                    <input type="number" class="form-control" name="size" id="size" placeholder="Nombre d'équipes" min="2" step="2"  style="width: 160px;" value="<?php if(isset($_GET['size'])) { echo htmlentities($_GET['size']);}?>" required>
                                	<a href="../pages/knock-off.php?jour=sam&size=8&submit=Créer" name="submitSize" id="submitSize" style="width: 100px;">Générer</a>
                                </div>
                            </div>


                            <?php 
                                if (isset($_GET['size'])){
                                    $_size=$_GET['size'];
                                } else {
                                    $_size=0;
                                }
								
								
                        for ($i = 1; $i <=$_size; $i++) {
                            if ($i % 2 != 0){ ?>
                                <div class="form-group">
                                    <label for="sel1"><span class="fa fa-users"></span> Match
                                        <?=ceil($i/2)?>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="sel1">
                                    	<?php
											$db = new BDD();
											$reponse = $db->query('SELECT * FROM Team');
											while ($donnes = $reponse->fetch_array())
											{
												$id1 = $donnes['ID_Player1'];
												$id2 = $donnes['ID_Player2'];
												$player1 = $db->query('SELECT * FROM Personne WHERE ID = '.$id1.'')->fetch_array();
												$player2 = $db->query('SELECT * FROM Personne WHERE ID = '.$id2.'')->fetch_array();
												echo "<option value=".$donnes['ID'].">".$player1['FirstName']." ".$player1['LastName']." / ".$player2['FirstName']." ".$player2['LastName']."</option>";
											}
			 	    					?>
                                    </select>
                                </div>
                                <?php } else{ ?>
                                    <div class="form-group">
                                        <select class="form-control" id="sel2">
                                    	<?php
											$db = new BDD();
											$reponse = $db->query('SELECT * FROM Team');
											while ($donnes = $reponse->fetch_array())
											{
												$id1 = $donnes['ID_Player1'];
												$id2 = $donnes['ID_Player2'];
												$player1 = $db->query('SELECT * FROM Personne WHERE ID = '.$id1.'')->fetch_array();
												$player2 = $db->query('SELECT * FROM Personne WHERE ID = '.$id2.'')->fetch_array();
												echo "<option value=".$donnes['ID'].">".$player1['FirstName']." ".$player1['LastName']." / ".$player2['FirstName']." ".$player2['LastName']."</option>";
											}
			 	    					?>
                                    </select>
                                    </div>
                                    <?php
                                }
		                        }
								?>

                                 <!-- <input type="submit" name="submit" id="submit" value="Créer" class="btn btn-info pull-right"> -->

                        </div>

                        <?php
                            $i = ceil(($i-1)/2);
                            $matchNum = 1;
                            $iter = 0;
                            for ($k = $i; $k >= 1; $k = $k/2){
	                    ?>
                            <div class="col-lg-3" style="position: relative; top: 150px;">
                                <?php for ($j = 1; $j <= $k; $j++) { ?>
                                    <div class="form-group">
                                        <label for="sel1"><span class="fa fa-users"></span> Match
                                            <?=$matchNum?>
                                        </label>
                                        <select class="form-control" id="sel1">
		                                    <?php
												$db = new BDD();
												$reponse = $db->query('SELECT * FROM Terrain');
												while ($donnes = $reponse->fetch_array())
												{
													echo "<option value=".$donnes['ID'].">".$donnes['adresse'].", ".$donnes['Note']."</option>";
												}
					 	    				?>
                                		</select>
                                    </div>
                                    <?php
			                            $matchNum++;
				                }
                            ?>
                            </div>
                            <?php
                                $iter++;
				                $i = $i + $k/2;
				            }
			                ?>
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