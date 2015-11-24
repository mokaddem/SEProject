<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Equipe</title>

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
            include_once('php/test-delete.php');

            
        
            $db = BDconnect();
            
            $tmp = $db->query('SELECT * FROM Team WHERE '.$_GET['id'].' = ID ');
            $t = $tmp->fetch_array();
        
            $p = $db->query('SELECT * FROM Personne WHERE '.$t['ID_Player1'].' = ID ');
            $p1 = $p->fetch_array();
        
            $p1final = $p1['FirstName']. " " . $p1['LastName']; 
        
            $p = $db->query('SELECT * FROM Personne WHERE '.$t['ID_Player2'].' = ID ');
            $p2 = $p->fetch_array();
        
            $p2final = $p2['FirstName']. " " . $p2['LastName'];
                
        ?>


            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12 noDeco">
                        <h1 class="page-header"><a href="list-team.php"> Liste des équipes</a> > Modifier</h1>
                    </div>
                </div>

                <!-- Registration form - START -->
                <div class="row">
                    <form role="form" method="Get" action="php/inc/edit-team.php">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="sel1"><span class="fa fa-user"></span> Premier joueur</label>
                                <select class="form-control" id="idp1" name="idp1">
                                    <?php echo "<option value=".$p1['ID']." selected=".$p1final.">".utf8_encode($p1final)."</option>";?>

                                        <?php
                                    $db = BDconnect();
                                    $reponse = $db->query('SELECT * FROM Personne WHERE isPlayer=1');
                                    while ($donnes = $reponse->fetch_array())
                                    {
                                        if (canDeletePlayer($donnes['ID'])){
                                            echo "<option value=".$donnes['ID'].">".utf8_encode($donnes['FirstName'])." ".utf8_encode($donnes['LastName'])."</option>"; }
                                    }
                                    ?>
                                            <!-- <option>propriétaire</option> -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sel1"><span class="fa fa-user"></span> Second joueur</label>
                                <select class="form-control" id="idp2" name="idp2">
                                    <?php echo "<option value=".$p2['ID']." selected=".$p2final.">".utf8_encode($p2final)."</option>";?>
                                        <?php
                                        $db = BDconnect();
                                        $reponse = $db->query('SELECT * FROM Personne WHERE isPlayer=1');
                                        while ($donnes = $reponse->fetch_array())
                                        {				
                                            if (canDeletePlayer($donnes['ID'])){
                                                echo "<option value=".$donnes['ID'].">".utf8_encode($donnes['FirstName'])." ".utf8_encode($donnes['LastName'])."</option>";}
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sel2"><span class="fa fa-user"></span> Catégorie</label>
                                <select class="form-control" id="InputCat" name="InputCat">
                                    <?php
										$db = BDconnect();
										$reponse = $db->query('SELECT * FROM Categorie');
										while ($donnes = $reponse->fetch_array())
										{
                                            if ($t['ID_Cat'] == $donnes['ID']) 
                                            {
                                                echo "<option selected=\"".$donnes['Designation']." ".$donnes['Year']."\" value=".$donnes['ID'].">".utf8_encode($donnes['Designation'])." ".utf8_encode($donnes['Year'])."</option>";
                                            } 
                                            else 
                                            { 
										      echo "<option value=".$donnes['ID'].">".utf8_encode($donnes['Designation'])." ".utf8_encode($donnes['Year'])."</option>";								  }
                                        }
                                    ?>

                                </select>
                            </div>

                            <a class="btn btn-info" href="list-team.php">Retour</a>
                            <button type="submit" name="id" id="id" value="<?php echo $_GET['id'] ?>" class="btn btn-success pull-right">Sauvegarder</button>
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