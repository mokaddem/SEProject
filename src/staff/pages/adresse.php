<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Contact</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../dist/css/alicia.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <?php
            include("./html/header.php");
        include_once('./php/BDD.php');

        $db = BDconnect();

//        array_unique(my_array, SORT_REGULAR)

        $listPlayer = $db->query("SELECT * FROM Personne WHERE isPlayer = 1");
        $listOwner = $db->query("SELECT * FROM Personne WHERE isOwner = 1");
    ?>
    <?php
    // Recupération des données des participants
         while ($row = $listPlayer->fetch_object()){ ?>
            <?php
                    $nom = $row->LastName." ".utf8_encode($row->FirstName);
                    $adresse = $row->Number." ".utf8_encode($row->Rue)." ".$row->ZIPCode." ".utf8_encode($row->Ville);
                    $liste1[$adresse] = $nom;

            ?>
    <?php }
    // Recupération des données des propriétaire
        while ($row = $listOwner->fetch_object()){ ?>
            <?php
            $nom = utf8_encode($row->LastName)." ".utf8_encode($row->FirstName);
            $adresse = $row->Number." ".utf8_encode($row->Rue)." ".$row->ZIPCode." ".utf8_encode($row->Ville);
            $liste2[$adresse] = $nom;

            ?>
        <?php } ?>



            <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
                <div class="row">
                    <div class="page-header">
                        <h1>Adresses</h1>
                    </div>
                </div>
                <!-- Affichage des adresse - START -->
                <div class="row">
                    <div class="col-lg-6">
                            <div id="listPart">
                            <h3><i class="fa fa-users"></i> Particpants</h3>
                            <!-- Affichage des adresse des participants - END -->                            
                            <?php foreach (array_unique($liste1) as $adresse => $nom) {?>
                                            <?=$nom?> - <?=$adresse?><br/>
                                    <?php } ?>
                            <!-- Affichage des adresse participant - END -->                            
                            
                            <!-- Affichage des adresse propriétaire - START -->                            
                            <h3><i class="fa fa-suitcase"></i> Propriétaires</h3>
                            <?php foreach (array_unique($liste2) as $adresse => $nom) {?>
                                <?=$nom?> - <?=$adresse?><br/>
                            <?php } ?>
                            <!-- Affichage des adresse propriétaire - END -->
                            </div>
                    </div>

                    <!-- Affichage des adresses - END -->
                </div>
                <br/><br/><br/>
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
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script src="js/contactStaff.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
</body>

</html>