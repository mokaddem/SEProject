<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Mode - Knock-Off - Saisir Score</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

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
                        <h1 class="page-header">Knock-Off - Saisir un score</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <ul class="nav nav-tabs">
                        <li <?php if ($_GET['jour']=="sam" ) echo 'class="active" ' ;?>><a href="input-knock-score.php?jour=sam">Samedi</a></li>
                        <li <?php if ($_GET['jour']=="dim" ) echo 'class="active" ' ;?>><a href="input-knock-score.php?jour=dim">Dimanche</a></li>
                    </ul>
                </div>

                <div class="form-group">
                    <label for="sel1"><span class="fa fa-dot-circle-o"></span> Choix du match</label>
                    <select class="form-control">
                        <?php
                        $db = new BDD();
                        echo $_GET['jour'];
                        if ($_GET['jour'] == "sam"){
                            $knockoff_all = $db->query('SELECT * FROM KnockoffSaturday ORDER BY `Position` ASC');
                            $row = $db->query('SELECT COUNT(ID) as numberOfGroups FROM GroupSaturday')->fetch_array();
                            extract($row);
                        } else{
                            $knockoff_all = $db->query('SELECT * FROM KnockoffSunday ORDER BY `Position` ASC');
                            $row = $db->query('SELECT COUNT(ID) as numberOfGroups FROM GroupSunday')->fetch_array();
                            extract($row);
                        }
                        for ($i = 1; $i <= $numberOfGroups; $i++) {
                            $knockoff = $knockoff_all->fetch_array();
                            $match = $db->query("SELECT * FROM `Match` WHERE ID =".$knockoff['ID_Match'])->fetch_array();
                            ?> <option value=<?=$knockoff['ID_Match']?>>
                                    <?=$knockoff['ID_Match']?> : <?php
                            for ($j = 1; $j <= 2; $j++){
                                $teamID = $match["ID_Equipe".$j];
                                $team = $db->query("SELECT * FROM Team WHERE ID=\"".$teamID."\"")->fetch_array();
                                $IDPersonne1 = $team['ID_Player1'];
                                $player1 = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne1."\"")->fetch_array();

                                $IDPersonne2 = $team['ID_Player2'];
                                $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne2."\"")->fetch_array();
                                ?>
                                <?=$player1['FirstName']?> <?=$player1['LastName']?> & <?=$player1['FirstName']?> <?=$player2['LastName']?>
                                <?php if ($j==1){ ?> VS <?php }
                            }?> </option> <?php }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sel1"><span class="fa fa-edit"></span> Score [Noms joueurs équipe 1]:</label>
                    <input class="form-control" id="sel1" placeholder="ex: 636" required data-validation-required-message="Veuillez entrer le score de la première équipe." />
                    <label for="sel1"><span class="fa fa-edit"></span> Score [Noms joueurs équipe 2]:</label>
                    <input class="form-control" id="sel1" placeholder="ex: 164" required data-validation-required-message="Veuillez entrer le score de la seconde équipe." />
                </div>


                <!-- /.row -->

                <input type="submit" name="submit" id="submit" value="Enregistrer" class="btn btn-success pull-left">

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

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>

</body>

</html>