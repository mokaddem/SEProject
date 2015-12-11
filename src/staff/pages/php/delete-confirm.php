<!-- Suppression d'un participant,
fonction appelée dans le formulaire de list.php?type=player
Redirection vers list.php?type=player

Mise à jour de l'historique
 -->
<?php
include_once('BDD.php');

    $db = BDconnect();

    // Suppression
    $db->query('DELETE FROM TmpPersonne WHERE ID='.$_GET['id']);
    $db->query('DELETE FROM TmpPlayer WHERE ID_Personne='.$_GET['id']);
    $db->query('DELETE FROM TmpPersonneExtra WHERE Personne_ID='.$_GET['id']);
    $db->query('DELETE FROM TmpTeam WHERE ID_Player1='.$_GET['id'].' OR ID_Player2='.$_GET['id']);

    // Mise à jour de l'historique
    require_once('add-new-history.php');
    addHistory( $_GET['id'], "Joueur", "Suppression");

    header("Location: ../list.php?type=confirm");

?>
