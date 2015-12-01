<!DOCTYPE html>
<!-- Page de modification d'un terrain selectionné dans la liste -->
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Terrain</title>

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
	    $db = BDconnect();
        $reponse = $db->query('SELECT * FROM Terrain WHERE Terrain.ID ='.$_GET['id']);
        $dataCourt = $reponse->fetch_array();
        ?>


            <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
                <div class="row">
                    <div class="col-lg-12 noDeco">
                        <h1 class="page-header"><a href="list.php?type=court"> Liste des terrains</a>> Modifier</h1>
                    </div>
                </div>
                <!-- Registration form - START -->
                <div class="row">
                    <form role="form" method="Get" action="php/inc/edit-court.php">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-circle-thin"></i></span>
                                    <select class="form-control" id="type" name="type">
                                        <?php if ($dataCourt['Type'] == "Terre battue")
                                            echo "<option selected=\"selected\">Terre battue</option>";
                                            else echo "<option>Terre battue</option>";
                                        ?>
                                        <?php if ($dataCourt['Type'] == "Gazon")
                                            echo "<option selected=\"selected\">Gazon</option>";
                                            else echo "<option>Gazon</option>";
                                        ?>
                                        <?php if ($dataCourt['Type'] == "Synthétique")
                                            echo "<option selected=\"selected\">Synthétique</option>";
                                            else echo "<option>Synthétique</option>";
                                        ?>
                                    </select>
                                    <select class="form-control" id="etat" name="etat">
                                        <?php if ($dataCourt['etat'] == "Neuf")
                                            echo "<option selected=\"selected\">Neuf</option>";
                                            else echo "<option>Neuf</option>";
                                        ?>
                                        <?php if ($dataCourt['etat'] == "Passable")
                                            echo "<option selected=\"selected\">Passable</option>";
                                            else echo "<option>Passable</option>";
                                        ?>
                                        <?php if ($dataCourt['etat'] == "Usé")
                                            echo "<option selected=\"selected\">Usé</option>";
                                            else echo "<option>Usé</option>";
                                        ?>
                                    </select>
                                    <input type="number" class="form-control" name="surface" id="surface" placeholder="Surface (m²)" min="0" step="1" value="<?php echo $dataCourt['surface'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="sel1"><span class="fa fa-user"></span> Propriétaire</label>
                                    <select class="form-control" id="owner" name="owner">
                                        <?php
                                            $reponse = $db->query('SELECT *, Owner.ID as O_id FROM Personne, Owner WHERE Personne.ID = Owner.ID_Personne');
                                            while ($donnes = $reponse->fetch_array())
                                            {
                                                if ($dataCourt['ID_Owner'] == $donnes['O_id']){
                                                    echo "<option value=".$donnes['O_id']." selected=\"selected\">".utf8_encode($donnes['FirstName'])." ".utf8_encode($donnes['LastName'])."</option>";
                                                }
                                                else
                                                    echo "<option value=".$donnes['O_id'].">".utf8_encode($donnes['FirstName'])." ".utf8_encode($donnes['LastName'])."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <!--<label for="InputPrenom">Adresse</label>-->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        <input type="text" class="form-control" id="InputAdresse" name="InputAdresse" placeholder="Adresse" value="<?php echo $dataCourt['adresse'] ?>" required>
                                    </div>
                                </div>

<!--                                <div class="form-group">-->
<!--                                    <label for="sel1"><span class="fa fa-clock-o"></span> Date & Heure</label>-->
<!--                                    <div class="input-group">-->
<!--                                        Avaible from: <span class="input-group-addon"><i class="fa fa-calendar"></i></span>-->
<!--                                        --><?php //echo '<input type="date" min="'.date("Y-m-d").'" max="2048-10-10" name="calendarF" id="calendarF" value="'.date("Y-m-d").'">';?>
<!--                                        Avaible until: <span class="input-group-addon"><i class="fa fa-calendar"></i></span>-->
<!--                                        --><?php //echo '<input type="date" min="'.date("Y-m-d").'" max="2048-10-10" name="calendarT" id="calendarT" value="'.date("Y-m-d").'">';?>
<!--                                    </div>-->
<!--                                </div>-->

                                <label for="sel1"><span class="fa fa-clock-o"></span> Disponibilités</label>
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label for="InputFrom">Du </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input size="10" maxlength="10" class="form-control" name="InputFrom" id="InputFrom" type="date" min="<?=date("Y-m-d")?>" max="2048-10-10" value="<?=$dataCourt['disponibiliteFrom']?>">
                                        </div>
                                    </div>
                                    <div class="form-group pull-right">
                                        <label for="InputTo">Au </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input size="10" maxlength="10" class="form-control" name="InputTo" id="InputTo" type="date" min="<?=date("Y-m-d")?>" max="2048-10-10" value="<?=$dataCourt['disponibiliteTo']?>">
                                        </div>
                                    </div>
                                </div>
                                <br/>


                                <div class="form-group">
                                    <!--<label for="InputMessage">Message</label>-->
                                    <div class="input-group">
                                        <textarea name="InputNote" id="InputNote" class="form-control" rows="5" required><?php echo $dataCourt['Note'] ?></textarea>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-ok"></span></span>
                                    </div>
                                </div>

                                <a class="btn btn-info" href="list.php?type=court">Retour</a>
                                <button type="submit" name="id" id="id" value="<?=$_GET['id'] ?>" class="btn btn-success pull-right">Sauvegarder</button>

                            </div>
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
