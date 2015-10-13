<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ajout équipe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Créer une équipe</h1>
</div>

<!-- Registration form - START -->
<div class="container">
    <div class="row">
        <form role="form">
            <div class="col-lg-6">
                <!-- <div class="well well-sm"><strong><span class="glyphicon glyphicon-ok"></span>Required Field</strong></div> -->
                
                <div class="form-group">
                  <label for="sel1"><span class="fa fa-user"></span> Premier joueur</label>
                  <select class="form-control" id="sel1">
                    <option>[liste des joueurs]</option>
                    <!-- <option>propriétaire</option> -->
                  </select>
                </div>

                <div class="form-group">
                  <label for="sel1"><span class="fa fa-user"></span> Second joueur</label>
                  <select class="form-control" id="sel1">
                    <option>[liste des joueurs]</option>
                    <!-- <option>propriétaire</option> -->
                  </select>
                </div>
                
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
    </div>
</div>
<!-- Registration form - END -->

</div>

</body>
    <!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

</html>