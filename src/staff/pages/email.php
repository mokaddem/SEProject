<!DOCTYPE html>
<!-- Annuaire d'adresses e-mail des participants et propriétaitres (se trouvant dans l'onglet commmunication) -->
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
    include_once('php/BDD.php');

    $db = BDconnect();

    $listPart = $db->query("SELECT * FROM Personne where isPlayer = 1 ");
    $listProp = $db->query("SELECT * FROM Personne where isOwner = 1 ");
    ?>


    <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
        <div class="row">
            <div class="page-header">
                <h1>E-mails</h1>
            </div>
        </div>
        <!-- Registration form - START -->
        <div class="row">
            <h3><i class="fa fa-users"></i> Particpants</h3>
            <div id="listPart">
                <p>
                    <?php
                    while ($row = $listPart->fetch_object()){ ?>
                        <?php echo $row->Mail; ?>,
                    <?php }
                    ?>
                </p>

            </div>
        </div>
        <div class="row">
            <h3><i class="fa fa-suitcase"></i> Propriétaires</h3>
            <div id="listProp">
                <p>
                    <?php
                    while ($row = $listProp->fetch_object()){ ?>
                        <?php echo $row->Mail; ?>,
                    <?php }
                    ?>
                </p>
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
<script src="../dist/js/alicia.js"></script>

<script src="http://cdn.jsdelivr.net/typeahead.js/0.9.3/typeahead.min.js"></script>

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script src="js/contactStaff.js"></script>
<script src="js/jqBootstrapValidation.js"></script>
</body>

</html>
