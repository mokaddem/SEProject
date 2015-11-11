<?php require_once("./BDD.php");
?>
<?php
if (array_key_exists("id", $_GET)) {

    $db = new BDD(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!
    $listDonnees = $db->query('SELECT * FROM Personne WHERE ID = '.$_GET['id'].'');
    $donnees = $listDonnees->fetch_array();
} ?>
<div class="panel panel-primary">
<div class="panel-heading">
    <?=$donnees['LastName']?>
</div>
<div class="panel-body">
<p><?=$donnees['Note']?></p>
</div>
</div>