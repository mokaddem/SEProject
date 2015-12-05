<!-- note appelée dans la group.php lorsque l'on veut afficher sa note
sa note sera affiché tout en bas de la page -->
<?php require_once("./BDD.php");
?>
<?php
if (array_key_exists("id", $_GET)) {
    $db = BDconnect(); // ne devrait pas avoir lieu, UNE SEULE INSTANCE DE BDD !!!

    $team = $db->query("SELECT * FROM Team WHERE ID=\"" . $_GET['id'] . "\"")->fetch_array();
    $IDPersonne = $team['ID_Player1'];
    $player = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne . "\"")->fetch_array();

    $IDPersonne2 = $team['ID_Player2'];
    $player2 = $db->query("SELECT * FROM Personne WHERE ID=\"" . $IDPersonne2 . "\"")->fetch_array();
}

if ($player['Note'] && $player2['Note']) { ?>
  <pre><b>Note <?=$_GET['id']?> :</b><ul><li><?=$player['Note']?></li><li><?=$player2['Note']?></li></ul></pre>
<?php
} elseif ($player['Note']) { ?>
  <pre><b>Note <?=$_GET['id']?> :</b><ul><li><?=$player['Note']?></li></ul></pre>
<?php
} elseif ($player2['Note']) { ?>
  <pre><b>Note <?=$_GET['id']?> :</b><ul><li><?=$player2['Note']?></li></ul></pre>
<?php
}?>
