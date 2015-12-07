<!-- Suppression des knock off,
fonction appelée dans le formulaire de reset.php
Redirection vers group-generate.php

Mise à jour de l'historique
 -->
<?php
include_once('BDD.php');

$db = BDconnect();

// On ne touche pas aux catégories, extras, staff ou ranking.

// Vidage de toutes les tables qui ne serront plus utiles cette année.
$db->query('DELETE FROM GroupSunday');
$db->query('DELETE FROM GroupSaturday');
$db->query('DELETE FROM History');
$db->query('DELETE FROM KnockoffSaturday');
$db->query('DELETE FROM KnockoffSunday');
$db->query('DELETE FROM `Match`');
$db->query('DELETE FROM PersonneExtra');
$db->query('DELETE FROM Player');
$db->query('DELETE FROM PlayerAlone');
$db->query('DELETE FROM Team');

// Propriétaires et terrains vont dans les archives pour pouvoir les recontacter.
$db->query('DELETE FROM OldOwner');
$db->query('DELETE FROM OldTerrain');
$db->query('INSERT INTO OldOwner SELECT * FROM Owner');
$db->query('INSERT INTO OldTerrain SELECT * FROM Terrain');
//$db->query('DELETE FROM Owner');
//$db->query('DELETE FROM Terrain');

$db->query('DELETE FROM Personne WHERE IsPlayer = 1');

// Remise des variables globales à leurs valeurs d'origines:
// Il n'y a plus de tournoi généré.
// $req = $db->query("UPDATE GlobalVariables SET `Value` = \"[A rédiger]\" WHERE `Name` != \"tournament_started_sam\" AND `Name` != \"tournament_started_dim\"");
$req = $db->query("UPDATE GlobalVariables SET `Value` = \"0\" WHERE `Name` = \"tournament_started_sam\"");
$req = $db->query("UPDATE GlobalVariables SET `Value` = \"0\" WHERE `Name` = \"tournament_started_dim\"");
// Et tous les autres champ doivent être ré-encodé.

// Mise à jour de l'historique
require_once('add-new-history.php');
addHistory( 0, utf8_decode("Suppression de toute l'année précédente."), "Suppression");

header("Location: ../index.php");
?>
