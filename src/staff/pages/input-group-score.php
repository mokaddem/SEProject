<!DOCTYPE html>
<html lang="en">
<!-- Page de saisie de score pour les poules -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Poules - Saisir Score</title>

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
            $db = BDconnect();

            if ($_GET['jour'] == "sam") {
                $tableGroup = "GroupSaturday";
            } else{
                $tableGroup = "GroupSunday";
            }
            $temp = $db->query('SELECT * FROM '.$tableGroup.' WHERE ID_Cat = ' . $_GET['cat']);
            $grptmp = $db->query('SELECT * FROM '.$tableGroup.' WHERE ID_Cat = '.$_GET['cat']);

            $row=$temp->fetch_array();
            $PouleID = $row['ID'];

            if (isset($_GET['poule'])) {
                $PouleID = $_GET['poule'];
                $TeamID = $_GET['team'];
            }else{
                $temp = $db->query('SELECT * FROM '.$tableGroup.' WHERE ID_Cat = '.$_GET['cat']);
                $row=$temp->fetch_array();
                $PouleID = $row['ID'];
                $TeamID = 0;
            }
            $flagGroupNotCreated = 0;
            if($PouleID == NULL or !($temp = $db->query('SELECT NbWinMatch FROM Team WHERE Team.ID='.$TeamID.' AND Team.ID_Cat = '.$_GET['cat']))){
                $flagGroupNotCreated = 1;
            }
            else {
                if ($TeamID == 0){
                    $team = $db->query('SELECT Team.ID, Team.NbWinMatch FROM Team,'.$tableGroup.' WHERE Team.ID = '.$tableGroup.'.ID_t1 AND '.$tableGroup.'.ID = '.$PouleID)->fetch_array();
                    $TeamID = $team['ID'];
                    $winnumber = $team['NbWinMatch'];
                } else {
                    $row = $temp->fetch_array();
                    $winnumber = $row['NbWinMatch'];
                }
            }
            $reponse = $db->query('SELECT * FROM GlobalVariables WHERE `Name` = "tournament_started"');
            $rep = $reponse->fetch_array();
            $flagTournamentStarted = $rep['Value'];
        ?>

            <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
                <div class="row">

                    <div class="col-lg-12">
                        <h1 class="page-header">Poules - Saisir un score</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="row">
                  <div class="panel panel-default">
                    <ul class="nav nav-tabs">
                        <li <?php if ($_GET[ 'jour']=="sam" ) echo 'class="active" ' ;?>><a href="input-group-score.php?jour=sam&cat=1">Samedi</a></li>
                        <li <?php if ($_GET[ 'jour']=="dim" ) echo 'class="active" ' ;?>><a href="input-group-score.php?jour=dim&cat=1">Dimanche</a></li>
                    </ul>
                    <ul class="nav nav-tabs nav-justified">
                        <?php $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, GroupSaturday WHERE GroupSaturday.ID_Cat = Categorie.ID');
                        if ($_GET['jour'] == "dim") {
                            $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, GroupSunday WHERE GroupSunday.ID_Cat = Categorie.ID');
                        }
                        while ($donnes = $reponse->fetch_array()) { ?>
                            <li <?php if ($_GET['cat']==$donnes['ID'] ) echo 'class="active" ';?>><a href="input-group-score.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>"><?=utf8_encode($donnes['Designation']);?></a></li>
                        <?php }?>
                    </ul>
                </div>
              </div>
                <div class="row">
                    <br/>
                </div>

                <div class="form-group">
                    <?php if($flagGroupNotCreated == 1){ ?>
                        <div class="col-lg-3 alert alert-danger">
                            Les groupes n'ont pas encore été générés pour cette catégorie et/ou ce jour.
                        </div>
                    <?php } elseif($flagTournamentStarted != 1){ ?>
                        <div class="col-lg-3 alert alert-danger">
                            <p> Le tournoi n'a pas encore commencé.</p></br>
                            <button id="start_tournament" class="btn btn-danger"> Démarrer le tounoi</button>
                        </div>
                    <?php }
                    else{ ?>
                    <label for="sel1"><span class="fa fa-dot-circle-o" ></span> Choix de la poule</label>
                    <select class="form-control" id="selectedPoule" name="selectedPoule" style="width: 110px;">
                        <?php
                            $k=0;
                            while ($row = $grptmp->fetch_array())
                            {
                                $k++;
                                if($row['ID'] == $_GET['poule']) {
                                    echo "<option value=" . $row['ID'] . " selected=\"selected\"> Groupe " . $k . "</option>";
                                }else{
                                    echo "<option value=" . $row['ID'] . "> Groupe " . $k . "</option>";
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sel1"><span class="fa fa-dot-circle-o"></span> Choix de l'équipe</label>
                    <select class="form-control" id="selectedTeam" name="selectedTeam" style="width: 400px;">
                    <?php
                        if ($_GET['jour'] == "sam") {
                            $reponse = $db->query('SELECT *, Team.ID as T_ID FROM Team, GroupSaturday WHERE GroupSaturday.ID_Cat=' . $_GET['cat'] . ' AND GroupSaturday.ID=' . $PouleID . ' AND (Team.ID=GroupSaturday.ID_t1 OR Team.ID=GroupSaturday.ID_t2 OR Team.ID=GroupSaturday.ID_t3 OR Team.ID=GroupSaturday.ID_t4 OR Team.ID=GroupSaturday.ID_t5 OR Team.ID=GroupSaturday.ID_t6 OR Team.ID=GroupSaturday.ID_t7 OR Team.ID=GroupSaturday.ID_t8)');
                        } else{
                            $reponse = $db->query('SELECT *, Team.ID as T_ID FROM Team, GroupSunday WHERE GroupSunday.ID_Cat=' . $_GET['cat'] . ' AND GroupSunday.ID=' . $PouleID . ' AND (Team.ID=GroupSunday.ID_t1 OR Team.ID=GroupSunday.ID_t2 OR Team.ID=GroupSunday.ID_t3 OR Team.ID=GroupSunday.ID_t4 OR Team.ID=GroupSunday.ID_t5 OR Team.ID=GroupSunday.ID_t6 OR Team.ID=GroupSunday.ID_t7 OR Team.ID=GroupSunday.ID_t8)');
                        }
                        while ($donnes = $reponse->fetch_array())
                        {
                            $p = $db->query('SELECT * FROM Personne WHERE '.$donnes['ID_Player1'].' = ID');
                            $p1 = $p->fetch_array();
                            $p = $db->query('SELECT * FROM Personne WHERE '.$donnes['ID_Player2'].' = ID');
                            $p2 = $p->fetch_array();
                            $TeamName=utf8_encode($p1['FirstName']." ".$p1['LastName']." & ".$p2['FirstName']." ".$p2['LastName']." [".$donnes['T_ID']."]");
                            if ($donnes['T_ID'] != $TeamID) {
                                echo "<option value=" . $donnes['T_ID'] . ">" . $TeamName . "</option>";
                            }
                            else {
                                $currentTeamName=$TeamName;
                                echo "<option value=" . $donnes['T_ID'] . " selected=\"selected\">" .$TeamName. "</option>";
                            }
                        }
                    ?>
                    </select>
                </div>

                <div class="form-group">
                <label for="sel1"><span class="fa fa-dot-circle-o"></span> Matchs VS</label>
                    <?php
                    //$reponse = $db->query('SELECT FirstName, LastName, R2.ID as TeamID, R2.M_id as MatchID FROM (SELECT * FROM (SELECT ID_Equipe1, ID_Equipe2, `Match`.ID as M_id FROM `Match`, Team WHERE `Match`.Poule_ID ='.$PouleID.' AND `Match`.ID_Equipe1 ='.$TeamID.' OR `Match`.ID_Equipe2 ='.$TeamID.' GROUP BY ID_Equipe1 ) AS R1, Team WHERE R1.ID_Equipe1 = Team.ID OR R1.ID_Equipe2 = Team.ID GROUP BY Team.ID ) AS R2, Personne WHERE R2.ID_Player1 = Personne.ID OR R2.ID_Player2 = Personne.ID');
                    $reponseMatch = $db->query("SELECT * FROM `Match` WHERE `Poule_ID`=".$PouleID." and (`ID_Equipe1`=".$TeamID." or `ID_Equipe2`=".$TeamID.")");
                    $i=0; $j=0;
                    $flip;
                    while ($donnesMatch = $reponseMatch->fetch_array()) {
                        $otherTeam = $donnesMatch['ID_Equipe1']== $TeamID ? $donnesMatch['ID_Equipe2'] : $donnesMatch['ID_Equipe1'];
                        $reponsePers  = $db->query("SELECT Personne.FirstName, Personne.LastName FROM `Team`, Personne WHERE Team.ID=".$otherTeam." AND `ID_Player1`=Personne.ID UNION SELECT Personne.FirstName, Personne.LastName FROM `Team`, Personne WHERE Team.ID=".$otherTeam." AND `ID_Player2`=Personne.ID");
                        $donnesPers = $reponsePers->fetch_array();
                        $p1 = utf8_encode($donnesPers['FirstName'] . " " . $donnesPers['LastName']);
                        $donnesPers = $reponsePers->fetch_array();
                        $p2 =  utf8_encode($donnesPers['FirstName'] . " " . $donnesPers['LastName']);
                        $arrayTeamId[$i]  = $otherTeam;
                        $arrayMatchID[$i] = $donnesMatch['ID'];

                        $reponse2_1 = $db->query("SELECT score1, score2 FROM `Match` WHERE ID_Equipe1=" . $TeamID . " AND ID_Equipe2=" . $otherTeam. " AND Poule_ID=".$PouleID);
                        $donnes2_1 = $reponse2_1->fetch_array();

                        if (count($donnes2_1['score2']) != 0) {
                            $arrayResult[$j] = $donnes2_1['score1'];
                            $arrayResult[$j + 1] = $donnes2_1['score2'];
                            $flip[$i]=0;
                        }
                        else{
                            $reponse2_2 = $db->query("SELECT score1, score2 FROM `Match` WHERE ID_Equipe1=" . $otherTeam . " AND ID_Equipe2=" . $TeamID);
                            $donnes2_2 = $reponse2_2->fetch_array();

                            $arrayResult[$j] = $donnes2_2['score1'];
                            $arrayResult[$j + 1] = $donnes2_2['score2'];
                            $flip[$i]=1;
                        }
                        $j = $j + 2;
                        $i = $i + 1;
                        $nameField = "score".$i;

                        if ($TeamID != $donnes['TeamID']) {
                            ?>
                            <div class="input-group">
                                <span class="input-group-addon"><?= $currentTeamName ?></span>
                                <input type="number" class="form-control" name=<?=$nameField?>-1 id=<?=$nameField?>-1 placeholder="0" min="0"
                                       step="1" style="width: 60px;" value=<?php echo $flip[$i-1] == 0 ? $arrayResult[$j-2] : $arrayResult[$j-1]; ?> required>
                                <input type="number" class="form-control" name=<?=$nameField?>-2 id=<?=$nameField?>-2 placeholder="0" min="0"
                                       step="1" style="width: 60px;" value=<?php echo $flip[$i-1] == 0 ? $arrayResult[$j-1] : $arrayResult[$j-2]; ?> required>
                                <span class="input-group-addon"><?= "[".$otherTeam. "] ". $p1 . " & " . $p2 ?></span>
                            </div>
                        <?php } else { $i--; }
                    }
                    ?>
                </div>


                <div class="col-lg-6">
                <div class="form-group">
                    <label for="sel1"><span class="fa fa-edit" id="nbrwin"></span> Nombre de victoire(s)</label>
                    <span class="form-control text-center" style="width: 70px;"><p><?=$winnumber ?></p></span>
                </div>


                <!-- /.row -->

                <button type="submit" name="submit" id="submit" value="Enregistrer" class="btn btn-info pull-left">Enregistrer</button>
                </div>
                <div class="col-lg-2 text-center">
                    <div class="alert alert-success" id="popup" >Scores enregistrés</div>
                </div>
                <?php } ?>
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
            $('#popup').hide();
        });
    </script>

    <script type="text/javascript">
        function refreshMatchs(e){
            target = e.target;
            nameOfChangedElem = target.getAttribute("name");
            var Poule = document.getElementById('selectedPoule').value;
            var Team = nameOfChangedElem == "selectedPoule" ? 0 : document.getElementById('selectedTeam').value;
            var Jour = "<?=$_GET['jour']?>";
            var Cat = <?=$_GET['cat']?>;

            window.location.replace("../pages/input-group-score.php?jour="+ Jour +"&cat="+ Cat +"&poule="+ Poule +"&team=" + Team);
        }
    </script>

    <script type="text/javascript">
        function saveScore(){
            var url="../pages/php/add-score.php";
            var js_arrayTeamId = [<?php echo '"'.implode('","',  $arrayTeamId ).'"' ?>];
            var js_curTeamID = <?php echo $TeamID; ?>;
            var js_arrayMatchID= [<?php echo '"'.implode('","',  $arrayMatchID ).'"' ?>];
            var js_matchNumber= <?php echo $i; ?>;
            var js_pouleID= <?php echo $PouleID; ?>;
            var js_flip= [<?php echo '"'.implode('","',  $flip ).'"' ?>];
            var js_arrayResult=[];


            for (i = 0; i < js_matchNumber; i++) {
                console.log("score"+(i+1)+"-1");
                var js_temp_array=[];
                js_temp_array[0] = document.getElementById("score"+(i+1)+"-1").value;
                js_temp_array[1] = document.getElementById("score"+(i+1)+"-2").value;
                js_arrayResult[i] = js_temp_array;
            }
            var data={ 'curTeamID':js_curTeamID, 'matchNumber':js_matchNumber, 'pouleID':js_pouleID, 'matchs[]':js_arrayTeamId , 'scores[]':js_arrayResult, 'matchsID[]':js_arrayMatchID, 'flip[]':js_flip};

            $.ajax({
                type: "POST",
                url: url,
                data: data

            });

            setTimeout(function() {  $('#popup').fadeIn('slow');}, 0);
            setTimeout(function() {  $('#popup').fadeOut('slow');},3000);
            setTimeout(function() {  location.reload();}, 500+3000);

        }
    </script>

    <script type="text/javascript">
        function start_tournament(){
            var url="../pages/php/modify_global_var.php";
            var data={ 'varName':"tournament_started", 'varVal':1};
            $.ajax({
                type: "POST",
                url: url,
                data: data

            });
            setTimeout(function() {  location.reload();}, 750);
        }
    </script>

    <script type="text/javascript"> document.getElementById("selectedPoule").addEventListener("change", refreshMatchs);</script>
    <script type="text/javascript"> document.getElementById("selectedTeam").addEventListener("change", refreshMatchs);</script>
    <script type="text/javascript"> document.getElementById("submit").addEventListener("click", saveScore);</script>
    <?php if($flagTournamentStarted != 1) { ?> <script type="text/javascript"> document.getElementById("start_tournament").addEventListener("click", start_tournament);</script> <?php }?>

</body>
<?php $grptmp->free(); $temp->free(); $reponse->free(); if($flagTournamentStarted){ $p->free(); $reponseMatch->free(); $reponsePers->free(); $reponse2_1->free();}?>
</html>
