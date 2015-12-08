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
        $reponse = $db->query('SELECT * FROM GlobalVariables WHERE `Name` = "tournament_started_'.$_GET['jour'].'"');
        $rep = $reponse->fetch_array();
        $canEdit = $rep['Value'] == "0" ? "" : "disabled";
        ?>


            <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Modifier les poules</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                  <?php if (array_key_exists("error", $_GET)) {?>
                      <?php if ($_GET["error"] == "nodata") {?>
                          <div class="col-lg-8 alert alert-danger text-center">
                              <b>Erreur</b>
                              Vous devez renseigner deux ID d'équipes.
                          </div>
                      <?php }
                  } ?>

                    <?php if (array_key_exists("submitting", $_GET)) {?>
                        <?php if ($_GET["submitting"] == "correct") {?>
                            <div class="col-lg-8 alert alert-success text-center">
                                <b>Opération réussite !</b>
                                Succès lors de l'enregistrement des groupes.
                            </div>
                        <?php } else { ?>
                            <div class="col-lg-8 alert alert-danger text-center">
                                <b>Echec de l'opération !</b>
                                Certains groupes utilisent le même terrain.
                            </div>
                    <?php } } ?>
                </div>

                <div class="row">
                    <?php
                    if (array_key_exists("generate", $_GET)) {?>
                        <?php
                        if ($_GET["generate"] == "true") {?>
                            <div class="col-lg-8 alert alert-success">
                            <b>Opération réussite !</b>
                            La génération des groupes est terminée. Vous pouvez à présent les modifier à souhait.
                            </div>
                        <?php } else{ ?>
                            <div class="col-lg-8 alert alert-danger">
                            <b>Echec de l'opération !</b>
                            Y a-t-il assez d'équipes dans la catégorie sélectionnée ?
                            </div>
                        <?php }
                    } ?>
                </div>


                <!-- Registration form - START -->
                <div class="row">
                    <ul class="nav nav-tabs">
                        <li <?php if ($_GET[ 'jour']=="sam" ) echo 'class="active" ' ;?>><a href="group.php?jour=sam&cat=0" >Samedi <i class="fa fa-venus-mars" style="font-size: 150%"></i> </a></li>
                        <li <?php if ($_GET[ 'jour']=="dim" ) echo 'class="active" ' ;?>><a href="group.php?jour=dim&cat=0">Dimanche <i class="fa fa-venus" style="font-size: 150%"></i> || <i class="fa fa-mars" style="font-size: 150%"></i></a></li>
                        <div class="col-lg-2 text-center">
                            <div class="alert alert-success" id="popupSave" >Terrain enregistré</div>
                        </div>
                    </ul>
                    <div class="panel panel-default">
                    <ul class="nav nav-pills nav-justified">
                        <?php $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, GroupSaturday WHERE GroupSaturday.ID_Cat = Categorie.ID');
                        if ($_GET['jour'] == "dim") {
                          $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, GroupSunday WHERE GroupSunday.ID_Cat = Categorie.ID');
                        }
                            while ($donnes = $reponse->fetch_array()) {
                              ?>
                              <?php if ($_GET['cat']=="0") { ?>
                                <script>document.location.href="./group.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>";</script>
                              <?php  } ?>
                                <li <?php if ($_GET['cat']==$donnes['ID'] ) echo 'class="active" ';?>><a href="group.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>"><?=utf8_encode($donnes['Designation']);?></a></li>
                            <?php }?>
                    </ul>
                    </div>
                </div>
                <div class="row">
                    <br/>
                </div>
                <div class="row">
                    <nav class="navbar navbar-inverse navbar-perso navbar-fixed-bottom">
                        <div class="container">
                            <form id="echanger" class="navbar-form" action="./php/group-switch.php?jour=<?=$_GET['jour']?>&cat=<?=$_GET['cat']?>" method="post">
                                <input <?=$canEdit?> type="submit" class="btn btn-success pull-right" value="Echanger"/>
                                <span class="pull-right"> </span><div class="pull-right well well-sm" id="p2">Cliquez sur une équipe</div>
                                <p class="pull-right"> </p><div class="pull-right well well-sm" id="p1">Cliquez sur une équipe</div>

                              <span class="pull-left" data-toggle="pList" data-target="#pList" data-url="./php/group-note-vide.php">
                                <button <?=$canEdit?> class="btn btn-default">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                            </span>
                              <input type="text" id="idteam2" name="idteam2" placeholder="Cliquez sur une équipe" class="hidden" required/>
                              <input type="text" id="idteam1" name="idteam1" placeholder="Cliquez sur une équipe" class="hidden" required/>
                                <input name="teamNumberG1" id="teamNumberG1" class="hidden" value="" />
                                <input name="teamNumberG2" id="teamNumberG2" class="hidden" value="" />
                                <input name="groupID1" id="groupID1" class="hidden" value="" />
                                <input name="groupID2" id="groupID2" class="hidden" value="" />
                            </form>
                            <div class="col-lg-8" id="pList"></div>
                        </div>
                    </nav>
                </div>
                  <?php
                      $db = BDconnect();
                      $nullAp = "''";
                      if ($_GET['jour'] == "sam"){
                          $q1='SELECT * , GroupSaturday.ID AS Gid FROM GroupSaturday, Team WHERE (GroupSaturday.ID_t1 = Team.ID AND Team.ID_Cat = '.$_GET['cat'].') UNION ALL SELECT GroupSaturday.*, '.$nullAp.' as ID,'.$nullAp.' as ID_Player1,'.$nullAp.' as ID_Player2,'.$nullAp.' as ID_Cat,'.$nullAp.' as NbWinMatch,'.$nullAp.' as AvgRanking,'.$nullAp.' as Group_Vic, GroupSaturday.ID AS Gid FROM GroupSaturday WHERE GroupSaturday.ID_t1 = -1';
                          $groups = $db->query($q1);
                      } else{
                          $q1='SELECT * , GroupSunday.ID AS Gid FROM GroupSunday, Team WHERE (GroupSunday.ID_t1 = Team.ID AND Team.ID_Cat = '.$_GET['cat'].') UNION ALL SELECT GroupSunday.*, '.$nullAp.' as ID,'.$nullAp.' as ID_Player1,'.$nullAp.' as ID_Player2,'.$nullAp.' as ID_Cat,'.$nullAp.' as NbWinMatch,'.$nullAp.' as AvgRanking,'.$nullAp.' as Group_Vic, GroupSunday.ID AS Gid FROM GroupSunday WHERE GroupSunday.ID_t1 = -1';
                          $groups = $db->query($q1);
//                                $groups = $db->query('SELECT *, GroupSunday.ID as Gid FROM GroupSunday, Team WHERE GroupSunday.ID_t1 = Team.ID AND Team.ID_Cat = '.$_GET['cat'].') OR (GroupSunday.ID_t1=-1 AND GroupSunday.ID_t2=NULL');

                      }
                      ?>
                  <div class="row">
                      <div class="text-center">

                      <?php
                      $lineNum = 3;
                      $j = 4;
                      $s_a_m = "";
                      $k = 0;

                      while($group = $groups->fetch_array()){//k loop
                          $k++;
                          if ($s_a_m == "server-action-menu") {
                              $s_a_m = "server-other-menu";
                          } else {
                              $s_a_m = "server-action-menu";
                          }
                          $j++;
                          if ($j > $lineNum){
                              $j = 0; ?>
                              </div>
                            </div>

                            <div class="row">
                              <br/>
                            </div>

                            <div class="row">
                                <div class="text-center">
                        <?php  }
                          if ($group != NULL){?>
                              <?php
                              $teamNum=8;
                              while($group["ID_t".$teamNum] == null){
                                  $teamNum--;
                              }
                              ?>
                          <div class="col-lg-3 <?=$s_a_m?> dropper"  name="divGroupContainer" id="divGroup<?=$k?>" data-groupID="<?=$group['Gid']?>" data-day="<?=$_GET['jour']?>" data-category="<?=$_GET['cat']?>" data-teamNum="<?=$teamNum?>" data-groupNum="<?=$group["Gid"]?>">
                              <div>
                                  <button name="button_mail" class="fa fa-envelope default pull-left" data-groupID="<?=$group['Gid'] ?>" style="font-size: 120%; margin-right: -5px;"></button>
                              <label>
                                  <span class="fa fa-users"></span> Groupe <?= $k?>
                                  <a class="" <?php if(!$canEdit){?> href="php/delete-group.php?id=<?=$group['Gid']?>&textDay=<?=$_GET['jour']?>&jour=<?=$_GET["jour"]?>&cat=<?=$_GET['cat']?>" <?php }?> <?php if(!$canEdit){?> onclick="return confirm('Voulez-vous vraiment supprimer ce groupe ?');" <?php }?> ><i class="fa fa-trash-o"></i></a>
                              </label>
                              </div>
                                <form name="tous" action="mailTous.php" method="post">
                                  <input type='submit' name='tous_<?php echo $group['Gid']?>' value='Tous'> </input></form>
                                <form name="leaderMail" action="mailLeader.php" method="post">
                                  <input type="submit" name="leaderMail_<?php echo $group['Gid']?>" value="Leader"></form>
                              <form name="NPMail" action="mailNP.php" method="post">
                                  <input type="submit" name="NP_<?php echo $group['Gid']?>" value="Non Payé">
                              </form>
                              <div class="form-group" >
                                  <label class=""><span class="fa fa-users"></span> Terrain</label>
                                  <select <?=$canEdit?> class="form-control" id="terrain <?=$k?>" name="ExpandableListTerrain">
                                      <?php
                                              $terrains = $db->query('SELECT * FROM Terrain');
                                              while ($terrain = $terrains->fetch_array())
                                              { ?>
                                                  <option class="" value=<?=$terrain['ID']?> <?php if ($group['ID_terrain']==$terrain['ID']) { echo "selected=\"selected\""; }?> >
                                                          <?=$terrain['ID']?> : [<?=utf8_encode($terrain['Type']);?>/<?=utf8_encode($terrain['etat']);?>] <?=utf8_encode($terrain['Note']);?> (<?=utf8_encode($terrain['adresse']);?>)
                                                  </option>
                                          <?php }
                                          ?>
                                  </select>
                              </div>

                              <label class=""><span class="fa fa-users"></span> Equipes </label>
                              <?php
                              for ($i = 1; $i <= $teamNum; $i++) {
                                      $teamID = $group["ID_t".$i];
                                      $team = $db->query("SELECT * FROM Team WHERE ID=\"".$teamID."\"")->fetch_array();

                                      $avgRanking = $db->query("SELECT * FROM Team WHERE ID=\"".$teamID."\"")->fetch_array();
                                      $avgRanking = $avgRanking['AvgRanking'] != "" ? $avgRanking['AvgRanking'] : "NC" ;

                                      $IDPersonne = $team['ID_Player1'];
                                      $player = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne."\"")->fetch_array();

                                      $IDPersonne2 = $team['ID_Player2'];
                                      $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne2."\"")->fetch_array();
                                      ?>
                                  <div class="form-group text-center" name="divButtonContainer" data-index="<?=$k?>">
                                  <?php $captainText = $teamID == $group['ID_Leader'] ? "fa fa-user text-success " : "fa fa-arrow-circle-o-up"; ?>
                                  <?php if($group['ID_t1']>0){?>
                                  <a <?=$canEdit?> class="" data-toggle="tooltip" data-placement="left" title="<?php if($teamID == $group['ID_Leader']){echo "Leader de poule";} else{echo "Assigner cette équipe en tant que leader de poule";}?>" <?php if(!$canEdit){?> href="php/promote-leader.php?id=<?=$group['Gid']?>&textDay=<?=$_GET['jour']?>&jour=<?=$_GET["jour"]?>&teamID=<?=$teamID?>&cat=<?=$_GET['cat']?>" <?php }?> ><i class="<?=$captainText?>"></i></a>
                                  <?php }?>
                                      <?php $color = "default";
                                      $videOrNot = "-vide";
                                      // N'AFFICHE RIEN SI LE NOM DU PREMIER JOUEUR EST VIDE
                                      // MET EN BLEU ET UN LIEN VERS LA NOTE SI LE JOUEUR EN A UNE
                                      if (!empty($player['LastName'])) {
                                      if (($player['Note'] || $player2['Note'])) {
                                          $color = "primary";
                                          $videOrNot = "";
                                      }?>
                                          <?php // N'AFFICHE RIEN SI LE NOM DU PREMIER JOUEUR EST VIDE
                                       ?>
                                        <span class="" data-toggle="pList" data-target="#pList" data-url="./php/group-note<?=$videOrNot?>.php?id=<?=$teamID?>">
                                          <div <?=$canEdit?> class="btn btn-<?=$color?> btn-outlineW draggable dropper" name="button-player" data-toggle="idteam1" data-target="#idteam1" data-id="<?=$teamID?>" data-teamNum="<?=$teamNum?>" data-groupNum="<?=$group["Gid"];?>">
                                                        <?=utf8_encode($player['LastName'])?> &
                                                        <?=utf8_encode($player2['LastName'])?>
                                                        [<?=$avgRanking;?>]
                                    		</div>
                                        </span>

                                  </div>

                                  <?php

                              }
                                  else{
                                      echo "</div>";
                                  }
                              } ?>

                              <?php
                                  if($teamNum<8){ ?>
                                          <div class="form-group text-center">
                                              <div <?=$canEdit?> class="btn btn-default btn-outline draggable dropper" name="button-player" data-toggle="idteam1" data-target="#idteam1" data-id="-1" data-teamNum="<?=$teamNum?>" data-groupNum="<?=$group["Gid"]?>">Emplacement vide</div>
                                          </div>
                              <?php } ?>
                          </div>
                          <?php }
                              } // End of k loop.
                          if ($k == 0){ ?>
                              <div class="col-lg-3 alert alert-danger">
                                  Les groupes n'ont pas encore été générés pour cette catégorie et/ou ce jour.
                              </div>
                          <?php }

                          $j++;
                          if ($j > $lineNum){
                              $j = 0; ?>
                              </div>
                            </div>
                            <div class="row">
                                <div class="text-center">
                        <?php  } ?>


                          <?php if($k != 0) { ?>
                          <div class="col-lg-3 server-new-menu"  name="divGroupEmpty" id="divGroup<?=($k+1)?>" >
                              <label><span class="fa fa-users"></span> Groupe <?= $k+1?> </label>
                              <div class="form-group" >
                                  <button <?=$canEdit?> class="btn btn-default" id="createNewGroup" name="createNewGroup">
                                      Nouveau groupe
                                  </button>
                              </div>
                              <div>
                                  <div class="alert alert-success" id="popupCreate" >Nouveau groupe créé</div>
                              </div>
                          </div>
                          <?php } ?>

              </div>
              <!-- Registration form - END -->
          <!--</form>-->

            </div>
            <!-- /.row -->

        <!-- /#page-wrapper -->
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        </div>
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
                        var target = e.target;
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
                        init_the_swap(draggedElement_id, draggedElement_teamNum, draggedElement_groupNum, target_id, target_teamNum, target_groupNum);
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
        function init_the_swap(draggedElement_id, draggedElement_teamNum, draggedElement_groupNum, target_id, target_teamNum, target_groupNum){
            if(draggedElement_groupNum != target_groupNum && target_teamNum<8) {
                document.getElementById('idteam1').value = draggedElement_id;
                document.getElementById('teamNumberG1').value = draggedElement_teamNum;
                document.getElementById('groupID1').value = draggedElement_groupNum;
                document.getElementById('idteam2').value = target_id;
                document.getElementById('teamNumberG2').value = target_teamNum;
                document.getElementById('groupID2').value = target_groupNum;
                var myForm = document.getElementById('echanger');
                myForm.submit();
            }
        }
    </script>


    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $('[name="button_mail"]').popover({
                placement: 'right',
                html: true,
                title: "<i class='fa fa-envelope-o'> Envoyer un mail</i>",
                trigger: "focus",
                content: "<button name='mail_button' data-Mailtarget='mailTous' class='btn btn-info'>Groupe</button> <button name='mail_button' data-Mailtarget='mailLeader' class='btn btn-info'>Leader</button> <button name='mail_button' data-Mailtarget='mailNP' class='btn btn-warning'>Non payé</button>"
            }).on('shown.bs.popover', function (eventShown) {
                var $popup = $('#' + $(eventShown.target).attr('aria-describedby'));
                $popup.find(':button').click(function(){
                    sendTheMailTo($(this).attr('data-Mailtarget'), ($popup).attr("data-groupID"));
                });
            });
            if(<?php if(array_key_exists("popup",$_POST)){echo "true";}else{echo "false";} ?>) {
                setTimeout(function () {$('#popupCreate').fadeIn('slow');}, 0);
                setTimeout(function () {$('#popupCreate').fadeOut('slow');}, 3000);
            }
        });
    </script>

    <script>
        function checkForInvalideGroups(){
            var i=0;
            while(document.getElementsByName("divGroupContainer")[i] != null){
                var Div = document.getElementsByName("divGroupContainer")[i];
                if(Div.getAttribute('data-teamNum')<3){
                    HighlightTheDiv(Div);
                }
                i++;
            }
        }
    </script>

    <script>
        function HighlightTheDiv(Div){
            Div.className = "col-lg-3 server-invalide-menu switcher_to_green dropper";
            $(Div).children().addClass("switcher_to_green");
            $(Div).children().children().addClass("switcher_to_green");
            $(Div).children().children().children().addClass("switcher_to_green");
        }
    </script>

    <script>
        $('#popupSave').hide();
        $('#popupCreate').hide();
        checkForInvalideGroups();
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
            var teamNum = $(this).attr('data-teamNum');
            var groupNum = $(this).attr('data-groupNum');
            var contentHtml = $(this).text();
            // var contentHtml = $(this).text().replace(/ /g,'');
            if (document.getElementById('idteam1').value == "") {
                document.getElementById('p1').innerHTML = contentHtml;
                document.getElementById('idteam1').value = id;
                document.getElementById('teamNumberG1').value = teamNum;
                document.getElementById('groupID1').value = groupNum;
            } else if (document.getElementById('idteam1').value != "" && document.getElementById('idteam2').value != "") {
                document.getElementById('idteam1').value = id;
                document.getElementById('p1').innerHTML = contentHtml;
                document.getElementById('teamNumberG1').value = teamNum;
                document.getElementById('groupID1').value = groupNum;
                document.getElementById('idteam2').value = "";
                document.getElementById('p2').innerHTML = "Cliquez sur une équipe";
                document.getElementById('teamNumberG2').value = "";
                document.getElementById('groupID2').value = "";
            } else {
                document.getElementById('idteam2').value = id;
                document.getElementById('p2').innerHTML = contentHtml;
                document.getElementById('teamNumberG2').value = teamNum;
                document.getElementById('groupID2').value = groupNum;
            }
        });
    </script>

    <script>
          function saveCourt(e){
            var dropDownList = document.getElementById(e.target.id);

            var groupID = dropDownList .parentNode.parentNode.getAttribute('data-groupID');
            var CatID = dropDownList .parentNode.parentNode.getAttribute('data-category');
            var Day = dropDownList .parentNode.parentNode.getAttribute('data-day');

            var js_idT = dropDownList.options[dropDownList.selectedIndex].value;
            var js_idG = groupID ;
            var js_idC = CatID ;
            var js_jour=  Day;
            var url="../pages/php/inc/edit-court-group.php";

            var data={ 'idG':js_idG, 'idT':js_idT, 'idC':js_idC, 'jour': js_jour };

            $.ajax({
                type: "POST",
                url: url,
                data: data
            });
        }
    </script>

    <script>
        function CreateNewGroup(){
            var dropDownList = document.getElementById("terrain 1");

            var groupID = dropDownList .parentNode.parentNode.getAttribute('data-groupID');
            var CatID = dropDownList .parentNode.parentNode.getAttribute('data-category');
            var Day = dropDownList .parentNode.parentNode.getAttribute('data-day');
            var TerrainID = dropDownList.options[0].value;

            var js_idT = TerrainID;
            var js_idG = groupID;
            var js_idC = CatID;
            var js_jour= Day;
            var url="../pages/php/inc/create-new-empty-group.php";

            var data={ 'idG':js_idG, 'idT':js_idT, 'idC':js_idC, 'jour': js_jour };

            $.ajax({
                type: "POST",
                url: url,
                data: data

            });
            var redirURL = window.location.href;

            var data={ 'popup':true};

            var form = $('<form action="' + redirURL + '" method="post">' +
                '<input type="text" name="popup" value="' + true + '" />' +
                '</form>');
            $('body').append(form);
            form.submit();
        }

        function popup(){
            setTimeout(function() {  $('#popupCreate').fadeIn('slow');}, 0);
            setTimeout(function() {  $('#popupCreate').fadeOut('slow');},2000);
        }
    </script>

    <script>
        function sendTheMailTo(target, groupID){
            console.log(target + ", " + groupID);
            var url= target+".php";

            var data={ 'groupID':groupID}; //Data to POST

            $.ajax({
                type: "POST",
                url: url,
                data: data
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
            var buttonNewGroupe = document.getElementById("createNewGroup");
            buttonNewGroupe.addEventListener("click", CreateNewGroup);
        });

    </script>

</body>
<?php $reponse->free(); $groups->free(); ?>
</html>
