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
        ?>


            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Créer une poule</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- Registration form - START -->
                <div class="row">
                    <form role="form">
                        <div class="col-lg-4">
                            <!-- <div class="well well-sm"><strong><span class="glyphicon glyphicon-ok"></span>Required Field</strong></div> -->
                            <script javascript>
                                function setDay(newDay) {
                                    $_day = newDay
                                }
                            </script>

                            <fieldset data-role="controlgroup" data-type="horizontal">

                                <label for="saturday">Samedi</label>
                                <input type="radio" name="day" value="saturday" onClick="setDay(" saturday ")">
                                <label for="sunday">Dimanche</label>
                                <input type="radio" name="day" value="sunday" onClick="setDay(" sunday ")">
                            </fieldset>
                            <hr>

                            <div class="form-group">
                                <label for="sel1"><span class="fa fa-users"></span> Terrain</label>
                                <select class="form-control" id="sel1">
                                    <option>[Terrains disponibles]</option>
                                </select>
                            </div>

                            <?php
									
								if ($_day == "saturday"){ 
									$groupNum = 5;
								} elseif($_day == "sunday"){
									$groupNum = 6;
								} else{
									$groupNum = 0;
								}
								
								for ($i = 1; $i <= $groupNum; $i++) {
									echo "<div class=\"form-group\">";
									  echo "<label for=\"sel1\"><span class=\"fa fa-users\"></span> Equipe ". $i ."</label>";
		                            echo "</div>";
									echo "<div class=\"form-group\">";
		                              echo "<select class=\"form-control\" id=\"sel1\">";
		                                echo "<option>Equipe ". $i ."</option>";
		                              echo "</select>";
		                            echo "</div>";
		                        }
								?>


                                <input type="submit" name="submit" id="submit" value="Créer" class="btn btn-info pull-right">

                        </div>
                    </form>
                    <!-- Registration form - END -->

                </div>
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

</body>

</html>