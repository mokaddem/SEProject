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
                    <h1 class="page-header">Créer une poule</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

                <!-- Registration form - START -->
                     <div class="row">
                        <form role="form">
                            <div class="col-lg-6">
                                <!-- <div class="well well-sm"><strong><span class="glyphicon glyphicon-ok"></span>Required Field</strong></div> -->
                                
								
								<fieldset data-role="controlgroup" data-type="horizontal">
								
									<label for="male">Samedi</label>
									<input type="radio" name="day"  value="saturday">
									<label for="female">Dimanche</label>
									<input type="radio" name="day"  value="sunday" checked>	
								 </fieldset>
								 <hr>

								
                                <div class="form-group">
                                  <label for="sel1"><span class="fa fa-users"></span> Première équipe</label>
                                  <select class="form-control" id="sel1">
                                    <option>[liste des équipes]</option>
                                    <!-- <option>propriétaire</option> -->
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="sel1"><span class="fa fa-users"></span> Seconde équipe</label>
                                  <select class="form-control" id="sel1">
                                    <option>[liste des équipes]</option>
                                    <!-- <option>propriétaire</option> -->
                                  </select>
                                </div>
                               
                                <div class="form-group">
                                  <label for="sel1"><span class="fa fa-users"></span> Troisième équipe</label>
                                  <select class="form-control" id="sel1">
                                    <option>[liste des équipes]</option>
                                    <!-- <option>propriétaire</option> -->
                                  </select>
                                </div>
								
								<div class="form-group">
                                  <label for="sel1"><span class="fa fa-users"></span> Quatrième équipe</label>
                                  <select class="form-control" id="sel1">
                                    <option>[liste des équipes]</option>
                                    <!-- <option>propriétaire</option> -->
                                  </select>
                                </div>
								
								<div class="form-group">
                                  <label for="sel1"><span class="fa fa-users"></span> Cinquième équipe</label>
                                  <select class="form-control" id="sel1">
                                    <option>[liste des équipes]</option>
                                    <!-- <option>propriétaire</option> -->
                                  </select>
                                </div>	
								
								<?php 
									if (isset($_POST['day'])){
										$_day=$_POST['day'];
										} else {
										$_day="";
										}
									?>
								<?php if( $_day == "sunday") : ?>
								<div class="form-group">
                                  <label for="sel1"><span class="fa fa-users"></span> Sixième équipe</label>
                                  <select class="form-control" id="sel1">
                                    <option>[liste des équipes]</option>
                                    <!-- <option>propriétaire</option> -->
                                  </select>
                                </div>
								<?php endif; ?>
								
                                <input type="submit" name="submit" id="submit" value="Créer" class="btn btn-info pull-right">

                            </div>
                        </form>
                        <div class="col-lg-5 col-md-push-1">
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