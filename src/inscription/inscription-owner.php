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
                                    <input type="text" class="form-control bfh-phone" name="InputFixe1" id="InputFixe1" placeholder="+33 fixe">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" class="form-control bfh-phone" name="InputMob1" id="InputMob1" placeholder="+33 mobile" required>
                                </div>
                            </div>

                            <!--<div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-bars"></i></span>
                                    <input type="number" class="form-control" name="size" id="size" placeholder="Nombre d'équipes" min="1" step="1"  style="width: 60px;" required>
                                </div>
                            </div>-->

                            <div id="mydiv">
                                <div class="form-group" >
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map"></i></span>
                                        <input type="text" class="form-control" name="InputAdresse1" id="InputAdresse1" placeholder="Adresse" required>
                                        <input type="number" min="0" class="form-control" name="InputBat1" id="InputBat1" placeholder="Surface">
                                        <select class="form-control" id="title1" name="title1">
                                            <option>Synthétiqe</option>
                                            <option>Terre battue</option>
                                            <option>Gazon</option>
                                        </select>
                                        <select class="form-control" id="title1" name="title1">
                                            <option>Neuf</option>
                                            <option>Passable</option>
                                            <option>Usé</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="form-group">
                                        <label for="sel1"><span class="fa fa-clock-o"></span> Date & Heure</label>
                                        <div class="input-group">
                                            Avaible from: <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <?php echo '<input type="date" min="'.date("Y-m-d").'" max="2048-10-10" name="calendarF" id="calendarF" value="'.date("Y-m-d").'">';?>
                                            Avaible until: <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <?php echo '<input type="date" min="'.date("Y-m-d").'" max="2048-10-10" name="calendarT" id="calendarT" value="'.date("Y-m-d").'">';?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <!--<label for="InputMessage">Message</label>-->
                                <div class="input-group">
                                    <textarea name="InputMessage" id="InputMessage" name="InputMessage" class="form-control" rows="5" placeholder="N'hésitez pas à entrer d'autres informations ou demande ci-dessous" required></textarea>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-ok"></span></span>
                                </div>
                            </div>

                            <input type="submit" name="submit" id="submit" value="Valider" class="btn btn-info">
                        </div>
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


<script type="text/javascript">
 /*   function AddCourtInput(){
          for (i = 1; i < document.getElementById("size").value; i++) {
              var mydiv = document.getElementById('mydiv');
              var mydiv2 = mydiv.cloneNode(true);
              mydiv.appendChild(mydiv2);
        }
    }*/
</script>

<script type="text/javascript">// document.getElementById("size").addEventListener("change", AddCourtInput);</script>


</html>