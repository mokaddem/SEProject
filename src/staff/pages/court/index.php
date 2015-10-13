<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ajout terrain</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>



<div class="container">

<div class="page-header">
    <h1>Ajouter un terrain</h1>
</div>

<!-- Registration form - START -->
<div class="container">
    <div class="row">
        <form role="form">
            <div class="col-lg-6">
                <!-- <div class="well well-sm"><strong><span class="glyphicon glyphicon-ok"></span>Required Field</strong></div> -->
                <!-- <div class="form-group">
                  <label for="sel1">Je m'inscire en tant que </label>
                  <select class="form-control" id="sel1">
                    <option>participant</option>
                    <option>propriétaire</option>
                  </select>
                </div> -->
                <!-- <div class="form-group"> -->
                  <!--<label for="sel1">Titre:</label>-->
                  <!-- <select class="form-control" id="sel1">
                    <option>M.</option>
                    <option>Mme.</option>
                  </select>
                </div> -->
                <div class="form-group">
                    <!--<label for="InputNomTerrain">Nom</label>-->
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-circle-thin"></i></span>
                        <input type="text" class="form-control" Nom="InputNom" id="InputNomTerrain" placeholder="Nom du terrain" required>
                        <select class="form-control" id="sel1">
                            <option>Terre battue</option>
                            <option>Gazon</option>
                            <option>Synthétique</option>
                        </select>
                        <select class="form-control" id="sel1">
                            <option>Neuf</option>
                            <option>Passable</option>
                            <option>Usé</option>
                        </select>
                    </div>
                 
                </div>
                <div class="form-group">
                    <!--<label for="InputNom">Nom</label>-->
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" Nom="InputNom" id="InputNom" placeholder="Nom du propriétaire" required>
                        <input type="text" class="form-control" Prenom="InputPrenom" id="InputPrenom" placeholder="Prénom du propriétaire" required>
                    </div>
                </div>
                <div class="form-group">
                    <!--<label for="InputPrenom">Adresse</label>-->
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input type="text" class="form-control" id="InputAdresse" placeholder="Adresse" required>
                        <input type="text" class="form-control" id="InputBat" placeholder="Numero de voie">
                        <input type="text" class="form-control" id="InputCP" placeholder="Code Postal" required>
                        <input type="text" class="form-control" id="InputLoc" placeholder="Localité">
                    </div>
                </div>
                
                <!-- <div class="form-group"> -->
                    <!--<label for="InputEmail">Email</label>-->
                    <!-- div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-at"></i></span>
                        <input type="email" class="form-control" id="InputEmailFirst" name="InputEmail" placeholder="Email" required>
                    </div>
                </div> -->
                
                <!-- <div class="form-group"> -->
                    <!--<label for="InputPhone">Numéro de téléphone</label>-->
                    <!-- <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" class="form-control bfh-phone"  placeholder="+33 fixe">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" class="form-control bfh-phone"  placeholder="+33 mobile" required>
                    </div>
                </div>
                <div class="form-group">
                  <label for="sel1">Classement </label>
                  <select class="form-control" id="sel1">
                    <option>NC</option>
                    <option>Trofor</option>
                  </select>
                </div>     
                <div class="form-group">
                    <label for="InputPhone">Déjà participé au tournoi?</label>
                    <label class="radio-inline">
                      <input type="radio" name="optradio">Oui
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="optradio">Non
                    </label>
                </div>
                <div class="form-group"> -->
                    <!--<label for="InputNamePartner">Enter Name Partner</label>-->
                    <!-- <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                        <input type="text" class="form-control" name="InputNamePartner" id="InputNamePartner" placeholder="Nom du partenaire" required>
                    </div>
                </div>                
                <div class="form-group"> -->
                    <!--<label for="InputCredit">Paiement</label>-->
                    <!-- <label for="InputPhone">Montant à payer</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="15" disabled>
                      <span class="input-group-addon">€</span>
                    </div>
                    <div class="input-group">
                        <label class="radio-inline"><input type="radio" name="optradio">CB</label>
                        <label class="radio-inline"><input type="radio" name="optradio">Paypal</label>
                        <label class="radio-inline"><input type="radio" name="optradio">Chèque</label> 
                    </div>
                </div>
                <div class="form-group"> -->
                    <!--<label for="InputMessage">Message</label>-->
                    <!-- <div class="input-group">
                        <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-ok"></span></span>
                    </div>
                </div> -->
                
                <input type="submit" name="submit" id="submit" value="Ajouter" class="btn btn-info pull-right">

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