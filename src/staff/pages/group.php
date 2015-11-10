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
                        <h1 class="page-header">Modifier les poules</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- Registration form - START -->
                <div class="row">
                    <form role="form">
                        <div class="row">
                            <ul class="nav nav-tabs">
                                <li <?php if ($_GET['jour']=="sam") echo 'class="active" ' ;?>><a href="group.php?jour=sam">Samedi</a></li>
                                <li <?php if ($_GET['jour']=="dim") echo 'class="active" ' ;?>><a href="group.php?jour=dim">Dimanche</a></li>
                            </ul>
                        </div>
                        <div class="row">
                        <div class="text-center">
                            <div class="col-lg-2">
                                Marvellous gestion of preferences !
                            </div>
                            <?php 
                            $poulNum = 5; 
                            for ($j = 1; $j <= $poulNum; $j++) { 
                            ?>
                                <div class="col-lg-2">
                                    <label><span class="fa fa-users"></span> Poule <?= $j?> </label>
                                    <div class="form-group">
                                        <label><span class="fa fa-users"></span> Terrain</label>
                                        <select class="form-control" id="terrain">
                                            <?php
                                                $db = new BDD();
                                                $reponse = $db->query('SELECT * FROM Terrain');
                                                while ($donnes = $reponse->fetch_array())
                                                { ?>
                                                    <option value=<?=$donnes['ID']?>><?=$donnes['ID']?>, <?=$donnes['Note']?></option>
                                                <?php }
                                            ?>
                                        </select>
                                    </div>
                                
                                <?php
                                    if ($_GET['jour']=="sam"){ 
                                        $teamNum = 5;
                                    } elseif($_GET['jour']=="dim"){
                                        $teamNum = 6;
                                    } else{
                                        $teamNum = 0;
                                    }
                                ?>
                                    <label><span class="fa fa-users"></span> Equipes </label>
                                <?php    for ($i = 1; $i <= $teamNum; $i++) { ?>
                                        <div class="form-group text-center">
                                          <label> </label>
                                          <!-- <input class="form-control" id="sel1" value="Equipe <?=$i?>"/> -->
                                          <p>Equipe <?=$i?> </p>
                                        </div>
                                    <?php
                                    } ?>
                                </div>
                                <?php }
                                ?>
                                
                        </div>
                    </form>
                    <!-- Registration form - END -->
                        </div>
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