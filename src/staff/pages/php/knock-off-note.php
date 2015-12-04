<!-- note appelée dans la knock-off.php lorsque l'on veut afficher sa note
sa note sera affiché tout en bas de la page -->
<?php
require_once("./BDD.php");

if (array_key_exists("id", $_GET)) {
    $db = BDconnect(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!

    $team = $db->query("SELECT * FROM Team WHERE ID=\"" . $_GET['id'] . "\"")->fetch_array();
    $IDPersonne = $team['ID_Player1'];
    $player = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne . "\"")->fetch_array();

    $IDPersonne2 = $team['ID_Player2'];
    $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne2 . "\"")->fetch_array();
}
?>
<div class="panel text-center panel-border-perso">
<div class="panel-heading panel-perso">
    Note <?=$_GET['id']?>
</div>
<div class="panel-body">
    <p><?=$player['Note']?></p>
    <p><?=$player2['Note']?></p>
</div>
</div>
