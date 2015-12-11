<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body style="background : url(../images/owner-back.jpg) 0 0 fixed;">

    <div class="container">

        <?php
            include_once("../staff/pages/php/BDD.php");
        ?>
        <div class="page-header">
            <h1>
                Formulaire d'inscription
                <a class="btn btn-default pull-right" href="../index.php">Retour</a>
            </h1>
        </div>

        <!-- Registration form - START -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" method="Get" action="../staff/pages/php/add-new-owner+terrain.php">

                        <div class="col-lg-6">
                            <div class="col-lg-9">

                                <div class="form-group">
                                    <label><span class="fa fa-user"></span> Propriétaire</label>


                                    <select class="form-control" id="owner" name="owner">
                                        <option value="0" SELECTED> Nouveau propriétaire </option>
                                        <?php
                                        $db = BDconnect();
//                                        $owners = $db->query('SELECT O.ID_Personne, Oo.ID_Personne FROM Owner O LEFT OUTER JOIN OldOwner Oo ON O.ID_Personne = Oo.ID_Personne UNION SELECT O.ID_Personne, Oo.ID_Personne FROM Owner O RIGHT OUTER JOIN OldOwner Oo ON O.ID_Personne = Oo.ID_Personne ');
                                        $owners = $db->query('SELECT DISTINCT * FROM (SELECT * FROM `OldOwner` UNION ALL SELECT * FROM Owner) as R1');
                                        foreach($owners as $owner)
                                        {
                                            error_log($owner['ID_Personne']);
                                            $personne = $db->query('SELECT * FROM Personne WHERE ID = '.$owner['ID_Personne'])->fetch_array();
                                            echo "<option value=".$personne['ID']."> [".$personne['ID']."] ".utf8_encode($personne['FirstName'])." ".$personne['LastName']."</option>";
                                        }
                                        ?>
                                    </select>

                                    <br/>
                                </div>
                            <div id="countainerInfoOwn">
                                    <select class="form-control" id="title" name="title">
                                        <option>M.</option>
                                        <option>Mme.</option>
                                    </select>

                                <div class="form-group well well-sm">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" Nom="InputNom" name="InputNom" id="InputNom" placeholder="Nom" required>
                                        <input type="text" class="form-control" Prenom="InputPrenom" name="InputPrenom" id="InputPrenom" placeholder="Prenom" required>

                                        <span>Né(e) le </span>
                                        <select name='birth_day' id='birth_day'>
                                            <option value="na">Jour</option>
                                            <?php
                                        for ($i = 1; $i <= 31; $i++) {
                                            echo "<option>$i</option>\n";
                                        }

                                        ?>
                                        </select>
                                        <select name='birth_month' id='birth_month'>
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
                                        <select name='birth_year' id='birth_year'>
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
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        <input type="text" class="form-control" name="InputAdresse" id="InputAdresse" placeholder="Adresse" required>
                                        <input type="text" class="form-control" name="InputBat" id="InputBat" placeholder="Numero - Batiment">
                                        <input type="text" class="form-control" name="InputCP" id="InputCP" placeholder="Code Postal" required>
                                        <input type="text" class="form-control" name="InputLoc" id="InputLoc" placeholder="Localité">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                        <input type="email" class="form-control" id="InputEmailFirst" name="InputEmailFirst" placeholder="Email" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input size="12" pattern=".{9,12}" maxlength="12" type="text" class="form-control bfh-phone" name="InputFixe" id="InputFixe" placeholder="+33 fixe">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input size="12" pattern=".{9,12}" maxlength="12" type="text" class="form-control bfh-phone" name="InputMob" id="InputMob" placeholder="+33 mobile" required>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="col-lg-9">
                                <div id="mydiv">
                                    <label><span class="fa fa-circle-o"></span> Terrain</label>

                                    <select class="form-control" id="terrain" name="terrain">
                                        <option value="0"> Nouveau terrain </option>
                                        <?php
                                        $terrains = $db->query('SELECT * FROM OldTerrain');
                                        foreach($terrains as $terrain)
                                        {
                                            error_log($terrain['ID_Owner']);
                                            $owner = $db->query('SELECT * FROM Owner WHERE ID = '.$terrain['ID_Owner'])->fetch_array();
                                            if ($owner == NULL){
                                                $owner = $db->query('SELECT * FROM OldOwner WHERE ID = '.$terrain['ID_Owner'])->fetch_array();
                                            }
                                            $personne = $db->query('SELECT * FROM Personne WHERE ID = '.$owner['ID_Personne'])->fetch_array();
                                            //$personne = $db->query('SELECT Personne FROM Personne,Owner,OldOwner WHERE (Owner.ID_Personne = Personne.ID AND Owner.ID = '.$terrain['ID_Owner'].')  OR (OldOwner.ID_Personne = Personne.ID AND OldOwner.ID = '.$terrain['ID_Owner'].')')->fetch_array();
                                            echo "<option value=".$terrain['ID']."> [".$terrain['ID']."] ".utf8_encode($terrain['adresse'])." - Propriétaire ".$personne['FirstName']." ".$personne['LastName']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div id="countainerInfoCou">
                                <div class="form-group">

                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map"></i></span>
                                        <input type="text" class="form-control" name="InputAdresseCourt" id="InputAdresseCourt" placeholder="Adresse" required>
                                        <input type="number" min="0" class="form-control" name="InputSurface" id="InputSurface" placeholder="Surface">
                                        <select class="form-control" id="type" name="type">
                                            <option>Synthétique</option>
                                            <option>Terre battue</option>
                                            <option>Gazon</option>
                                        </select>
                                        <select class="form-control" id="etat" name="etat">
                                            <option>Neuf</option>
                                            <option>Passable</option>
                                            <option>Usé</option>
                                        </select>
                                    </div>
                                </div>
                                  <label><span class="fa fa-clock-o"></span> Disponibilités</label>
                                  <div class="form-group">
                                      <label class="pull-left" for="InputFrom">Du </label>
                                      <div class="input-group pull-right">
                                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                          <input size="10" maxlength="10" class="form-control" name="calendarF" id="calendarF" type="date" min="<?=date(" Y-m-d ")?>" max="2048-10-10" value="<?=date(" Y-m-d ")?>">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="pull-left" for="InputTo">Au </label>
                                      <div class="input-group pull-right">
                                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                          <input size="10" maxlength="10" class="form-control" name="calendarT" id="calendarT" type="date" min="<?=date(" Y-m-d ")?>" max="2048-10-10" value="<?=date(" Y-m-d ")?>">
                                      </div>
                                  </div>
                                </br>
                                </br>
                                </br>
                                </br>
                                </br>
                                </br>
                                <div class="form-group well well-sm">
                                    <label>Remarques</label>

                                    <div class="input-group">
                                        <textarea name="InputMessage" id="InputMessage" name="InputMessage" class="form-control" rows="5" placeholder="N'hésitez pas à entrer d'autres informations ou remarques" required></textarea>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-ok"></span></span>
                                    </div>
                                </div>
                                </div>
                                </br>
                                <input type="submit" name="submit" id="submit" value="Valider" class="btn btn-info pull-right">
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


<script>
    function updateFieldOwner(){
        if($('#owner option:selected').val() != 0){
            $('#countainerInfoOwn').fadeOut('fast');
            $(':input').removeAttr('required');
        }else{
            $('#countainerInfoOwn').fadeIn('fast');
            $(':input').attr('required', "true");
        }
    }

    function updateFieldCourt() {
        if ($('#terrain option:selected').val() != 0) {
            $('#countainerInfoCou').fadeOut('fast');
            $(':input').removeAttr('required');
        } else {
            $('#countainerInfoCou').fadeIn('fast');
            $(':input').prop('required', "true");
        }
    }
</script>



<script type="text/javascript">
    $('#owner').change(updateFieldOwner);
    $('#terrain').change(updateFieldCourt);
    updateFieldOwner();
    updateFieldCourt();
</script>


<script type="text/javascript">
    // document.getElementById("size").addEventListener("change", AddCourtInput);
</script>


</html>
