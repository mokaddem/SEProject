<!DOCTYPE html>
<!-- Page de vue d'ensemble des poules existantes (se trouvant dans l'onglet Poules)-->
<html lang="en">
<?php include_once('php/BDD.php'); ?>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Staff - Charles de Lorraine - Poules - Vue d'ensemble</title>

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
    </head>

    <body>

        <div id="wrapper">

            <?php
            include("./html/header.php");

            $db = BDconnect();
            $reponseS = $db->query('SELECT * FROM GroupSaturday');
            $reponseD = $db->query('SELECT * FROM GroupSunday');

        ?>

                <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Poules - Vue d'ensemble</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                    <ul class="nav nav-tabs">
                        <li <?php if ($_GET[ 'jour']=="sam" ) echo 'class="active" ' ;?>><a href="group-overview.php?jour=sam&cat=1">Samedi</a></li>
                        <li <?php if ($_GET[ 'jour']=="dim" ) echo 'class="active" ' ;?>><a href="group-overview.php?jour=dim&cat=1">Dimanche</a></li>
                    </ul>
                    <ul class="nav nav-tabs nav-justified">
                        <?php $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, GroupSaturday WHERE GroupSaturday.ID_Cat = Categorie.ID');
                        if ($_GET['jour'] == "dim") {
                          $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, GroupSunday WHERE GroupSunday.ID_Cat = Categorie.ID');
                        }
                            while ($donnes = $reponse->fetch_array()) { ?>
                              <li <?php if ($_GET['cat']==$donnes['ID'] ) echo 'class="active" ';?>><a href="group-overview.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>"><?=utf8_encode($donnes['Designation']);?></a></li>
                        <?php }?>
                    </ul>
                </div>
                    <div class="row">
                        <div class="panel panel-default">
                            <br/>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Terrain</th>
                                                            <th>Equipe 1</th>
                                                            <th>2</th>
                                                            <th>3</th>
                                                            <th>4</th>
                                                            <th>5</th>
                                                            <th>6</th>
                                                            <th>7</th>
                                                            <th>8</th>
                                                            <th>Leader</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
            <?php
if ($_GET[ 'jour']=="sam" ){
    $listDonnees = $db->query('SELECT * FROM GroupSaturday WHERE ID_Cat='.$_GET['cat']);
}else {
    $listDonnees = $db->query('SELECT * FROM GroupSunday WHERE ID_Cat='.$_GET['cat']);
}
foreach ($listDonnees as $donnees) { $i = 1; ?>
                <tr class="odd gradeX text-center">
                    <?php foreach ($donnees as $donnee) {
                    if ($i != 12) {
                        echo "<td>";
            if ($i == 2 and $donnee != NULL) {
                $terrain = $db->query("SELECT * FROM Terrain WHERE ID=\"" . $donnee . "\"")->fetch_array();
                ?>
                                <option value=<?=$terrain[ 'ID']?>>
                                    <?=$terrain['ID']?> -
                                        <?=utf8_encode($terrain['Note'])?>
                                </option>
                                <?php
            }elseif($i > 2 and $donnee != NULL and $i < 12) {
                $team = $db->query("SELECT * FROM Team WHERE ID=\"" . $donnee . "\"")->fetch_array();
                $IDPersonne = $team['ID_Player1'];
                $player = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne . "\"")->fetch_array();

                $IDPersonne2 = $team['ID_Player2'];
                $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne2 . "\"")->fetch_array();
                ?>

                <?php
                if ($donnee != 0 and $donnee != NULL) { ?>
                    <!--<?=$donnee?> -
-->                        <?= utf8_encode($player['LastName'])?> &
                            <?=utf8_encode($player2['LastName'])?>
                <?php } else { ?>
                    Aucun
                <?php } ?>
                            <?php
            } else{
                echo $donnee;
            }}
        ?>
                        </td>
                        <?php    $i++; }
                        $matchID = $donnees['ID'];
                        $theDay = $_GET['jour'];
                        ?>
                  <td>
                      <a href="./group.php?jour=<?=$theDay?>&cat=1"><i class="fa fa-edit fa-fw"></i></a>
                      <a target="_blank" href="./php/print-group.php?id=<?=$matchID?>&jour=<?=$theDay?>"><i class="fa fa-print"></i></a>
                  </td>
                </tr>
                <?php    } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /#page-wrapper -->
                    </div>
                </div>
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
    <?php $reponseS->free(); $reponseD->free();?>
</html>
