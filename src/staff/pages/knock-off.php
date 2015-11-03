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
            include("./html/header.html");
        ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Créer un tournois de knock-off</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

                <!-- Registration form - START -->
                     <div class="row">
                        <form role="form">
                            <div class="col-lg-3">
                                <!-- <div class="well well-sm"><strong><span class="glyphicon glyphicon-ok"></span>Required Field</strong></div> -->
                                
								
								<fieldset data-role="controlgroup" data-type="horizontal">
								
									<label for="male">Samedi</label>
									<input type="radio" name="day"  value="saturday">
									<label for="female">Dimanche</label>
									<input type="radio" name="day"  value="sunday" checked>	
								 </fieldset>
								 <hr>

								<div class="form-group">
                                    <!--<label for="size">Size</label>-->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                        <input type="number" class="form-control" name="size" id="size" placeholder="Nombre d'équipes" min="2" step="2" value="<?php if(isset($_GET['size'])) { echo htmlentities($_GET['size']);}?>" required>
                                    </div>
                                </div>
								
								
								<?php 
									if (isset($_GET['size'])){
										$_size=$_GET['size'];
										} else {
										$_size=0;
										}
									?>
									
								<?php
								$i = 1;
								//echo "<label for=\"sel1\"> Equipes </label>";
								for (; $i <= $_size; $i++) {
									if ($i % 2 != 0){
										echo "<div class=\"form-group\">";
										  echo "<label for=\"sel1\"><span class=\"fa fa-users\"></span> Match ". ceil($i/2) ."</label>";
			                            echo "</div>";
										echo "<div class=\"form-group\">";
			                              echo "<select class=\"form-control\" id=\"sel1\">";
			                                echo "<option>Equipe ". $i ."</option>";
			                              echo "</select>";
			                            echo "</div>";
		                            } else{
		                            	echo "<div class=\"form-group\">";
			                              echo "<select class=\"form-control\" id=\"sel1\">";
			                                echo "<option>Equipe ". $i ."</option>";
			                              echo "</select>";
			                            echo "</div>";
		                            }
		                        }
								?>
								
                                <input type="submit" name="submit" id="submit" value="Créer" class="btn btn-info pull-right">

                            </div>
                            
                            <?php
                            $i = ceil(($i-1)/2);
                            $matchNum = 1;
                            $iter = 0;
                            for ($k = $i; $k >= 1; $k = $k/2){
	                            echo "<div class=\"col-lg-3\" style=\"position: relative; top: 100px;\">";
	                            for ($j = 1; $j <= $k; $j++) {
	                            		echo "<div class=\"form-group\">";
										  echo "<label for=\"sel1\"><span class=\"fa fa-users\"></span> Match ". $matchNum ."</label>";
										  echo "<select class=\"form-control\" id=\"sel1\">";
			                                echo "<option>Terrain ". $matchNum ."</option>";
			                              echo "</select>";
			                            echo "</div>";
			                            $matchNum++;
				                }
				                echo "</div>";
				                $iter++;
				                $i = $i + $k/2;
				            }
			                ?>
                        </form>
                        
                        <div class="col-lg-3 col-md-push-1">
                            <div class="col-md-12">
                                <div class="alert alert-success">
                                    <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
                                </div>
                                <div class="alert alert-danger">
                                    <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
                                </div>
                            </div>
                        </div>
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
