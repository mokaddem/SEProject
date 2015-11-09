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
            <h1 class="page-header">Ajouter un staffeur</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>

        <!-- Registration form - START -->
        <div class="row">
          <form role="form" method="Get" action="php/add-new-pair.php">

              <div class="col-lg-6">
                <!-- <div class="well well-sm"><strong><span class="glyphicon glyphicon-ok"></span>Required Field</strong></div> -->

                <!-- <div class="form-group">
                              <label for="sel1">Je m'inscire en tant que </label>
                              <select class="form-control" id="sel1">
                                <option>participant</option>
                                <option>propriétaire</option>
                              </select>
                            </div> -->
                <div class="form-group">
                  <!--<label for="sel1">Titre:</label>-->
                  <select class="form-control" id="title1" name="title1">
                    <option>M.</option>
                    <option>Mme.</option>
                  </select>
                </div>

                <div class="form-group">
                  <!--<label for="InputNom">Nom</label>-->
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" Nom="InputNom" name="InputNom1" id="InputNom1" placeholder="Nom" required>
                    <input type="text" class="form-control" Prenom="InputPrenom" name="InputPrenom1" id="InputPrenom1" placeholder="Prenom" required>

                    <span>Née le </span>
                    <select name='birth_day1' id='birth_day1'>
                      <option value="na">Jour</option>
                      <?php
                                              for ($i = 1; $i <= 31; $i++) {
                                                    echo "<option>$i</option>\n";
                                                  }

                                            ?>
                    </select>
                    <select name='birth_month1' id='birth_month1'>
                      <option value="na">Mois</option>
                      <option value="1">Janvier</option>
                      <option value="2">Fevrier</option>
                      <option value="3">Mars</option>
                      <option value="4">Avril</option>
                      <option value="5">Mai</option>
                      <option value="6">Juin</option>
                      <option value="7">Juillet</option>
                      <option value="8">Aout</option>
                      <option value="9">Septembre</option>
                      <option value="1°">Octobre</option>
                      <option value="11">Novembre</option>
                      <option value="12">Decembre</option>
                    </select>
                    <select name='birth_year1' id='birth_year1'>
                      <option value="na">Année</option>
                      <?php
                                              for ($i = date(Y); $i >= 1900; $i--) {
                                                echo "<option>$i</option>\n";
                                              }
                                        ?>
                    </select>
                    <!--<input type="date" class="form-control" name="InputBirth1" id="InputBirth1" placeholder="Née le jj/mm/aaaa" required>-->
                  </div>
                </div>
                <div class="form-group">
                  <!--<label for="InputPrenom">Adresse</label>-->
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                    <input type="text" class="form-control" name="InputAdresse1" id="InputAdresse1" placeholder="Adresse" required>
                    <input type="text" class="form-control" name="InputBat1" id="InputBat1" placeholder="Numero - Batiment">
                    <input type="text" class="form-control" name="InputCP1" id="InputCP1" placeholder="Code Postal" required>
                    <input type="text" class="form-control" name="InputLoc1" id="InputLoc1" placeholder="Localité">
                  </div>
                </div>

                <div class="form-group">
                  <!--<label for="InputEmail">Email</label>-->
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-at"></i></span>
                    <input type="email" class="form-control" id="InputEmailFirst1" name="InputEmailFirst1" placeholder="Email" required>
                  </div>
                </div>

                <div class="form-group">
                  <!--<label for="InputPhone">Numéro de téléphone</label>-->
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" class="form-control bfh-phone" name="InputFixe1" id="InputFixe1" placeholder="+33 fixe">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" class="form-control bfh-phone" name="InputMob1" id="InputMob1" placeholder="+33 mobile" required>
                  </div>
                </div>

                <div class="form-group">
                  <!--<label for="InputEmail">Email</label>-->
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" id="username" placeholder="Username" required>
                    <input type="password" class="form-control" id="password" placeholder="Password" required>
                  </div>
                </div>
<input type="submit" name="submit" id="submit" value="Valider" class="btn btn-info pull-right">
              </div>
            </div>

          </form>

        </div>
        <!-- Registration form - END -->

      </div>
      <!-- /.row -->

      <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->
  <br/>
  <br/>
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
