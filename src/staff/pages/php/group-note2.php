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

<?php

$team = $db->query("SELECT * FROM Team WHERE ID=\"".$_GET['id']."\"")->fetch_array();
$IDPersonne = $team['ID_Player1'];
$player = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne."\"")->fetch_array();

$IDPersonne2 = $team['ID_Player2'];
$player2 = $db->query("SELECT * FROM Personne WHERE ID=\"".$IDPersonne2."\"")->fetch_array();
?>
<div class="panel panel-primary">
<div class="panel-heading">
    <?=$_GET['id']?>
</div>
<div class="panel-body">
    <p><?=$player['Note']?></p>
    <p><?=$player2['Note']?></p>
</div>
</div>


?>