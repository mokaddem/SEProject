<!DOCTYPE html>
<html lang="en">
<!-- Page de modification du tournoi knock-off (echange d'équipes et terrains) -->
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


    <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Knock-Off - Saisir les résultats</h1>
                <ul class="nav nav-tabs">
                    <li <?php if ($_GET[ 'jour']=="sam" ) echo 'class="active" ' ;?>><a href="input-knock-score.php?jour=sam&cat=0" >Samedi <i class="fa fa-venus-mars" style="font-size: 150%"></i> </a></li>
                    <li <?php if ($_GET[ 'jour']=="dim" ) echo 'class="active" ' ;?>><a href="input-knock-score.php?jour=dim&cat=0">Dimanche <i class="fa fa-venus" style="font-size: 150%"></i> || <i class="fa fa-mars" style="font-size: 150%"></i></a></li>
                </ul>
                <div class="panel panel-default">
                <ul class="nav nav-pills nav-justified">
                    <?php $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, KnockoffSaturday WHERE KnockoffSaturday.Category = Categorie.ID');
                    if ($_GET['jour'] == "dim") {
                      $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, KnockoffSunday WHERE KnockoffSunday.Category = Categorie.ID');
                    }
                        while ($donnes = $reponse->fetch_array()) { ?>
                          <?php if ($_GET['cat']=="0") { ?>
                            <script>document.location.href="./input-knock-score.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>";</script>
                          <?php  } ?>
                          <li <?php if ($_GET['cat']==$donnes['ID'] ) echo 'class="active" ';?>><a href="input-knock-score.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>"><?=utf8_encode($donnes['Designation'])?></a></li>
                        <?php }?>
                </ul>
                </div>
            </div>
            <div class="row">
                <br/>
            </div>
            <div class="col-lg-3 vcenter">
                <?php
                if ($_GET['jour'] == "sam"){
                    $knockoff_all = $db->query('SELECT * FROM KnockoffSaturday WHERE Category = '.$_GET['cat'].' ORDER BY `Position` ASC');
                    $row = $db->query('SELECT COUNT(ID) as numberOfMatch FROM KnockoffSaturday WHERE Category = '.$_GET['cat'])->fetch_array();
                    extract($row);
                } elseif ($_GET['jour'] == "dim") {
                    $knockoff_all = $db->query('SELECT * FROM KnockoffSunday WHERE Category = '.$_GET['cat'].' ORDER BY `Position` ASC');
                    $row = $db->query('SELECT COUNT(ID) as numberOfMatch FROM KnockoffSunday WHERE Category = '.$_GET['cat'])->fetch_array();
                    extract($row);
                }
                if ($numberOfMatch == 0){ ?>
                    <div class="alert alert-danger">
                        Le tournoi n'a pas encore été généré pour cette catégorie et/ou ce jour.
                    </div>
                <?php }
                $s_a_m = "server-action-menu";
                $numberOfMatchCol = -1;
                $iter = 1;
                $newColNeeded = False;
                $numberOfTeams = -1;
                $numberOfColDone = 0;
                $round = 1;
                $maxCol = 4;
                $visitedTeams = array();
                array_push($visitedTeams,"0");
                foreach($knockoff_all as $knockoff){
                    $match = $db->query("SELECT * FROM `Match` WHERE ID =" . $knockoff['ID_Match'])->fetch_array();
                ?>
                <div class="row"> <?php
                    if (in_array($match['ID_Equipe2'],$visitedTeams)){ // If we have already seen this team,
                        if ($numberOfMatchCol == -1) { // We begin the second round.
                            $numberOfMatchCol = $iter - 1;
                            $impair = (in_array($match['ID_Equipe1'],$visitedTeams)) ? 0 : 1;
                            $numberOfTeams = 2 * $numberOfMatchCol + $impair; // Total number of teams that we have to place.
                            $newColNeeded = True;
                        } else {
                            if ($numberOfColDone >= $numberOfMatchCol) {
                                $newColNeeded = True;
                            }
                        }
                        if ($newColNeeded){
                            if ($round % $maxCol == 0){ ?>
                                </div>
                                <div class="col-lg-12 vcenter">
                                    <h4><b> Tours suivants </b></h4>
                            <?php
                            }
                            if ($impair == 1 and $round != 1){
                                displayVoidTeamNoMatch($round, $db);
                            }
                            $round++;
                            $newColNeeded = False;
                            $numberOfTeams -= $numberOfMatchCol; // There were $numberOfMatchCol matches, so this number of team lost.
                            $impair = $numberOfTeams % 2;
                            $numberOfMatchCol = ($numberOfTeams == 3) ? 3 : (int)($numberOfTeams / 2); // Ce sera 3 si on a 3 finalistes.
                            $numberOfColDone = 0;
                            $visitedTeams = array();
                            array_push($visitedTeams,"0");
                            ?>
                            </div>
                            </div>
                            <div class="col-lg-3 vcenter">
                                <div class="row"> <?php
                        }
                    }?>
                    <div class="form-group <?=$s_a_m?>">
                        <div class="text-center">
                            <label ><span class="fa fa-users"></span> Match <?=$knockoff['Position']." [".$match['ID']."]" ?> </label>
                        </div>
                        <?php
                        for ($j = 1; $j <= 2; $j++) {
                            $teamID = $match['ID_Equipe'.$j];
                            if ($teamID == 0) {
                                displayVoidTeam($match, $knockoff['Position'], $j, $round, $db);
                            } else {
                                $team = $db->query('SELECT * FROM Team WHERE ID= ' . $teamID . ' AND ID_Cat=' . $_GET['cat'])->fetch_array();
                                displayTeam($team, $match, $knockoff['Position'], $j, $numberOfMatch, $round, $db);
                                array_push($visitedTeams,$teamID);
                            }
                            if($j==1){
                                displaySelectButton($knockoff, $match, $round);
                            }
                        }
                        ?>
                    </div> <?php
                    if ($s_a_m == "server-action-menu") {
                        $s_a_m = "server-other-menu";
                    } else {
                        $s_a_m = "server-action-menu";
                    }
                    $numberOfColDone++;
                    $iter++;
                    ?>
                    </div> <?php
                }
                ?>

                </div>
            <div id="form-messages-rep"></div>
            </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                <!-- Registration form - END -->
            </div>

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>

    <!-- Display functions ! -->
    <?php

    function displaySelectButton($knockoff, $match, $round){
        ?>
        <div class="row">
            <button class="btn btn-danger fa fa-arrow-circle-right col-lg-offset-10" style="font-size: 200%" id="btnselect<?=$knockoff['Position']?>" name="btnselect" data-score1="" data-score2="" data-winning-team="" data-matchID="<?=$match['ID']?>" data-round="<?=$round?>" disabled="true"></button>
        </div>
        <?php
    }

    function displayVoidTeamNoMatch($round){
        ?>
        <div class="form-group server-invalide-menu">
            <div class="text-center">
                <label ><span class="fa fa-users"></span> Team without match this round. </label>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <button class="btn btn-default btn-outline" data-toggle="idteam1" data-target="#idteam1" data-id="-1" data-position="<?=$round?>" data-matchID="0" data-void="2" data-round="<?=$round?>" >Vide</button>
                </div>
                <div class="col-lg-5">
                    <button class="btn btn-danger fa fa-arrow-circle-right col-lg-offset-7" style="font-size: 200%" id="btnselectVoid<?=$round?>" name="btnselect" data-winning-team="" data-matchID="0" data-round="<?=$round?>" disabled="true"></button>
                </div>
            </div>
        </div>
        <?php
    }
    function displayVoidTeam($match, $position, $indice, $round, $db){
        ?>
        <div class="form-group text-center">
            <button class="btn btn-default btn-outline" data-toggle="idteam1" data-target="#idteam1" data-id="-1" data-position="<?=$position?>" data-matchID="<?=$match["ID"]?>" data-indice="<?=$indice ?>" data-void="1" data-round="<?=$round?>" >Vide</button>
        </div>
        <?php
    }

    function displayTeam($team, $match, $position, $indice, $numberOfMatch, $round, $db){
        $teamID = $team["ID"];
        $team = $db->query('SELECT * FROM Team WHERE ID= ' . $teamID . ' AND ID_Cat=' . $_GET['cat'] . ' ')->fetch_array();
        $IDPersonne1 = $team['ID_Player1'];
        $player1 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne1 . "\"")->fetch_array();

        $IDPersonne2 = $team['ID_Player2'];
        $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne2 . "\"")->fetch_array();

        $nameField = "score".$position;
        $ranking = ($team['AvgRanking'] == NULL) ? "NC" : $team['AvgRanking'];

        $score = $indice == 1 ? $match['score1'] : $match['score2'];
        ?>
        <div class="row">
            <div class="col-lg-7">
                <button class="btn btn-default btn-block" data-teamID="<?=$team['ID']?>" data-round="<?=$round ?>" disabled> [<?=$ranking?>-<?=$team['ID']?>] <?= utf8_encode($player1['LastName']) ?> & <?= utf8_encode($player2['LastName']) ?> </button>
            </div>
            <div class="col-lg-2" style="padding-right: 2px">
                <input type="number" class="form-control" name=<?=$nameField?>-1 id=<?=$nameField?>-1 placeholder="0" min="0" data-teamID="<?=$team['ID']?>" data-matchID="<?=$match['ID']?>" data-indice="<?=$indice ?>" data-round="<?=$round?>
                       step="1" style="float: left;" value="<?=$score ?>"  required>
            </div>
            <?php if($position > ceil($numberOfMatch/2)){ ?>
                <div class="" style="margin-top: 1.5%">
                    <a class="pull-left" href="php/delete-knock.php?matchID=<?=$match['ID']?>&indice=<?=$indice?>&jour=<?=$_GET["jour"]?>&cat=<?=$_GET['cat']?>" onclick="return confirm('Voulez-vous vraiment supprimer ce groupe ?');" ><i class="fa fa-trash-o"></i></a>
                </div>
            <?php } ?>
        </div>
        <?php
    }
    ?>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script type="text/javascript"></script>

    <script>
        $( document ).ready(function(){
            updateButton();
        });

        function updateButton() {
            var button;
            var value1;
            var value2;
            var team1;
            var team2;
            var winningTeam;
            var indice;
            var matchNumber=0;
            var round;
            $("input").each(function (index){
                    indice = $( this ).attr("data-indice");
                    if (indice == 1) {
                        value1 = $( this ).val();
                        team1=$( this ).attr("data-teamID");
                    }
                    else if (indice == 2) {
                        matchNumber++;
                        value2 = $( this ).val();
                        team2=$( this ).attr("data-teamID");
                        winningTeam = value1 == value2 ? -1 : (value1>value2 ? team1 : team2);
                        button= $("#btnselect" + matchNumber);
                        button.attr("data-score1", value1).attr("data-score2", value2).attr("data-winning-team", winningTeam);
                        if(winningTeam!=-1){
                            round = parseInt($(this).attr("data-round"));
                            var teambuttons= $("button[data-round='"+(round+1)+"'][data-teamID='"+winningTeam+"']");
                            if(teambuttons.size() == 0) {
                                button.removeClass("btn-danger").addClass("btn-success");
                                button.attr("disabled", false);

                                //check for non vide for a round
                                var videbuttons= $("button[data-round='"+(round)+"'][data-void='"+1+"']");
                                if(videbuttons.size() != 0) {
                                    button.removeClass("btn-success").addClass("btn-danger");
                                    button.attr("disabled", true);
                                }
                            }else{
                                button.removeClass("btn-danger").addClass("btn-warning");
                                button.removeClass("fa-arrow-circle-right").addClass("fa-times");
                                button.attr("disabled", true);
                            }
                        }else{
                            button.removeClass("btn-success").addClass("btn-danger");
                            button.attr("disabled", true);
                        }
                    }
            })

            //team without match -> autoselect the last one
            var toReplace = $(':button[data-void=2]')
            $(toReplace).each(function(index){
                round = $(this).attr("data-round");
                var teambutton = $(":button[data-round="+(round-1)+"][name=btnselect]:enabled");
                teambutton.removeClass("btn-danger").addClass("btn-warning");
                teambutton.removeClass("fa-arrow-circle-right").addClass("fa-times");
                teambutton.attr("disabled", true);
                var winningTeam = $(teambutton).attr("data-winning-team");

                var teamBut = $(":button[data-teamid="+winningTeam+"][data-round="+(round-1)+"]");
                toReplace.replaceWith($(teamBut).clone());
                var buttonSelect = $("#btnselectVoid"+round);
                buttonSelect.attr("data-winning-team", winningTeam);
                buttonSelect.removeClass("btn-danger").addClass("btn-warning");
                buttonSelect.removeClass("fa-arrow-circle-right").addClass("fa-times");
                buttonSelect.attr("disabled", true);
            })

            // check if all team selected once -> autofill the remaining 2 match
            var buttonsSelect = $(':button[data-void=1]');
            $(buttonsSelect).each(function(index){
                round = $(this).attr('data-round');
                var buttonsEnableSelect = $(':button[data-round='+(round-1)+']:enabled');
                if(buttonsEnableSelect.size() == 0){ //no team to select available -> auto-fill the remaining match
                    var buttonsDisableSelect = $(':button[data-round='+(round-1)+'][name=btnselect]:disabled');
                    matchID = $(this).attr('data-matchID');
                    indice = $(this).attr('data-indice');
                    var buttonDisable = $(buttonsDisableSelect).get(2-index);
                    teamID = $(buttonDisable).attr("data-winning-team");
                    data = {'matchID': matchID, 'indice': indice, 'teamID': teamID};
                    SelectTeam(data, false);
                    if(index==2){setTimeout(function(){location.reload();},1000);}
                }
            })

        }
    </script>

    <script>
        function saveScore(e){
            var input = e.target;

            var teamId = input.getAttribute("data-teamID");
            var matchId = input.getAttribute("data-matchID");
            var score = input.value;
            var indice = input.getAttribute("data-indice");
            var url="../pages/php/add-score-knock-off.php";
            var data={ 'idT':teamId, 'idM':matchId, 'score':score, 'indice':indice};

            $.ajax({
                type: "POST",
                url: url,
                data: data
            });
            updateButton();
        }
    </script>

    <script>
        function autoselectTeam(e){
            var target = e.target;

            var emptySlot = $(':button[data-void=1],[data-void=2]:first');
            var teamWithoutMatch = emptySlot.attr("data-void") == 2 ? true : false;
            var matchID = parseInt(emptySlot.attr("data-matchID"));
            var indice = parseInt(emptySlot.attr("data-indice"));
            var teamID = parseInt(target.getAttribute("data-winning-team"));
            var round= parseInt(target.getAttribute("data-round"));

            //check if team already in the next round.
            var teambuttons= $("button[data-round='"+(round+1)+"'][data-teamID='"+teamID+"']");
            if(teambuttons.size() == 0) { //add the team
                if(!teamWithoutMatch) {
                    var data = {'matchID': matchID, 'indice': indice, 'teamID': teamID};
                    if (teamID != -1) {
                        SelectTeam(data, true);
                    }
                }else{ //this is the last team without match -> generate the 3 match for the final
                    var teamBut = $(":button[data-teamid="+teamID+"][data-round="+round+"]");
                    var toReplace = $(':button[data-void=2][data-round='+(round+1)+']:first')
                    toReplace.replaceWith($(teamBut).clone());

                }
            }
        }
    </script>

    <script>
        function SelectTeam(data, autoreload) {
            var url ="php/select-team-knock-off.php";
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'text',
                data: data,
                success: function (text) {
                    if (text == "success") {
                        location.reload();

                    } else {
                        $('form-messages-rep').text("Error");
                        if(autoreload) {location.reload();}
                    }
                },
                error: function (text) {
                    alert("Error:" + text);
                }
            });
        }
    </script>

    <script>$(':input').change(saveScore);</script>
    <script>$("[name=btnselect]").click(autoselectTeam);</script>

</body>

</html>
