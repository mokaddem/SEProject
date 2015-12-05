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
                    <?php if (array_key_exists("generate", $_GET)) {?>
                        <div class="col-lg-8 alert alert-success">
                            <b>Opération réussite !</b>
                            <?php if ($_GET["generate"] == "true") {?>
                                La génération des groupes est terminée. Vous pouvez à présent les modifier à souhait.
                                <?php } ?>
                        </div>
                        <?php } ?>
                </div>


                <!-- Registration form - START -->
                <div class="row">
                    <ul class="nav nav-tabs">
                        <li <?php if ($_GET[ 'jour']=="sam" ) echo 'class="active" ' ;?>><a href="group.php?jour=sam&cat=1">Samedi</a></li>
                        <li <?php if ($_GET[ 'jour']=="dim" ) echo 'class="active" ' ;?>><a href="group.php?jour=dim&cat=1">Dimanche</a></li>
                        <div class="col-lg-2 text-center">
                            <div class="alert alert-success" id="popupSave" >Terrain enregistré</div>
                        </div>
                    </ul>
                    <ul class="nav nav-tabs nav-justified">
                        <?php $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, GroupSaturday WHERE GroupSaturday.ID_Cat = Categorie.ID');
                        if ($_GET['jour'] == "dim") {
                          $reponse = $db->query('SELECT DISTINCT Categorie.ID, Categorie.Designation FROM Categorie, GroupSunday WHERE GroupSunday.ID_Cat = Categorie.ID');
                        }
                            while ($donnes = $reponse->fetch_array()) { ?>
                                <li <?php if ($_GET['cat']==$donnes['ID'] ) echo 'class="active" ';?>><a href="group.php?jour=<?=$_GET['jour']?>&cat=<?=$donnes['ID']?>"><?=utf8_encode($donnes['Designation']);?></a></li>
                            <?php }?>
                    </ul>
                </div>
                <div class="row">
                    <br/>
                </div>
                <div class="row">
                    <nav class="navbar navbar-inverse navbar-perso navbar-fixed-bottom">
                        <div class="container">
                            <form id="echanger" class="navbar-form" action="./php/group-switch.php?jour=<?=$_GET['jour']?>&cat=<?=$_GET['cat']?>" method="post">
                                <input type="submit" class="btn btn-success pull-right" value="Echanger"/>
                                <span class="pull-right"> </span><pre class="pull-right" id="p2">Cliquez sur une équipe</pre>
                                <p class="pull-right"> </p><pre class="pull-right" id="p1">Cliquez sur une équipe</pre>

                              <span class="pull-right" data-toggle="pList" data-target="#pList" data-url="./php/group-note-vide.php">
                                <button class="btn btn-default">
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
                                <div class="text-center">
                        <?php  }
                          if ($group != NULL){?>
                              <?php
                              $teamNum=8;
                              while($group["ID_t".$teamNum] == null){
                                  $teamNum--;
                              }
                              ?>
                          <div class="col-lg-3 <?=$s_a_m?>"  name="divGroup" id="divGroup<?=$k?>" data-groupID="<?=$group['Gid']?>" data-day="<?=$_GET['jour']?>" data-category="<?=$_GET['cat']?>" data-teamNum="<?=$teamNum?>">
                              <label>
                                  <span class="fa fa-users"></span> Groupe <?= $k?> [<?=$group['Gid']?>]
                                  <a href="php/delete-group.php?id=<?=$group['Gid']?>&textDay=<?=$_GET['jour']?>&jour=<?=$_GET["jour"]?>&cat=<?=$_GET['cat']?>" onclick="return confirm('Voulez-vous vraiment supprimer ce groupe ?');"><i class="fa fa-trash-o"></i></a>
                              </label>
                              <div class="form-group" >
                                  <label><span class="fa fa-users"></span> Terrain</label>
                                  <select class="form-control" id="terrain <?=$k?>" name="ExpandableListTerrain">
                                      <?php
                                              $terrains = $db->query('SELECT * FROM Terrain');
                                              while ($terrain = $terrains->fetch_array())
                                              { ?>
                                                  <option value=<?=$terrain['ID']?> <?php if ($group['ID_terrain']==$terrain['ID']) { echo "selected=\"selected\""; }?> >
                                                          <?=$terrain['ID']?> : [<?=utf8_encode($terrain['Type']);?>/<?=utf8_encode($terrain['etat']);?>] <?=utf8_encode($terrain['Note']);?> (<?=utf8_encode($terrain['adresse']);?>)
                                                  </option>
                                          <?php }
                                          ?>
                                  </select>
                              </div>

                              <label><span class="fa fa-users"></span> Equipes </label>
                              <?php
                              for ($i = 1; $i <= $teamNum; $i++) {
                                      $teamID = $group["ID_t".$i];
                                      $team = $db->query("SELECT * FROM Team WHERE ID=\"".$teamID."\"")->fetch_array();
                                      $IDPersonne = $team['ID_Player1'];
                                      $player = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne."\"")->fetch_array();

                                      $IDPersonne2 = $team['ID_Player2'];
                                      $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne2."\"")->fetch_array();
                                      ?>
                                  <div class="form-group text-center">
                                  <?php $captainText = $teamID == $group['ID_Leader'] ? "fa fa-user text-success " : "fa fa-arrow-circle-o-up"; ?>
                                  <?php if($group['ID_t1']>0){?>
                                  <a  data-toggle="tooltip" data-placement="left" title="<?php if($teamID == $group['ID_Leader']){echo "Leader de poule";} else{echo "Assigner cette équipe en tant que leader de poule";}?>" href="php/promote-leader.php?id=<?=$group['Gid']?>&textDay=<?=$_GET['jour']?>&jour=<?=$_GET["jour"]?>&teamID=<?=$teamID?>&cat=<?=$_GET['cat']?>" ><i class="<?=$captainText?>"></i></a>
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
                                        <span data-toggle="pList" data-target="#pList" data-url="./php/group-note<?=$videOrNot?>.php?id=<?=$teamID?>">
                                          <div class="btn btn-<?=$color?> btn-outlineW draggable dropper" data-toggle="idteam1" data-target="#idteam1" data-id="<?=$teamID?>" data-teamNum="<?=$teamNum?>" data-groupNum="<?=$group["Gid"];?>">
                                                        [<?=$teamID?>]
                                                        <?=utf8_encode($player['LastName'])?> &
                                                        <?=utf8_encode($player2['LastName'])?>
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
                                              <div class="btn btn-default btn-outline draggable dropper" data-toggle="idteam1" data-target="#idteam1" data-id="-1" data-teamNum="<?=$teamNum?>" data-groupNum="<?=$group["Gid"]?>">Vide</div>
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



                          <div class="col-lg-3 server-new-menu"  name="divGroupEmpty" id="divGroup<?=($k+1)?>" >
                              <label><span class="fa fa-users"></span> Groupe <?= $k+1?> </label>
                              <div class="form-group" >
                                  <button class="btn btn-default" id="createNewGroup" name="createNewGroup">
                                      Nouveau groupe
                                  </button>
                              </div>
                              <div>
                                  <div class="alert alert-success" id="popupCreate" >Nouveau groupe créé</div>
                              </div>
                          </div>

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
                ropperDefaultStyle3: "btn btn-default btn-outline draggable dropper",
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
                        dndHandler.dropperDefaultStyle = e.target.getAttribute("class");

                        if(dndHandler.dropperDefaultStyle == dndHandler.dropperDefaultStyle1 + " drop_hover" || dndHandler.dropperDefaultStyle == dndHandler.dropperDefaultStyle2 + " drop_hover" || dndHandler.dropperDefaultStyle == dndHandler.ropperDefaultStyle3 + " drop_hover") {// On revient au style de base lorsque l'élément quitte la zone de drop
                        }
                        else{
                            this.className = e.target.getAttribute("class") + " drop_hover"; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
                        }


                    }, false);

                    dropper.addEventListener('dragleave', function() {

                        if(dndHandler.dropperDefaultStyle1 + " drop_hover"){// On revient au style de base lorsque l'élément quitte la zone de drop
                            this.className = dndHandler.dropperDefaultStyle1;
                        }
                        else if(dndHandler.dropperDefaultStyle2 + " drop_hover"){
                            this.className = dndHandler.dropperDefaultStyle2;
                        }
                        else{
                            this.className = dndHandler.dropperDefaultStyle3;
                        }

                    });
                    var dndHandler = this;

                    dropper.addEventListener('drop', function(e) {
                        var target = e.target,
                        draggedElement = dndHandler.draggedElement; // Récupération de l'élément concerné
                        target.className = dndHandler.draggedDefaultStyle; // Application du style par défaut

                        var draggedElement_id = $(draggedElement).attr('data-id');
                        var draggedElement_teamNum = $(draggedElement).attr('data-teamNum');
                        var draggedElement_groupNum = $(draggedElement).attr('data-groupNum');
                        var target_id = $(target).attr('data-id');
                        var target_teamNum = $(target).attr('data-teamNum');
                        var target_groupNum = $(target).attr('data-groupNum');
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
            document.getElementById('idteam1').value = draggedElement_id;
            document.getElementById('teamNumberG1').value = draggedElement_teamNum;
            document.getElementById('groupID1').value = draggedElement_groupNum;
            document.getElementById('idteam2').value = target_id;
            document.getElementById('teamNumberG2').value = target_teamNum;
            document.getElementById('groupID2').value = target_groupNum;
            var myForm = document.getElementById('echanger');
            myForm.submit();
        }
    </script>


    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();

            if(<?php if(array_key_exists("popup",$_POST)){echo "true"; error_log($_POST['popup']);}else{echo "false";} ?>) {
                setTimeout(function () {$('#popupCreate').fadeIn('slow');}, 0);
                setTimeout(function () {$('#popupCreate').fadeOut('slow');}, 3000);
            }
        });
    </script>

    <script>
        function checkForInvalideGroups(){
            var i=0;
            while(document.getElementsByName("divGroup")[i] != null){
                var Div = document.getElementsByName("divGroup")[i];
                if(Div.getAttribute('data-teamNum')<3){
                    HighlightTheDiv(Div);
                }
                i++;
            }
        }
    </script>

    <script>
        function HighlightTheDiv(Div){
            Div.className = "col-lg-3 server-invalide-menu";
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
            if (document.getElementById('idteam1').value == "") {
                document.getElementById('p1').innerHTML = id;
                document.getElementById('idteam1').value = id;
                document.getElementById('teamNumberG1').value = teamNum;
                document.getElementById('groupID1').value = groupNum;
            } else if (document.getElementById('idteam1').value != "" && document.getElementById('idteam2').value != "") {
                document.getElementById('idteam1').value = id;
                document.getElementById('p1').innerHTML = id;
                document.getElementById('teamNumberG1').value = teamNum;
                document.getElementById('groupID1').value = groupNum;
                document.getElementById('idteam2').value = "";
                document.getElementById('p2').innerHTML = "Cliquez sur une équipe";
                document.getElementById('teamNumberG2').value = "";
                document.getElementById('groupID2').value = "";
            } else {
                document.getElementById('idteam2').value = id;
                document.getElementById('p2').innerHTML = id;
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


//            setTimeout(function() {  location.reload();}, 500+2000);
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
