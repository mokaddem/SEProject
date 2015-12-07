<!-- Mise à jour du score dans la page input-group-score.php,
fonction appelée en dynamique dans le formulaire de input-group-score.php

Mise à jour de l'historique
 -->
<?php
    include_once('BDD.php');
    // Mise à jour de l'historique
    require_once('add-new-history.php');

    // Mise à jour du score
    $db = BDconnect();
    $indice = $_POST['indice'];
    $scoreName = $indice == 1 ? "score1" : "score2";
    $score = $_POST['score'];
    $MatchID = $_POST['idM'];
    $teamID = $_POST['idT'];

    $req = $db->prepare("UPDATE SEProjectC.`Match` SET ".$scoreName."=? WHERE `Match`.ID=?");

    $req->bind_param("ii", $score, $MatchID);
    $req->execute();
    // Mise à jour de l'historique
    addHistory($MatchID, "Match", "Ajout");
?>
