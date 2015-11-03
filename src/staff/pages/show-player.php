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


<?php
include_once('php/BDD.php');

$db = new BDD();
$reponse = $db->query('SELECT * FROM Personne pers, Player play WHERE '. $_GET['id']. ' = pers.ID');
$donnes = $reponse->fetch_array();
?>
<div id="Antoine" class="col-lg-offset-5 col-lg-3">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Informations</h4>
        </div>
        <div class="modal-body">
            <div class="container">
                <p>Nom: <?=$donnes['LastName']?></p>
                <p>Prénom: <?=$donnes['FirstName']?></p>
                <p>E-mail: <?=$donnes['Mail']?></p>
                <p>Née le: <?=$donnes['BirthDate']?></p>
                <p>Rue: <?=$donnes['Rue']?></p>
                <p>Ville: <?=$donnes['Ville']?></p>
                <p>Code Postal: <?=$donnes['ZIPCode']?></p>
                <p>Tel: <?=$donnes['PhoneNumber']?></p>
                <p>Mobile: <?=$donnes['GSMNumber']?></p>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<?php $reponse->free(); ?>
</body>

</html>
