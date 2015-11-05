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
require_once('php/inc/list-function.inc');
$db = new BDD();

//$reponse = $db->query('SELECT * FROM `Match` match WHERE '. $_GET['id']. ' = match.ID');
$reponse = $db->query('SELECT * FROM `Match` WHERE '. $_GET['id']. '=ID');
$donnes = $reponse->fetch_array();
//$donnes = $db->query('SELECT * FROM Match');
?>
        <div class="col-lg-offset-5 col-lg-3">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Informations</h4>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <p>Joueur 1:
                            <?=$donnes['ID_Equipe1']?>
                        </p>
                        <p>Joueur 2:
                            <?=$donnes['ID_Equipe2']?>
                        </p>
                        <p>Score 1:
                            <?=$donnes['score1']?>
                        </p>
                        <p>Score 2:
                            <?=$donnes['score2']?>
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" href="php/delete-match.php?id=<?=$donnes['id']?>" onclick="return confirm('Voulez-vous vraiment supprimer ce participant ?');">Supprimer</a>
                    <a class="btn btn-success" href="edit-match.php?id=<?=$donnes['id']?>">Modifier</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Retour</button>
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