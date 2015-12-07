<!DOCTYPE html>
<!-- Page de modification des groupes (transfert de joueur ou changement de terrain) -->
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Poules</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        <?php
            include("./html/header.php");
            include_once('php/BDD.php');

        $db = BDconnect();

        ?>


            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sélectionner les vainqueurs des groupes</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- <div class="row">
                    <?php //if (array_key_exists("submitting", $_GET)) {?>
                        <?php //if ($_GET["submitting"] == "correct") {?>
                            <div class="col-lg-8 alert alert-success text-center">
                                <b>Opération réussite !</b>
                                Succès lors de l'enregistrement des groupes.
                            </div>
                        <?php //} else { ?>
                            <div class="col-lg-8 alert alert-danger text-center">
                                <b>Echec de l'opération !</b>
                                Certains groupes utilisent le même terrain.
                            </div>
                    <?php //} } ?>
                </div> -->

                <div>
                    <div class="alert alert-success" id="popup" >Vos changements sont enregistrés. Vous pouvez à présent générer le tournoi de knock-off.</div>
                </div>


                <!-- Registration form - START -->
                <div class="row">
                    <ul class="nav nav-tabs">
                        <li <?php if ($_GET[ 'jour']=="sam" ) echo 'class="active" ' ;?>><a href="group-winner.php?jour=sam&cat=0">Samedi <i class="fa fa-venus-mars" style="font-size: 150%"></i></a></li>
                        <li <?php if ($_GET[ 'jour']=="dim" ) echo 'class="active" ' ;?>><a href="group-winner.php?jour=dim&cat=0">Dimanche <i class="fa fa-venus" style="font-size: 150%"></i> || <i class="fa fa-mars" style="font-size: 150%"></i></a></li>
                    </ul>
                    <ul class="nav nav-tabs nav-justified">
                        <?php $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, GroupSaturday WHERE GroupSaturday.ID_Cat = Categorie.ID');
                        if ($_GET['jour'] == "dim") {
                          $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, GroupSunday WHERE GroupSunday.ID_Cat = Categorie.ID');
                        }
                            while ($donnes = $reponse->fetch_array()) { ?>
                              <?php if ($_GET['cat']=="0") { ?>
                                <script>document.location.href="./group-winner.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>";</script>
                              <?php  } ?>
                              <li <?php if ($_GET['cat']==$donnes['ID'] ) echo 'class="active" ';?>><a href="group-winner.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>"><?=utf8_encode($donnes['Designation']);?></a></li>
                            <?php }?>
                    </ul>
                </div>
                <div class="row">
                    <br/>
                </div>
                <div class="row">
                    <nav class="navbar navbar-inverse navbar-perso navbar-fixed-bottom">
                        <div class="container">
                            <div class="navbar-form">
                                <input id="confirmWinner" data-toggle="pList" data-target="#pList" form="valider" type="submit" class="btn btn-info pull-right" value="Confirmer les vainqueurs" />
                            </div>
                            <div id="pList"></div>
                        </div>
                    </nav>
                </div>
                <div class="row">
                    <form role="form" id="valider" method="GET" action="php/add-group-winner.php">
                        <input value="<?=$_GET['jour']?>" name="jour" class="hidden">
                        <input value="<?=$_GET['cat']?>" name="cat" class="hidden">
                        <div class="text-center">
                            <?php
                                if ($_GET['jour'] == "sam"){
                                    $groups = $db->query('SELECT *, GroupSaturday.ID as Gid FROM GroupSaturday, Team WHERE GroupSaturday.ID_t1 = Team.ID AND Team.ID_Cat = '.$_GET['cat'].'');
                                } else{
                                    $groups = $db->query('SELECT *, GroupSunday.ID as Gid FROM GroupSunday, Team WHERE GroupSunday.ID_t1 = Team.ID AND Team.ID_Cat = '.$_GET['cat'].'');
                                }
                                $lineNum = 4;
                                $j = 0;
                                $s_a_m = "";
                                $k = 0;
                                while($group = $groups->fetch_array()){
                                    $k++;
                                    if ($s_a_m == "server-action-menu") {
                                        $s_a_m = "server-other-menu";
                                    } else {
                                        $s_a_m = "server-action-menu";
                                    }
                                    $j++;
                                    if ($j > $lineNum){
                                        $j = 0;
                                    }
                                    if ($group != NULL){?>
                                        <div class="col-lg-3 <?=$s_a_m?>"  name="divGroup" id="divGroup<?=$k?>" data-groupID="<?=$group['Gid']?>" data-day="<?=$_GET['jour']?>" data-category="<?=$_GET['cat']?>">
                                            <label><span class="fa fa-users"></span> Groupe <?= $k?> </label>
                                            <br/>
                                            <?php
                                            $teamNum = 8;
                                            for ($i = 1; $i <= $teamNum; $i++){ $teamID = $group["ID_t".$i]; if ($teamID != NULL){}else{ $realteamNum = $i; ; break;}}
                                            for ($i = 1; $i <= $teamNum; $i++) {
                                                $teamID = $group["ID_t".$i];
                                                if ($teamID != NULL) {
                                                    $team = $db->query("SELECT * FROM Team WHERE ID=\"" . $teamID . "\"")->fetch_array();
                                                    $IDPersonne = $team['ID_Player1'];
                                                    $player = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne . "\"")->fetch_array();

                                                    $IDPersonne2 = $team['ID_Player2'];
                                                    $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne2 . "\"")->fetch_array();
                                                    $checked = "";
                                                    if ($team['Group_Vic'] == 1){
                                                        $checked = "checked=\"checked\"";
                                                    }?>
                                                    <div class="form-group text-left col-lg-offset-1">
                                                        <?php $nameWin = "winner".$i."_".$group['ID'];?>
                                                        <label class="checkbox"><input type="checkbox" class="increase_size" name=<?=$nameWin?> value=<?=$teamID?> <?=$checked?>">
                                                            <div class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Nombre de victoire(s)" <?php if($team['NbWinMatch']>= ($realteamNum-3)){echo "data-check=1";}else{echo "data-check=0";} ?> id="data-button">
                                                                <?=$team['NbWinMatch']?>
                                                            </div>
                                                            <?= utf8_encode($player['LastName']) ?>
                                                            & <?= utf8_encode($player2['LastName']) ?> [<?=$teamID ?>]
                                                        </label>
                                                    </div>
                                                    <?php
                                                } else { $i = $teamNum; } // On arrete la boucle.
                                            }?>
                                        </div>
                                        <?php }
                                            } // End of k loop.
                                        if ($k == 0){ ?>
                                            <div class="col-lg-3 alert alert-danger">
                                                Les groupes n'ont pas encore été générés pour cette catégorie et/ou ce jour.
                                            </div>
                                        <?php } ?>

                        </div>

                    </form>
                    <!-- Registration form - END -->
                <!--</form>-->
                </div>
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
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


    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();

            $('#popup').hide();
            var generate = <?php if (isset($_GET['generate'])){ if($_GET['generate']==true){echo "true";}else{echo "false";}}else{echo "false";}  ?>;
            if(generate==true){
                saveWinner();
            }

            //test for already checked box
            var onlyOneChecked = false;
            var checkbox = document.querySelectorAll('.increase_size');
            var checkboxLen = checkbox.length;
            for (var i = 0 ; i < checkboxLen ; i++) {
                if(checkbox[i].checked == true){
                    onlyOneChecked = true;
                }
            }

            if(!onlyOneChecked){
                buttonC = document.querySelectorAll('#data-button');
                for (var i = 0 ; i < checkboxLen ; i++) {
                    if(buttonC[i].getAttribute('data-check')==1){
                        checkbox[i].checked=true;
                    }
                }
            }
        });
    </script>

    <script>
        function saveWinner(){
            setTimeout(function() {  $('#popup').fadeIn('slow');}, 0);
            setTimeout(function() {  $('#popup').fadeOut('slow');},3000);
        }
    </script>

    <script type="text/javascript"> //document.getElementById("confirmWinner").addEventListener("click", saveWinner);</script>

</body>
<?php $reponse->free(); $groups->free(); ?>
</html>
