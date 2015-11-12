<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">

        <div class="page-header">
            <h1>Formulaire d'inscription</h1>
        </div>

        <!-- Registration form - START -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" method="Get" action="../staff/pages/php/add-new-pair.php">

                        <div class="col-lg-6">
                            <div class="col-lg-9">
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
                                                  for ($i = date("Y"); $i >= 1900; $i--) {
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
                                        <input size="12" pattern=".{9,12}" maxlength="12" type="text" class="form-control bfh-phone" name="InputFixe1" id="InputFixe1" placeholder="+33 fixe">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input size="12" pattern=".{9,12}" maxlength="12" type="text" class="form-control bfh-phone" name="InputMob1" id="InputMob1" placeholder="+33 mobile" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sel2">Classement </label>
                                    <select class="form-control" id="sel2">
                                        <option>NC</option>
                                        <option>Trofor</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="InputPhone">Déjà participé au tournoi?</label>
                                    <label class="radio-inline">
                                        <input id="InputPartYes1" type="radio" name="InputPartYes1">Oui
                                    </label>
                                    <label class="radio-inline">
                                        <input id="InputPartNo1" type="radio" name="InputPartNo1">Non
                                    </label>
                                </div>
                                <!-- <div class="form-group"> -->
                                <!--<label for="InputNamePartner">Enter Name Partner</label>-->
                                <!-- <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                        <input type="text" class="form-control" name="InputNamePartner" id="InputNamePartner" placeholder="Nom du partenaire" required>
                                    </div> -->
                                <!-- </div>                 -->
                                <div class="form-group">
                                    <!--<label for="InputCredit">Paiement</label>-->
                                    <label for="InputPhone">Montant à payer</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="15" disabled>
                                        <span class="input-group-addon">€</span>
                                    </div>
                                    <div class="input-group">
                                        <label class="radio-inline">
                                            <input type="radio" name="CB1" id="CB1">CB</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="Paypal1" id="Paypal1">Paypal</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="Chèque1" id="Chèque1">Chèque</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!--<label for="InputMessage">Message</label>-->
                                    <div class="input-group">
                                        <textarea name="InputMessage" id="InputMessage" name="InputMessage" class="form-control" rows="5" required></textarea>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-ok"></span></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="col-lg-9">
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
                                    <select class="form-control" id="title2" name="title2">
                                        <option>M.</option>
                                        <option>Mme.</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <!--<label for="InputNom">Nom</label>-->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" Nom="InputNom" name="InputNom2" id="InputNom2" placeholder="Nom" required>
                                        <input type="text" class="form-control" Prenom="InputPrenom" name="InputPrenom2" id="InputPrenom2" placeholder="Prenom" required>
                                        <span>Née le </span>
                                        <select name='birth_day2' id='birth_day2'>
                                            <option value="na">Jour</option>
                                            <?php
                                                  for ($i = 1; $i <= 31; $i++) {
                                                        echo "<option>$i</option>\n";
                                                      }
                                        
                                                ?>
                                        </select>
                                        <select name='birth_month2' id='birth_month2'>
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
                                        <select name='birth_year2' id='birth_year2'>
                                            <option value="na">Année</option>
                                            <?php
                                                  for ($i = date("Y"); $i >= 1900; $i--) {
                                                    echo "<option>$i</option>\n";
                                                  }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <!--<label for="InputPrenom">Adresse</label>-->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        <input type="text" class="form-control" name="InputAdresse2" id="InputAdresse2" placeholder="Adresse" required>
                                        <input type="text" class="form-control" name="InputBat2" id="InputBat2" placeholder="Numero - Batiment">
                                        <input type="text" class="form-control" name="InputCP2" id="InputCP2" placeholder="Code Postal" required>
                                        <input type="text" class="form-control" name="InputLoc2" id="InputLoc2" placeholder="Localité">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!--<label for="InputEmail">Email</label>-->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                        <input type="email" class="form-control" id="InputEmailFirst2" name="InputEmailFirst2" placeholder="Email" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!--<label for="InputPhone">Numéro de téléphone</label>-->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input size="12" pattern=".{9,12}" maxlength="12" type="text" class="form-control bfh-phone" name="InputFixe2" id="InputFixe2" placeholder="+33 fixe">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input size="12" pattern=".{9,12}" maxlength="12" type="text" class="form-control bfh-phone" name="InputMob2" id="InputMob2" placeholder="+33 mobile" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sel4">Classement </label>
                                    <select class="form-control" id="sel4">
                                        <option>NC</option>
                                        <option>Trofor</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="InputPhone">Déjà participé au tournoi?</label>
                                    <label class="radio-inline">
                                        <input id="InputPartYes2" name="InputPartYes2" type="radio" name="optradio">Oui
                                    </label>
                                    <label class="radio-inline">
                                        <input id="InputPartNo2" name="InputPartNo2" type="radio" name="optradio">Non
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="InputPhone">Montant à payer</label>
                                    <!--<label for="InputCredit">Paiement</label>-->
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="15" disabled>
                                        <span class="input-group-addon">€</span>
                                    </div>
                                    <div class="input-group">
                                        <label class="radio-inline">
                                            <input type="radio" name="CB2" id="CB2">CB</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="Paypal2" id="Paypal2">Paypal</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="Chèque2" id="Chèque2">Chèque</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!--<label for="InputMessage">Message</label>-->
                                    <div class="input-group">
                                        <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-ok"></span></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-offset-5 col-lg-2">
                            <input type="submit" name="submit" id="submit" value="Valider" class="btn btn-info">
                        </div>
                    </form>
                </div>
            </div>
            <!-- Registration form - END -->
            <br/>
            <br/>
        </div>
    </div>
</body>
<!-- SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

</html>