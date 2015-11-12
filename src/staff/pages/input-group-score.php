<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Mode - Poules - Saisir Score</title>

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


            $db = new BDD();

            $grpSattmp = $db->query('SELECT * FROM GroupSaturday');
            $grpSuntmp = $db->query('SELECT * FROM GroupSunday');

      //      $ListMatch = $db->prepare('SELECT * FROM \'Match\' WHERE \'Match\'.Group_ID = ?')
            $PouleID=9;
            $TeamID=46;
        ?>


        <script>console.log("<?php  ?>")</script>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Poules - Saisir un score</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="form-group">
                    <label for="sel1"><span class="fa fa-dot-circle-o"></span> Choix de la poule</label>
                    <select class="form-control" id="selectedPoule" name="selectedPoule">
                        <?php
                            while ($row = $grpSattmp->fetch_array())
                            {
                                echo "<option value=".$row['ID'].">".$row['ID']."</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sel1"><span class="fa fa-dot-circle-o"></span> Choix de l'équipe</label>
                    <select class="form-control" id="selectedPoule" name="selectedPoule">
                    <?php
                        $reponse = $db->query('SELECT * FROM Team, GroupSaturday WHERE GroupSaturday.ID='.$PouleID.' AND (Team.ID=GroupSaturday.ID_t1 OR Team.ID=GroupSaturday.ID_t2 OR Team.ID=GroupSaturday.ID_t3 OR Team.ID=GroupSaturday.ID_t4 OR Team.ID=GroupSaturday.ID_t5)');
                        while ($donnes = $reponse->fetch_array())
                        {
                            $p = $db->query('SELECT * FROM Personne WHERE '.$donnes['ID_Player1'].' = ID');
                            $p1 = $p->fetch_array();
                            $p = $db->query('SELECT * FROM Personne WHERE '.$donnes['ID_Player2'].' = ID');
                            $p2 = $p->fetch_array();
                            echo "<option value=".$donnes['ID'].">".$p1['FirstName']." ".$p1['LastName']." & ".$p2['FirstName']." ".$p2['LastName']."</option>";
                        }
                    ?>
                    </select>
                </div>

                <div class="form-group">
                <label for="sel1"><span class="fa fa-dot-circle-o"></span> Matchs VS</label>
                    <?php
                    $reponse = $db->query('SELECT FirstName, LastName, R2.ID FROM (SELECT * FROM (SELECT ID_Equipe1, ID_Equipe2 FROM `Match`, Team WHERE `Match`.Poule_ID ='.$PouleID.' AND `Match`.ID_Equipe1 ='.$TeamID.' OR `Match`.ID_Equipe2 ='.$TeamID.' GROUP BY ID_Equipe1 ) AS R1, Team WHERE R1.ID_Equipe1 = Team.ID OR R1.ID_Equipe2 = Team.ID GROUP BY Team.ID ) AS R2, Personne WHERE R2.ID_Player1 = Personne.ID OR R2.ID_Player2 = Personne.ID');
                    while ($donnes = $reponse->fetch_array())
                    {
                        $p1 = $donnes['FirstName'] . " " . $donnes['LastName'];
                        $donnes = $reponse->fetch_array();
                        $p2 = $donnes['FirstName'] . " " . $donnes['LastName'];
                        ?>
                        <div class="input-group">
                        <span class="input-group-addon"><i></i><?=$p1." & ".$p2?></span>
                        <input type="number" class="form-control" name="size" id="size" placeholder="0" min="0" step="1"  style="width: 60px;" required>
                        <input type="number" class="form-control" name="size" id="size" placeholder="0" min="0" step="1"  style="width: 60px;" required>
                    </div>
                   <?php }
                    ?>
                </div>




                <div class="form-group">
                    <label for="sel1"><span class="fa fa-edit"></span> Vainqueur</label>
                    <select class="form-control" id="sel1">
                        <option>[Equipe 1]</option>
                        <option>[Equipe 2]</option>
                        <!-- <option>propriétaire</option> -->
                    </select>
                </div>


                <!-- /.row -->

                <input type="submit" name="submit" id="submit" value="Enregistrer" class="btn btn-info pull-left">

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

    <script type="text/javascript">
        function refreshMatchs(){
            for (i = 1; i < document.getElementById("size").value; i++) {
            var mydiv = document.getElementById('mydiv');
            var mydiv2 = mydiv.cloneNode(true);
            mydiv.appendChild(mydiv2);
            }
        }
    </script>

    <script type="text/javascript"> document.getElementById("selectedPoule").addEventListener("change", refreshMatchs);</script>


</body>

</html>