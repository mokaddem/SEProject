<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Mode - Contact</title>

  <!-- Bootstrap Core CSS -->
  <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
  <link href="../dist/css/alicia.css" rel="stylesheet">

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
    		include_once('php/BDD.php');
    		include "../../mail/mail_helper.php";	
            include("./html/header.php");
            $db = BDconnect();

        ?>


      <div id="page-wrapper">
        <div class="row">
          <div class="page-header">
            <h1>Envoyer un mail</h1>
          </div>
        </div>
        <!-- Registration form - START -->
        <div class="row">
          <form role="form" id="contact" method="post" action="contact_Staff.php">
            <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <input class="form-control" autocomplete="off" name="dest" id="dest" placeholder="Destinataire" type="text">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-default btn-outline" data-toggle="collapse" data-target="#demo" ata-toggle="tooltip" data-placement="top" title="Selectionner des groupes">
                      <i class="fa fa-long-arrow-down"></i> <i class="fa fa-users"></i>
                    </button>
                  </div>
                </div>
                  <p>
                  <div id="demo" class="collapse">
                  <input type="checkbox" name="parti" value="Participants"> Tous les participants
                  <input type="checkbox" name="proprio" value="Propriétaires"> Tous les propriétaires
                  </p>
                  <p>
                  <h4> Groupes Samedi </h4>
                  </p>
                  <input type="checkbox" name="leaderSam" value="Participants"> Tous les leaders
                  <input type="checkbox" name="NPSam" value="Propriétaires"> Tous les non-payés
                  <input type="checkbox" name="tousSam" value="Participants"> Tous les joueurs
                  </p>
                  <h4> Groupes Dimanche </h4>
                  </p>
                  <input type="checkbox" name="leaderDim" value="Participants"> Tous les leaders
                  <input type="checkbox" name="NPDim" value="Propriétaires"> Tous les non-payés
                  <input type="checkbox" name="tousDim" value="Participants"> Tous les joueurs
                  </p>
                  <p> 
                  <h4> Catégories </h4>
                  </p>
                  </p>
                  <?php
                  $categorie = $db->query('SELECT Designation FROM Categorie');
                  $listCat;
                  $i=0;
                  while($lcat = $categorie -> fetch_array())
                  {
                  	  $listCat[$i] = utf8_encode($lcat['Designation']);
                  	 ?>
                  	 <input type="checkbox" name="cat_<?php echo $i ?>" value="<?php echo $listCat[$i] ?>"> <?php echo utf8_encode(utf8_decode($listCat[$i])); ?>
                <?php
                  $i++;
                  }
                  ?>
                  </p>
                </div>

                <br/>
                <div class="form-group">
                  <!-- <label for="sel1"><span class="fa fa-user"></span> Message à tous les propriétaires</label> -->
                  <input type="text" class="form-control" placeholder="Sujet" name="sujet" id="sujet" required data-validation-required-message="Veuillez entrer le sujet.">
                  <br>
                  <textarea rows="15" cols="50" class="form-control" placeholder="Message" name="message" id="message" required data-validation-required-message="Veuillez entrer votre message."></textarea>
                  <div class="input-group-btn">
                  <button type="button" class="btn btn-default btn-outline" data-toggle="collapse" data-target="#demo1" ata-toggle="tooltip" data-placement="top" title="Selectionner des messages">
                  <i class="fa fa-long-arrow-down"></i> <i class="fa fa-users"></i>
                  </button>
                  </div>
                  <p>
                  <div id="demo1" class="collapse">
                  <input type="checkbox" name="mesLeader" value="Participants"> Messages des leaders
                  <input type="checkbox" name="mesTous" value="Propriétaires"> Messages pour tous
                  <input type="checkbox" name="mesNP" value="Propriétaires"> Messages des non-payés
                  </p>
                  </div>
                <input type="submit" name="envoi" id="submitPlayers" value="Envoyer" class="btn btn-primary pull-right" />
              </div>
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
  <script src="../dist/js/alicia.js"></script>

  <script src="http://cdn.jsdelivr.net/typeahead.js/0.9.3/typeahead.min.js"></script>

  <script>
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>

</body>

</html>