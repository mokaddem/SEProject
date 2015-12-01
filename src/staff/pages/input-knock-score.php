<!DOCTYPE html>
<html lang="en">
<!-- Page de saisie de score dans knock-off -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Knock-Off - Saisir Score</title>

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
                        <li <?php if ($_GET['jour']=="sam" ) echo 'class="active" ' ;?>><a href="input-knock-score.php?jour=sam&cat=1">Samedi</a></li>
                        <li <?php if ($_GET['jour']=="dim" ) echo 'class="active" ' ;?>><a href="input-knock-score.php?jour=dim&cat=1">Dimanche</a></li>
                    </ul>
                    <ul class="nav nav-tabs nav-justified">
                        <?php $reponse = $db->query('SELECT * FROM Categorie');
                        while ($donnes = $reponse->fetch_array()) { ?>
                            <li <?php if ($_GET['cat']==$donnes['ID'] ) echo 'class="active" ';?>><a href="input-knock-score.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>"><?=utf8_encode($donnes['Designation']);?></a></li>
                        <?php }?>
                    </ul>
                </div>

                <div class="form-group" action="./php/add-knock-off-score.php?jour=<?=$_GET['jour']?>" method="GET">
                    <?php
                    $db = BDconnect();
                    if ($_GET['jour'] == "sam"){
                        $knockoff_all = $db->query('SELECT * FROM KnockoffSaturday WHERE Category = '.$_GET['cat'].' ORDER BY `Position` ASC');
                        $row = $db->query('SELECT COUNT(*) as numberOfGroups FROM KnockoffSaturday WHERE Category = '.$_GET['cat'].'')->fetch_array();
                        extract($row);
                    } else{
                        $knockoff_all = $db->query('SELECT * FROM KnockoffSunday WHERE Category = '.$_GET['cat'].' ORDER BY `Position` ASC');
                        $row = $db->query('SELECT COUNT(*) as numberOfGroups FROM KnockoffSunday WHERE Category = '.$_GET['cat'].'')->fetch_array();
                        extract($row);
                    }
                    if ($numberOfGroups == 0){ ?>
                        <br/>
                        <div class="col-lg-3 alert alert-danger">
                            Le tournoi n'a pas encore été généré pour cette catégorie et/ou ce jour.
                            <br/>
                            Il n'y a donc aucun score à saisir.
                        </div>
                    <?php } else { ?>
                        <label for="sel1"><span class="fa fa-dot-circle-o"></span> Choix du match</label>
                        <select class="form-control">
                            <?php
                            for ($i = 1; $i <= $numberOfGroups; $i++) {
                                $knockoff = $knockoff_all->fetch_array();
                                $match = $db->query("SELECT * FROM `Match` WHERE ID =".$knockoff['ID_Match'])->fetch_array();
                                ?> <option name="ID_Match" value=<?=$knockoff['ID_Match']?>>
                                        <?=$knockoff['ID_Match']?> : <?php
                                for ($j = 1; $j <= 2; $j++){
                                    $teamID = $match["ID_Equipe".$j];
                                    if ($teamID == NULL){ ?>
                                        <div class="alert alert-danger">
                                            Au moins un groupe ne contient pas de vainqueur.
                                        </div>
                                    <?php $j++; $NumberOfGroups = 0;} else {
                                    $team = $db->query("SELECT * FROM Team WHERE ID=\"".$teamID."\"")->fetch_array();
                                    $IDPersonne1 = $team['ID_Player1'];
                                    $player1 = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne1."\"")->fetch_array();

                                    $IDPersonne2 = $team['ID_Player2'];
                                    $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne2."\"")->fetch_array();
                                    ?>
                                    <?=$player1['FirstName']?> <?=$player1['LastName']?> & <?=$player1['FirstName']?> <?=$player2['LastName']?>
                                    <?php if ($j==1){ ?> VS <?php }
                                }}?> </option> <?php }
                            ?>
                        </select>
                        <label for="sel1"><span class="fa fa-edit"></span> Score [Noms joueurs équipe 1]:</label>
                        <input class="form-control" id="score1" placeholder="ex: 636" required data-validation-required-message="Veuillez entrer le score de la première équipe." />
                        <label for="sel1"><span class="fa fa-edit"></span> Score [Noms joueurs équipe 2]:</label>
                        <input class="form-control" id="score2" placeholder="ex: 164" required data-validation-required-message="Veuillez entrer le score de la seconde équipe." />
                        <!--<input type="submit" name="submit" id="submit" value="Enregistrer" class="btn btn-success pull-left">-->

                    </div>
                    <button class="btn btn-success pull-left" type="submit" name="ID_Match" id="ID_Match" value=<?=0?>>Sauvegarder</button>
                <?php } ?>


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
