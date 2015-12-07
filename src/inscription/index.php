<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8" />
    <title>Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body style="background : url(../images/player-back.jpg) 0 0 fixed;">


    <?php
    include('../staff/pages/php/BDD.php');

    $db = BDconnect();

    $tmp = $db->query('SELECT * FROM Extras');


    ?>

        <div class="container">

            <div class="page-header">
              <?php if (array_key_exists("error", $_GET)){ ?>
                <div class="alert alert-danger">Saisie incomplète</div>
              <?php } ?>

                <h1>
                Formulaire d'inscription
                <a class="btn btn-default pull-right" href="../index.php">Retour</a>
            </h1>

            </div>

            <!-- Registration form - START -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="Get" action="../staff/pages/php/add-new-pair.php">

                            <div class="col-lg-6">
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <select class="form-control" id="title1" name="title1">
                                            <option>M.</option>
                                            <option>Mme.</option>
                                        </select>
                                    </div>

                                    <div class="form-group well well-sm">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" Nom="InputNom" name="InputNom1" id="InputNom1" placeholder="Nom" required>
                                            <input type="text" class="form-control" Prenom="InputPrenom" name="InputPrenom1" id="InputPrenom1" placeholder="Prenom" required>
                                            <span>Né(e) le </span>
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
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <input type="text" class="form-control" name="InputAdresse1" id="InputAdresse1" placeholder="Adresse" required>
                                            <input type="text" class="form-control" name="InputBat1" id="InputBat1" placeholder="Numero - Batiment">
                                            <input type="text" class="form-control" name="InputCP1" id="InputCP1" placeholder="Code Postal" required>
                                            <input type="text" class="form-control" name="InputLoc1" id="InputLoc1" placeholder="Localité">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                            <input type="email" class="form-control" id="InputEmailFirst1" name="InputEmailFirst1" placeholder="Email" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input size="12" pattern=".{9,12}" maxlength="12" type="text" class="form-control bfh-phone" name="InputFixe1" id="InputFixe1" placeholder="+33 fixe">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input size="12" pattern=".{9,12}" maxlength="12" type="text" class="form-control bfh-phone" name="InputMob1" id="InputMob1" placeholder="+33 mobile" required>
                                        </div>
                                    </div>
                                    <div class="well well-sm form-group">
                                        <label for="InputPhone">Déjà participé au tournoi?</label>
                                        <label class="radio-inline">
                                            <input id="InputPartYes1" type="radio" name="InputPartYes1">Oui
                                        </label>
                                        <label class="radio-inline">
                                            <input id="InputPartNo1" type="radio" name="InputPartNo1">Non
                                        </label>
                                    </div>

                                    <div class="well well-sm  form-group">
                                        <label class="checkbox">Options supplémentaires</label>
                                        <?php
                                        $tmp = $db->query('SELECT * FROM Extras');
                                        $i=1;
                                        while ($extra = $tmp->fetch_array()){?>
                                            <div class="form-group" id="extraD1_<?php echo $i;?>" name="extraD1_<?php echo $i;?>">
                                                <input id="extra1_<?php echo $i;?>" name="extra1_<?php echo $i;?>" value=<?=$extra['ID']?> type="checkbox"> <strong><?php echo utf8_encode($extra['Name']);?></strong>: </input>
                                                <span><?php echo utf8_encode($extra['Description'])?></span>
                                            </div>
                                            <?php $i=$i+1;} $extraSize = $i; ?>
                                    </div>

                                    <div class="form-group well well-sm">
                                        <label>Montant à payer</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="15" disabled>
                                            <span class="input-group-addon">€</span>
                                        </div>
                                        <div class="input-group well well-sm">

                                        <label class="radio-inline"><input type="radio" name="group1" value="1"> CB</label>
                                        <label class="radio-inline"><input type="radio" name="group1" value="2" checked> Paypal</label>
                                        <label class="radio-inline"><input type="radio" name="group1" value="3"> Chèque</label>
                                        </div>
                                    </div>
                                    <div class="form-group well well-sm">
                                        <label><span class="fa fa-edit"></span> Information(s) complémentaire(s)</label>
                                            <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-comment"></span></span>
                                            <textarea name="InputMessage1" id="InputMessage1" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div>
                                <input id="addCoop" class="btn btn-info col-lg-4" value="Ajouter un partenaire"/>
                            </div>
                            <div class="col-lg-6" id="player2" data-activated="0">
                                <div class="col-lg-9">

                                    <div class="form-group">
                                        <select class="form-control" id="title2" name="title2">
                                            <option>M.</option>
                                            <option>Mme.</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group well well-sm">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" Nom="InputNom" name="InputNom2" id="InputNom2" placeholder="Nom" required>
                                            <input type="text" class="form-control" Prenom="InputPrenom" name="InputPrenom2" id="InputPrenom2" placeholder="Prenom" required>
                                            <span>Né(e) le </span>
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
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <input type="text" class="form-control" name="InputAdresse2" id="InputAdresse2" placeholder="Adresse" required>
                                            <input type="text" class="form-control" name="InputBat2" id="InputBat2" placeholder="Numero - Batiment">
                                            <input type="text" class="form-control" name="InputCP2" id="InputCP2" placeholder="Code Postal" required>
                                            <input type="text" class="form-control" name="InputLoc2" id="InputLoc2" placeholder="Localité">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                            <input type="email" class="form-control" id="InputEmailFirst2" name="InputEmailFirst2" placeholder="Email" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input size="12" pattern=".{9,12}" maxlength="12" type="text" class="form-control bfh-phone" name="InputFixe2" id="InputFixe2" placeholder="+33 fixe">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input size="12" pattern=".{9,12}" maxlength="12" type="text" class="form-control bfh-phone" name="InputMob2" id="InputMob2" placeholder="+33 mobile" required>
                                        </div>
                                    </div>
                                    <div class="form-group well well-sm">
                                        <label for="InputPhone">Déjà participé au tournoi?</label>
                                        <label class="radio-inline">
                                            <input id="InputPartYes2" name="InputPartYes2" type="radio" name="optradio">Oui
                                        </label>
                                        <label class="radio-inline">
                                            <input id="InputPartNo2" name="InputPartNo2" type="radio" name="optradio">Non
                                        </label>
                                    </div>


                                <div class="form-group well well-sm">
                                    <label class="checkbox">Options supplémentaires</label>
                                        <?php
                                            $tmp = $db->query('SELECT * FROM Extras');
                                            $i=1;
                                            while ($extra = $tmp->fetch_array()){?>
                                            <div class="form-group" id="extraD2_<?php echo $i;?>" name="extraD2_<?php echo $i;?>">
                                                <input id="extra2_<?php echo $i;?>" name="extra2_<?php echo $i;?>" value=<?=$extra['ID']?> type="checkbox"> <strong><?php echo utf8_encode($extra['Name']);?></strong>: </input>
                                                <span><?php echo utf8_encode($extra['Description'])?></span>
                                            </div>
                                            <?php $i=$i+1;} ?>
                                    </div>

                                    <div class="form-group well well-sm">
                                        <label for="InputPhone">Montant à payer</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="15" disabled>
                                            <span class="input-group-addon">€</span>
                                        </div>
                                        <div class="input-group well well-sm">
                                        <label class="radio-inline"><input type="radio" name="group2" value="1"> CB</label>
                                        <label class="radio-inline"><input type="radio" name="group2" value="2" checked> Paypal</label>
                                        <label class="radio-inline"><input type="radio" name="group2" value="3"> Chèque</label>

                                        </div>
                                    </div>
                                    <div class="form-group well well-sm">
                                        <label><span class="fa fa-edit"></span> Information(s) complémentaire(s)</label>
                                        <div class="input-group">

                                            <span class="input-group-addon"><span class="fa fa-comment"></span></span>

                                            <textarea name="InputMessage2" id="InputMessage2" class="form-control" rows="5"></textarea>
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

<script type="text/javascript">
    function hideDispElem(extraDivName, time, disp){
        if (disp){
            setTimeout(function() {  $(extraDivName).fadeIn('fast');}, time);
        }
        else{
            setTimeout(function() { $(extraDivName).fadeOut('fast');}, time);
        }
    }
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#player2').hide();
        if(document.getElementsByName("extra1_1")[0].checked == true){
            for (i = 2; i < <?php echo $extraSize; ?>; i++) {
                extraName= "extraD1_" +i.toString();
                $(extraName).hide();
            }
        }

        if(document.getElementsByName("extra2_1")[0].checked == true){
            for (i = 2; i < <?php echo $extraSize; ?>; i++) {
                extraName= "extraD2_" +i.toString();
                $(extraName).hide();
            }
        }
    });
</script>

<script type="text/javascript">
    function hideExtras(player){
        var nameExtra="extra"+ player.toString()+ "_";
        var nameDivExtra="extraD"+ player.toString() +"_";
        if(document.getElementsByName(nameExtra.toString()+ "1")[0].checked == true){
            for (i = 2; i < <?php echo $extraSize; ?>; i++) {
                var extraDivName= nameDivExtra.toString() +i.toString();
                var extraName= nameExtra.toString() +i.toString();
                hideDispElem("#"+extraDivName, 100*(i-2), false);
                document.getElementsByName(extraName.toString())[0].checked = false;
            }
        }
        else{
            for (i = <?php echo $extraSize; ?>; i > 1 ; i--) {
                var extraDivName= nameDivExtra.toString() +i.toString();
                var extraName= nameExtra.toString() +i.toString();
                    hideDispElem("#"+extraDivName, 100*(i-2), true);
            }
        }
    }
</script>

<script type="text/javascript">
    function registerAlone(){
        if($('#player2').attr("data-activated")==0){
            var url="../staff/pages/php/add-single-player.php";
            $('input').attr("required",false);
            $('form').attr("action", url);
            $('form').submit();
        }
    }
</script>

<script type="text/javascript">  window.onload = function() {
        document.getElementsByName("extra1_1")[0].addEventListener("click",function(){hideExtras(1); });
        document.getElementsByName("extra2_1")[0].addEventListener("click",function(){hideExtras(2); });
        document.getElementById("addCoop").addEventListener("click",function(){ $('#player2').show(); $('#addCoop').hide(); $('#player2').attr("data-activated",1);});
        document.getElementById("submit").addEventListener("click",registerAlone);
    };
</script>


</html>
