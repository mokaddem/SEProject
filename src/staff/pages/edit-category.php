<!DOCTYPE html>
<!-- Page d'edition d'une catégorie selectionnée dans la liste -->
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Catégorie</title>

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
            $reponse = $db->query('SELECT * FROM Categorie WHERE '. $_GET['id']. ' = ID');
            $donnees = $reponse->fetch_array();
        ?>


            <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
                <div class="row">
                    <div class="col-lg-12 noDeco">
                        <h1 class="page-header"><a href="list.php?type=category">Gestion des catégories</a> > Modifier</h1>
                    </div>
                </div>

                    <div class="container">
                        <div class="row">
                            <!-- Registration form - START -->
                            <form role="form" method="Get" action="php/inc/edit-category.php">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                            <select class="form-control" name="InputYear" id="InputYear">
                                                <?php // Liste des années
                                                echo '<option value="'.$donnees['Year'].'" selected="'.$donnees['Year'].'">'.$donnees['Year'].'</option>'; ?>
                                                <?php
                                                      for ($i = date("Y"); $i <= 2500; $i++) {
                                                        echo "<option>$i</option>\n";
                                                      }
                                                ?>
                                            </select>
                                            <input type="text" class="form-control" id="InputDesignation" name="InputDesignation" placeholder="Nom" required>

                                        </div>
                                    </div>

                                    <button class="btn btn-success pull-right" type="submit" name="id" id="id" value=<?=$_GET['id']?>>Sauvegarder</button>
                            </form>
                            <!-- Registration form - END -->
                            </div>
                        </div>

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

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#InputYear').val('<?=utf8_encode($donnees["Year"])?>');
                    $('#InputDesignation').val('<?=utf8_encode($donnees["Designation"])?>');

                });
            </script>

</body>

</html>
