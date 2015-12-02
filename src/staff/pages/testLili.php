<?php
include_once('php/BDD.php');
// Ajout du duo de joueur
$db = BDconnect();

/*On determine sa categorie - START */
// Get l'age le plus grand des deux joueurs
$ageCurrent = max(intval(date('Y')) - intval($_GET['birth_year1']), intval(date('Y')) - intval($_GET['birth_year2']));
$reponse = $db->query('SELECT * FROM Categorie');
$ID_Cat		= '1';

// Parcours des categories
foreach ($reponse as $donnees) {
  $ageCat = explode(" - ", $donnees["Age"]);

  // Si l'âge est dans la tranche d'âge on l'ajoute à cette catégorie
  if (intval($ageCat[0])< $ageCurrent && intval($ageCat[1]) > $ageCurrent) {
    $ID_Cat		= $donnees['ID'];
  }
}

echo "age : ";
echo $ageCurrent;
echo ' ID_Cat: ';
echo $ID_Cat;
$reponse->free();
