<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

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

        ?>


            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Modifier les poules</h1>

                    </div>
                    <!-- /.col-lg-12 -->
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
                        <li <?php if ($_GET[ 'jour']=="sam" ) echo 'class="active" ' ;?>><a href="group.php?jour=sam">Samedi</a></li>
                        <li <?php if ($_GET[ 'jour']=="dim" ) echo 'class="active" ' ;?>><a href="group.php?jour=dim">Dimanche</a></li>
                    </ul>
                </div>
                <div class="row">
                    <br/>
                </div>
                <div class="row">
                    <form class="form-horizontal" action="./php/group-switch.php?jour=<?=$_GET['jour']?>" method="post">
                        <div class="col-lg-2">
                            <input type="text" class="form-control" id="idteam1" name="idteam1" placeholder="ID Equipe 1" required>
                        </div>
                        <div class="col-lg-2">

                            <input type="text" class="form-control" id="idteam2" name="idteam2" placeholder="ID Equipe 2" required>
                        </div>
                        <div class="col-lg-8">
                            <input type="submit" class="btn btn-primary pull-left" value="Echanger" />
                        </div>
                    </form>
                </div>

                <div class="row">
                    <br/>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <select id="listNote" class="form-select" multiple="">
                            <?php
                                            $listTeams = $db->query("SELECT * FROM Team");
                                        foreach ($listTeams as $team) {
                                            $IDPersonne = $team['ID_Player1'];
                                            $player = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne."\"")->fetch_array();

                                            $IDPersonne2 = $team['ID_Player2'];
                                            $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne2."\"")->fetch_array();

                                            if ($player['Note'] || $player2['Note']) {
                                                ?>
                                <option data-toggle="pList" data-target="#pList" data-url="./php/group-note.php?id=<?=$team['ID']?>">
                                    <?=$player['LastName']?>,
                                        <?=$player2['LastName']?>
                                </option>
                                <?php } }
                                    ?>
                        </select>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <span id="pList">

                        </span>
                    </div>
                    <div class="text-center">
                        <?php
                            $db = new BDD();
                            if ($_GET['jour'] == "sam"){
                                $groups = $db->query('SELECT * FROM GroupSaturday');
                                $numberOfGroups = $db->query('SELECT Count(*) FROM GroupSaturday')->fetch_array();
                            } else{
                                $groups = $db->query('SELECT * FROM GroupSunday');
                                $numberOfGroups = $db->query('SELECT Count(*) FROM GroupSunday')->fetch_array();
                            }
                            $lineNum = 5;
                            for ($k = 1; $k <= (int) $numberOfGroups; $k++) {
                                if (gmp_mod((int) $numberOfGroups,$lineNum) == 0){ ?>
                                    <div class="text-center">
                                <?php }
                                for ($j = 1; $j <= $lineNum; $j++) {
                                    $group = $groups->fetch_array();
                                    if ($group != NULL){ ?>
                                        <div class="col-lg-2">
                                            <label><span class="fa fa-users"></span> Groupe
                                                <?= $j?>
                                            </label>
                                            <div class="form-group">
                                                <label><span class="fa fa-users"></span> Terrain</label>
                                                <select class="form-control" id="terrain">
                                                    <?php
                                                            $terrains = $db->query('SELECT * FROM Terrain');
                                                            while ($terrain = $terrains->fetch_array())
                                                            { ?>
                                                        <option value=<?=$terrain[ 'ID']?>>
                                                            <?=$terrain['ID']?>,
                                                                <?=$terrain['Note']?>
                                                        </option>
                                                        <?php }
                                                        ?>
                                                </select>
                                            </div>

                                            <?php
                                                if ($_GET['jour']=="sam"){
                                                    $teamNum = 5;
                                                } elseif($_GET['jour']=="dim"){
                                                    $teamNum = 6;
                                                } else{
                                                    $teamNum = 0;
                                                }
                                            ?>
                                            <label><span class="fa fa-users"></span> Equipes </label>
                                            <?php
                                            for ($i = 0; $i <= $teamNum; $i++) {
                                                if ($i>0){
                                                    $teamID = $group["ID_t".$i];
                                                    $team = $db->query("SELECT * FROM Team WHERE ID=\"".$teamID."\"")->fetch_array();
                                                    $IDPersonne = $team['ID_Player1'];
                                                    $player = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne."\"")->fetch_array();

                                                    $IDPersonne2 = $team['ID_Player2'];
                                                    $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne2."\"")->fetch_array();
                                                    ?>
                                                <div class="form-group text-center">
                                                    <label> </label>
                                                    <?php $color = "default";
                                                            if ($player['Note'] || $player2['Note']) {
                                                                $color = "primary";

                                                            ?>
                                                        <span data-toggle="pList" data-target="#pList" data-url="./php/group-note.php?id=<?=$teamID?>">
                                                        <button class="btn btn-<?=$color?> btn-outline" data-toggle="idteam1" data-target="#idteam1" data-id="<?=$teamID?>">
                                                                    <?=$teamID?>, <?=$player['LastName']?> - <?=$player2['LastName']?>
                                                            </button>
                                                        </span>
                                                        <?php } else { ?>
                                                            <button class="btn btn-<?=$color?> btn-outline" data-toggle="idteam1" data-target="#idteam1" data-id="<?=$teamID?>">
                                                                <?=$teamID?>,
                                                                    <?=$player['LastName']?> -
                                                                        <?=$player2['LastName']?>
                                                            </button>

                                                            <?php } ?>
                                                </div>

                                                <?php
                                                        }
                                            }?>

                                        </div>
                                    <?php } } // End of j loop
                                        if (gmp_mod((int)$numberOfGroups,$lineNum) == 0){ ?>
                                            </div>
                                        <?php }
                                        } // End k loop. ?>

                    </div>
                    <!-- Registration form - END -->

                </div>
                <!-- /.row -->
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
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


</body>

</html>