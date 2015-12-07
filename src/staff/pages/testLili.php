<form name="form1" action="testLili.php">
<input type="radio" name="input" onclick="document.form2.input.value = this.value;" value="sam" checked/>
<input type="radio" name="input" onclick="document.form2.input.value = this.value;" value="dim"/>
<input type="submit"/>
</form>

<form name="form2">
  <input type="text" name="input"/>
<input type="submit"/>
</form>

<form name="form3" role="form" method="get" action="php/add-new-group.php">
    <div class="row">
    <div class="col-lg-4 text-center">

        <fieldset data-role="controlgroup" data-type="horizontal">
            <label for="sam">Samedi</label>
            <input type="radio" name="jour" value="sam" onclick="document.form4.input.value = this.value;" checked>
            <label for="dim">Dimanche</label>
            <input type="radio" name="jour" value="dim" onclick="document.form4.input.value = this.value;">

            <div class="form-group">
                <!-- <select class="form-control" id="InputCat" name="InputCat">
                    <?php
                    // $db = BDconnect();
                    // $reponse = $db->query('SELECT * FROM Categorie');
                    // while ($donnes = $reponse->fetch_array())
                    // {
                    //     echo "<option value=".$donnes['ID'].">".utf8_encode($donnes['Designation'])." ".$donnes['Age']."</option>";
                    // }
                    ?>
                </select> -->
            </div>
            <input type="submit" name="submit" id="submit" value="Générer" class="btn btn-info pull-right">
        </fieldset>
        <hr>
    </div>
    </div>
</form>

<form name="form4">
  <input type="text" name="input"/>
<input type="submit"/>
</form>
