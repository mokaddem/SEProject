<!DOCTYPE html>
<!-- Page de modification d'un match selectionné dans la liste -->
<html lang="en">
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
</head>

<body>

    <div id="wrapper">

        <?php
            include("./html/header.php");
            include_once('php/BDD.php');

            $db = BDconnect();
            $reponse = $db->query('SELECT * FROM `Match` WHERE '. $_GET['id']. ' = ID');
            $donnees = $reponse->fetch_array();

            $t = $db->query('SELECT * FROM `Team` WHERE '.$donnees['ID_Equipe1'].' = ID');
            $t1 = $t->fetch_array();

            $t1p = $db->query('SELECT * FROM `Personne` WHERE '.$t1['ID_Player1'].' = ID');
            $t1p1 = $t1p->fetch_array();

            $t1p = $db->query('SELECT * FROM `Personne` WHERE '.$t1['ID_Player2'].' = ID');
            $t1p2 = $t1p->fetch_array();

            $t1final = $t1p1['FirstName']." ".$t1p1['LastName']." & ".$t1p2['FirstName']." ".$t1p2['LastName'];

            $t = $db->query('SELECT * FROM `Team` WHERE '.$donnees['ID_Equipe2'].' = ID');
            $t2 = $t->fetch_array();

            $t2p = $db->query('SELECT * FROM `Personne` WHERE '.$t2['ID_Player1'].' = ID');
            $t2p1 = $t2p->fetch_array();

            $t2p = $db->query('SELECT * FROM `Personne` WHERE '.$t2['ID_Player2'].' = ID');
            $t2p2 = $t2p->fetch_array();

            $t2final = $t2p1['FirstName']." ".$t2p1['LastName']." & ".$t2p2['FirstName']." ".$t2p2['LastName'];

            $t = $db->query('SELECT * FROM `Terrain` WHERE '.$donnees['ID_Terrain'].' = ID');
            $ter = $t->fetch_array();

            $terfinal = $ter['adresse'] . " - " . $ter['etat'];

        ?>


            <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
                <div class="row">
                    <div class="col-lg-12 noDeco">
                        <h1 class="page-header"><a href="list-match.php"> Liste des matchs </a>> Modifier</h1>
                    </div>
                </div>
                <!-- Registration form - START -->
                <div class="row">
                    <form role="form" method="GET" action="php/inc/edit-match.php">
                        <div class="col-lg-6">
                            <!-- <div class="well well-sm"><strong><span class="glyphicon glyphicon-ok"></span>Required Field</strong></div> -->

                            <div class="form-group">
                                <label for="sel1"><span class="fa fa-users"></span> Première équipe</label>
                                <select class="form-control" name="InputEq1" id="InputEq1">
                                    <?php
    echo '<option value="'.$donnees['ID_Equipe1'].'" selected="'.$t1final.'">'.utf8_encode($t1final).'</option>'; ?>

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
                                <label for="sel1"><span class="fa fa-users"></span> Seconde équipe</label>
                                <select class="form-control" name="InputEq2" id="InputEq2">
                                    <?php
    echo '<option value="'.$donnees['ID_Equipe2'].'" selected="'.$t2final.'">'.utf8_encode($t2final).'</option>'; ?>
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
                                        echo '<option value="'.$donnees['ID_Terrain'].'" selected="'.$terfinal.'">'.utf8_encode($terfinal).'</option>'; ?>
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
                                        echo '<input type="date" min="'.date("Y-m-d").'" max="2048-10-10" id="InputDate" name="InputDate" value="'.$donnees['date'].'">';
                                        echo '<input type="time" id="InputHour" name="InputHour" value="'.$donnees['hour'].'">';
                                    ?>
                                </div>
                            </div>

                            <button class="btn btn-success pull-right" type="submit" name="id" id="id" value=<?=$_GET['id']?>>Sauvegarder</button>
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
<?php $reponse->free(); $t->free(); $t1p->free(); $t2p->free(); $p->free(); ?>
</html>
