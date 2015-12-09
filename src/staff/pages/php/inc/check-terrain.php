<?php
//include_once('../BDD.php');
header('Content-type: application/json');
// Fonction utilisée pour vérifier que tous les groupes ont un terrain différent.
function checkDifferentCourtsForGroups($day){
    $db = BDconnect();

    if($day == "sam"){
        $table = "GroupSaturday";
    } else{
        $table = "GroupSunday";
    }

    $allPouleTerrain = $db->query('SELECT COUNT(ID_terrain) as terrainNum  FROM '.$table)->fetch_array();
    $distinctPouleTerrain = $db->query('SELECT COUNT(DISTINCT ID_terrain) as terrainNum  FROM '.$table)->fetch_array();

    $terrainNum = $db->query('SELECT COUNT(ID) as terrainNum FROM Terrain')->fetch_array();
    $terrainNum = $terrainNum['terrainNum'];

    $distinctNum = $distinctPouleTerrain['terrainNum'];
    $terrainPouleNum = $allPouleTerrain['terrainNum'];
    if ($terrainPouleNum > $distinctNum){
        if ($terrainNum == $distinctNum){
            $response_array['rep']= "Tous les terrains sont utilisés, mais il n'y en a pas assez pour tous les groupes.";
        } elseif ($terrainNum > $distinctNum){
            $response_array['rep']= "Certain groupes utilisent les même terrain, mais certain terrain ne sont pas utilisés.";
        } else{
            $response_array['rep']= "Erreur: plus de terrains sont utilisés qu'il n'en existe !";
        }
    } else{
        $response_array['rep']= "success";
    }
    return json_encode($response_array);
}

// Fonction utilisée pour vérifier que tous les matches des knock-off ont un terrain différent.
// ATTENTION: ne vérifie que pour tous les matches du premier round.
function checkDifferentCourtsForKnock($day){
    $db = BDconnect();

    if($day == "sam"){
        $pouleID = -1;
    } else{
        $pouleID = -2;
    }

    for($i = 1; $i < 5; $i++) {
        $allKnockTerrain = $db->query('SELECT COUNT(ID_Terrain) as terrainNum  FROM `Match` WHERE Poule_ID = ' . $pouleID . ' AND ID_Equipe2 != -2 AND `hour` = \'14:00\'')->fetch_array();
        $distinctKnockTerrain = $db->query('SELECT COUNT(DISTINCT  ID_Terrain) as terrainNum  FROM `Match` WHERE Poule_ID = ' . $pouleID . ' AND ID_Equipe2 != -2 AND `hour` = \'14:00\'')->fetch_array();

        $terrainNum = $db->query('SELECT COUNT(ID) as terrainNum FROM Terrain')->fetch_array();
        $terrainNum = $terrainNum['terrainNum'];

        $distinctNum = $distinctKnockTerrain['terrainNum'];
        $terrainKnockNum = $allKnockTerrain['terrainNum'];
        if ($terrainKnockNum > $distinctNum) {
            if ($terrainNum == $distinctNum) {
                $response_array['rep'] = "Tous les terrains sont utilisés, mais il n'y en a pas assez pour tous les matches.";
            } elseif ($terrainNum > $distinctNum) {
                $response_array['rep'] = "Certain matches utilisent les même terrain, mais certain terrains ne sont pas utilisés.";
            } else {
                $response_array['rep'] = "Erreur: plus de terrains sont utilisés qu'il n'en existe !";
            }
        } else {
            $response_array['rep'] = "success";
        }
    }
    return json_encode($response_array);
}
?>