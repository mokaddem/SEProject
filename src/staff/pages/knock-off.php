<!DOCTYPE html>
<html lang="en">
<!-- Page de modification du tournoi knock-off (echange d'équipes et terrains) -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Knock-Off</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../../images/icon.ico">
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
                        <h1 class="page-header">Modifier le Knock-Off
                          <?php $jour =$_GET['jour'] ?>
                          <a class="btn btn-default btn-outline pull-right" href="./php/print-knock-off.php?jour=<?=$jour?>" target="_blank"><i class="fa fa-print fa-fw"></i> Print</a>
                          <button class="btn btn-info pull-right fa fa-question-circle" onclick="checkCourts();" style="font-size: 55%" data-toggle="tooltip" data-placement="left" title="Vérifier que les terrains sont différents"></button>
                        </h1>
                    </div>
                </div>
                    <!-- /.col-lg-12 -->
                <div class="row">
                    <?php if (array_key_exists("generate", $_GET)) {?>
                        <?php if ($_GET["generate"] == "true") {?>
                        <div class="col-lg-8 alert alert-success">
                            <b>Opération réussite !</b>
                            La génération du tournoi est terminée. Vous pouvez à présent le modifier comme bon vous semble.
                        </div>
                        <?php } else{ ?>
                            <div class="col-lg-8 alert alert-danger">
                                <b>Echec de l'opération !</b>
                                Y a-t-il assez de vainqueur sélectionné pour ce jour ?
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="row">
                    <ul class="nav nav-tabs">
                        <li <?php if ($_GET[ 'jour']=="sam" ) echo 'class="active" ' ;?>><a href="knock-off.php?jour=sam&cat=0" >Samedi <i class="fa fa-venus-mars" style="font-size: 150%"></i> </a></li>
                        <li <?php if ($_GET[ 'jour']=="dim" ) echo 'class="active" ' ;?>><a href="knock-off.php?jour=dim&cat=0">Dimanche <i class="fa fa-venus" style="font-size: 150%"></i> || <i class="fa fa-mars" style="font-size: 150%"></i></a></li>
                    </ul>
                    <div class="panel panel-default">
                    <ul class="nav nav-pills nav-justified">
                        <?php $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, KnockoffSaturday WHERE KnockoffSaturday.Category = Categorie.ID');
                        if ($_GET['jour'] == "dim") {
                          $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, KnockoffSunday WHERE KnockoffSunday.Category = Categorie.ID');
                        }
                            while ($donnes = $reponse->fetch_array()) { ?>
                              <?php if ($_GET['cat']=="0") { ?>
                                <script>document.location.href="./knock-off.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>";</script>
                              <?php  } ?>
                              <li <?php if ($_GET['cat']==$donnes['ID'] ) echo 'class="active" ';?>><a href="knock-off.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>"><?=utf8_encode($donnes['Designation'])?></a></li>
                            <?php }?>
                    </ul></div>
                </div>
                <div class="row">
                    <br/>
                </div>
                <div class="row">
                    <nav class="navbar navbar-inverse navbar-perso navbar-fixed-bottom">
                        <div class="container">
                            <form id="echanger" class="navbar-form" action="./php/knock-off-switch.php?jour=<?=$_GET['jour']?>&cat=<?=$_GET['cat']?>" method="post">
                                <input type="submit" class="btn btn-success pull-right" value="Echanger" />
                                <span class="pull-right"> </span><input type="text" class="form-control pull-right" id="idteam2" name="idteam2" placeholder="ID Equipe 2" required>
                                <p class="pull-right"> </p><input type="text" class="form-control pull-right" id="idteam1" name="idteam1" placeholder="ID Equipe 1" required>
                                <span class="pull-left" data-toggle="pList" data-target="#pList" data-url="./php/group-note-vide.php">
                                  <button class="btn btn-default">
                                    <i class="fa fa-chevron-down"></i>
                                  </button>
                                </span>
                            </form>

                            <br/><br/>
                            <div class="col-lg-8" id="pList"></div>
                        </div>
                    </nav>
                </div>
                <div class="row text-center">
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
                            <?php } else {
                                ?> <h4><b> Modifier les équipes et les terrains pour le premier tour</b></h4>
                                <br/>
                                <label> Tour 1 </label>
                            <div class="col-lg-12 text-center vcenter">
                            <?php
                                $maxCol = 4; // Nombre maximum de colonnes.
                                $col = 0;
                                $numberFirstRound = ($numberOfMatch+1)/2;
                                $s_a_m = "server-other-menu";
                                for ($i = 1; $i <= $numberFirstRound; $i++) {
                                    if ($col % $maxCol == 0){
                                        ?> </div>
                                        <div class="col-lg-12">
                                        <?php
                                    }
                                ?> <div class="col-lg-3 text-center"> <?php
                                    if ($s_a_m == "server-action-menu") {
                                        $s_a_m = "server-other-menu";
                                    } else {
                                        $s_a_m = "server-action-menu";
                                    }
                                    $knockoff = $knockoff_all->fetch_array();
                                    $match = $db->query("SELECT * FROM `Match` WHERE ID =" . $knockoff['ID_Match'])->fetch_array();
                                        ?>
                                        <div class="form-group text-center <?=$s_a_m?>"  data-groupID="<?=$knockoff['ID']?>" data-day="<?=$_GET['jour']?>" data-category="<?=$_GET['cat']?>" data-teamNum="2" data-matchID="<?=$match['ID']?>" >
                                            <label for="sel1"><span class="fa fa-users"></span> Match <?= $i ?> </label>
                                            <?php
                                            if ($match['ID_Equipe2'] == -2) {
                                                // Dans le cas d'un match où une équipe est seule.
                                                $aloneTeam = true;
                                                ?> <label class="text-danger">Cette équipe commence au second tour</label>
                                                <?php
                                            }
                                            displayMatch($match, $i, $db);
                                             ?>
                                         </div>
                                    </div> <?php
                                    $col++;
                                }
                                if ($numberFirstRound > 0){
                            ?>

                            </div>
                            <div class="col-lg-12 text-center">
                                <h4><b>Modifier les terrains pour les tours suivants</b></h4>
                                <?php
                                $matchNum = $numberFirstRound+1;
                                $numberOfTeams = $numberFirstRound;
                                for ($round = 2; $matchNum <= $numberOfMatch; $round++) {
                                    $s_a_m = "server-new-menu";
                                    if (($round-1)%4 == 0){ ?>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <h4><b>Modifier les terrains pour les tours suivants</b></h4>
                                    <?php
                                    }
                                    ?>
                                    <div class="col-lg-3 text-center  vcenter">
                                        <label> Tour <?= $round ?> </label>
                                        <?php
                                        if ($numberOfTeams == 2){
                                            ?> <br/> <label class="text-danger"> FINALE </label> <?php
                                        }
                                        for ($j = 0; $j < $numberOfTeams / 2; $j++) {
                                            if ($_GET['jour'] == "sam") {
                                                $knockoff = $db->query('SELECT * FROM KnockoffSaturday WHERE Position='.$matchNum)->fetch_array();
                                            } elseif ($_GET['jour'] == "dim") {
                                                $knockoff = $db->query('SELECT * FROM KnockoffSunday WHERE Position='.$matchNum)->fetch_array();
                                            }
                                            $matchRep = $db->query("SELECT * FROM `Match` WHERE ID =".$knockoff['ID_Match']);
                                            $match = $matchRep->fetch_array();
                                            ?>
                                            <div class="form-group <?= $s_a_m ?>" data-day="<?= $_GET['jour'] ?>"
                                                 data-category="<?= $_GET['cat'] ?>" data-matchID="<?= $match['ID'] ?>">
                                                <?php displayVoidMatch($match, $matchNum, $db); ?>
                                            </div>
                                            <?php
                                            $matchNum++;
                                        } ?>
                                    </div>
                                    <?php
                                    $numberOfTeams = $numberOfTeams / 2;
                                }
                                }?>
                                    </div>
                                <!-- Registration form - END -->
                            </div>
                    <?php }?>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    </div>

    <!-- Display functions -->
    <?php
    function displayVoidMatch($match, $position, $db){ ?>
        <label for="sel1"><span class="fa fa-users"></span> Match <?=$position?> </label>
        <select class="form-control" id="sel<?=$position?>" name="ExpandableListTerrain">
            <?php
            $terrains = $db->query('SELECT * FROM Terrain');
            while ($terrain = $terrains->fetch_array()) { ?>
                <option value=<?=$terrain['ID']?> <?php if ($match['ID_Terrain']==$terrain['ID']) { echo "selected=\"selected\""; }?> >
                    <?=$terrain['ID']?> : [<?=utf8_encode($terrain['Type']);?>/<?=utf8_encode($terrain['etat']);?>] <?=utf8_encode($terrain['Note']);?> (<?=utf8_encode($terrain['adresse']);?>)
                </option>
            <?php
            }
            ?>
        </select>
        <?php
    }

    function displayMatch($match, $position, $db){
        if ($match['ID_Equipe2'] != -2){ ?>
            <select class="form-control" id="sel<?= $position ?>" name="ExpandableListTerrain">
                <?php
                $terrains = $db->query('SELECT * FROM Terrain');
                while ($terrain = $terrains->fetch_array())
                { ?>
                    <option value=<?=$terrain['ID']?> <?php if ($match['ID_Terrain']==$terrain['ID']) { echo "selected=\"selected\""; }?> >
                        <?=$terrain['ID']?> : [<?=utf8_encode($terrain['Type']);?>/<?=utf8_encode($terrain['etat']);?>] <?=utf8_encode($terrain['Note']);?> (<?=utf8_encode($terrain['adresse']);?>)
                    </option>
                <?php }
                ?>
            </select>
        <?php } ?>

        <label></label>
        <?php
        for ($j = 1; $j <= 2; $j++) {
            $teamID = $match["ID_Equipe" . $j];
            $team = $db->query('SELECT * FROM Team WHERE ID= ' . $teamID . ' AND ID_Cat=' . $_GET['cat'] . ' ')->fetch_array();
            $IDPersonne1 = $team['ID_Player1'];
            $player1 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne1 . "\"")->fetch_array();

            $IDPersonne2 = $team['ID_Player2'];
            $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne2 . "\"")->fetch_array();
            if ($match['ID_Equipe2'] == 0) {
                $j++;
            }
            $ranking = ($team['AvgRanking'] == NULL) ? "NC" : $team['AvgRanking'];
            ?>
            <div class="form-group text-center">
            <?php
            $color = "default";
            $videOrNot = "-vide";
            if (!empty($player1['LastName'])) {
                if ($player1['Note'] || $player2['Note']) {
                    $color = "primary";
                    $videOrNot = "";
                } ?>
                <span data-toggle="pList" data-target="#pList" data-url="./php/knock-off-note<?= $videOrNot ?>.php?id=<?= $teamID ?>">
                    <div class="btn btn-<?= $color ?> btn-outline draggable dropper" data-toggle="idteam1" data-target="#idteam1" data-id="<?= $teamID ?>"  >
                        [<?= $ranking ?>]
                        <?= utf8_encode($player1['LastName']) ?> &
                        <?= utf8_encode($player2['LastName']) ?>
                    </div>
                </span>
            <?php } ?>
            </div>
        <?php }
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

    <script>
        (function() {
            var dndHandler = {
                draggedElement: null,
                dropperDefaultStyle1: "btn btn-default btn-outlineW draggable dropper",
                dropperDefaultStyle2: "btn btn-primary btn-outlineW draggable dropper",
                dropperDefaultStyle3: "btn btn-default btn-outline draggable dropper",
                dropperContainerDefaultStyle1: "col-lg-3 server-action-menu dropper",
                dropperContainerDefaultStyle2: "col-lg-3 server-other-menu dropper",
                draggedDefaultStyle: null,

                applyDragEvents: function(element) {
                    element.draggable = true;
                    var dndHandler = this;
                    element.addEventListener('dragstart', function(e) {
                        dndHandler.draggedElement = e.target;
                        dndHandler.draggedDefaultStyle = e.target.getAttribute("class");
                        e.dataTransfer.setData('text/plain', '');
                    }, false);
                },

                applyDropEvents: function(dropper) {
                    dropper.addEventListener('dragover', function(e) {
                        e.preventDefault();
                        var target = e.target; console.log(target);
                        var flag_target_ok = true;
                        if(!(target.className !== undefined)){flag_target_ok=false;}
                        else {
                            while (target.className.indexOf('dropper') == -1) { // Cette boucle permet de remonter jusqu'à la zone de drop parente
                                target = target.parentNode;
                            }
                        }
                        dndHandler.dropperDefaultStyle = target.getAttribute("class");

                        var flag_hover = false;
                        var flag_red = false;
                        var classList = e.target.className.split(/\s+/);
                        for (var i = 0; i < classList.length; i++) {
                            if (classList[i] == "drop_hover" || classList[i] == "drop_hover_green") { flag_hover = true;}
                            if (classList[i] == "switcher_to_green") { flag_red = true;}
                        }

                        if(flag_hover) {// On revient au style de base lorsque l'élément quitte la zone de drop
                            //do nothing
                        }
                        else {
                            if (target.getAttribute("name") != null) {
                                if (target.getAttribute("name") == "divGroupContainer") { // Et on applique le style adéquat à notre zone de drop quand un élément la survole
                                    if(flag_red){ target.className += " drop_hover_green";}
                                    else{
                                        if($(target).attr("data-groupnum") == $(dndHandler.draggedElement).attr("data-groupnum")){ //On applique le style seulement si le draggred est dans un group différent
                                            //do nothing
                                        }
                                        else{this.className += " drop_hover";}
                                    }
                                } else if(target.getAttribute("name") == "button-player") {
                                    if(flag_red){ target.className += " drop_hover_green";}
                                    else{this.className += " drop_hover";}
                                }else if(flag_target_ok){
                                    if(flag_red){ target.className += " drop_hover_green";}
                                    else{target.className += " drop_hover";}
                                }
                            }
                        }


                    }, false);

                    dropper.addEventListener('dragleave', function(e) {
                        var target = e.target;
                        while (target.className.indexOf('dropper') == -1) { // Cette boucle permet de remonter jusqu'à la zone de drop parente
                            target = target.parentNode;
                        }
                        var flag_hover = false;
                        var classString="";
                        var classList = target.className.split(/\s+/);
                        for (var i = 0; i < classList.length; i++) {
                            if (classList[i] == "drop_hover" || classList[i] == "drop_hover_green") {
                                flag_hover=true;
                            }else{
                                classString += (classList[i] + " ");
                            }
                        }

                        if (e.target.getAttribute("name") != null) {
                            if(flag_hover){ // On revient au style de base lorsque l'élément quitte la zone de drop
                                this.className = classString;
                            }
                        }
                    });
                    var dndHandler = this;

                    dropper.addEventListener('drop', function(e) {
                        var target = e.target;
                        while (target.className.indexOf('dropper') == -1) { // Cette boucle permet de remonter jusqu'à la zone de drop parente
                            target = target.parentNode;
                        }
                        draggedElement = dndHandler.draggedElement; // Récupération de l'élément concerné

                        var classString="";
                        var classList = target.className.split(/\s+/);
                        for (var i = 0; i < classList.length; i++) {
                            if (classList[i] == "drop_hover" || classList[i] == "drop_hover_green") {
                                flag_hover=true;
                            }else{
                                classString += (classList[i] + " ");
                            }
                        }
                        target.className = classString; // Application du style par défaut

                        var draggedElement_id = $(draggedElement).attr('data-id');
                        var draggedElement_teamNum = $(draggedElement).attr('data-teamNum');
                        var draggedElement_groupNum = $(draggedElement).attr('data-groupNum');
                        var target_id = $(target).attr('data-id');
                        var target_teamNum = $(target).attr('data-teamNum');
                        var target_groupNum = $(target).attr('data-groupNum');
                        if(target.getAttribute("name") == "divGroupContainer"){
                            target_id = -1;
                            target_teamNum = $(target).attr('data-teamNum');
                            target_groupNum = $(target).attr('data-groupID');
                        }
                        init_the_swap(draggedElement_id, target_id);
                    });
                }
            };
            var elements = document.querySelectorAll('.draggable'),
                elementsLen = elements.length;
            for (var i = 0 ; i < elementsLen ; i++) {
                dndHandler.applyDragEvents(elements[i]); // Application des paramètres nécessaires aux éléments déplaçables
            }
            var droppers = document.querySelectorAll('.dropper'),
                droppersLen = droppers.length;
            for (var i = 0 ; i < droppersLen ; i++) {
                dndHandler.applyDropEvents(droppers[i]); // Application des événements nécessaires aux zones de drop
            }
        })();
    </script>

    <script>
        function init_the_swap(draggedElement_id, target_id){
            document.getElementById('idteam1').value = draggedElement_id;
            document.getElementById('idteam2').value = target_id;
            var myForm = document.getElementById('echanger');
            myForm.submit();
        }
    </script>


    <script type="text/javascript">
        // On click, get html content from url and update the corresponding modal
        $("[data-toggle='pList']").on("click", function (event) {
            event.preventDefault();
            var url = $(this).attr('data-url');
            var modal_id = $(this).attr('data-target');
            $.get(url, function (data) {
                $(modal_id).html(data);
            });
        });

        $("[data-toggle='idteam1']").on("click", function (event) {
            var id = $(this).attr('data-id');
            if (document.getElementById('idteam1').value == "") {
                document.getElementById('idteam1').value = id;
            } else if (document.getElementById('idteam1').value != "" && document.getElementById('idteam2').value != "") {
                document.getElementById('idteam1').value = id;
                document.getElementById('idteam2').value = "";
            } else {
                document.getElementById('idteam2').value = id;
            }
        });
    </script>

    <script>
        function saveCourt(e){
            var dropDownList = document.getElementById(e.target.id);

            var CatID = dropDownList .parentNode.getAttribute('data-category');
            var Day = dropDownList .parentNode.getAttribute('data-day');
            var matchID = dropDownList .parentNode.getAttribute('data-matchID');

            var js_idT = dropDownList.options[dropDownList.selectedIndex].value;
            var js_idC = CatID ;
            var js_jour=  Day;
            var js_matchID = matchID;
            var url="../pages/php/inc/edit-court-knock-off.php";

            var data={ 'idT':js_idT, 'idC':js_idC, 'idM' : js_matchID, 'jour': js_jour };
            console.log(data);
            $.ajax({
                type: "POST",
                url: url,
                data: data
            });
        }
    </script>

    <script>
        function checkCourts(){
            var url ="./php/inc/check-terrain.php";
            $.ajax({
                type: 'POST',
                url: url,
                dataType: "json",
                data: {'day':"<?=$_GET['jour']?>", 'type':"knock"},
                success: function (response_array) {
                    if (response_array['rep'] == "success") {
                        alert("OK: Tous les groupes utilisent des terrains différents.");
                    } else {
                        $('form-messages-rep').text("Error");
                        alert("Attention: "+response_array['rep']);
                    }
                },
                error: function (response_array) {
                    console.log(response_array);
                    alert("Error:" + response_array['rep']);
                }
            });
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var i=0;
            while(document.getElementsByName("ExpandableListTerrain")[i] != null){
                var List = document.getElementsByName("ExpandableListTerrain")[i];
                i++;
                List.addEventListener("change", saveCourt);
            }
            $('[data-toggle="tooltip"]').tooltip();
        });

    </script>

</body>

</html>
