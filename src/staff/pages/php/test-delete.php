<?php

    /* Suppression d'un joueur s'il n'appartient à aucune équipe */
    function canDeletePlayer($id) {
        
        include_once('BDD.php');
    
        
        $db = new BDD();
        $reponse = $db->query('SELECT * FROM `Team` WHERE ID_Player1 = '. $id .' OR ID_Player2 = '. $id .'');
        
        if (!$reponse->fetch_array()){
            return TRUE;
        }
        
        return FALSE;
    }

    /* Suppression d'une équipe si elle n'appartient à aucun match ou groupe */
    function canDeleteTeam($id) {

        include_once('BDD.php');
        $db = new BDD();
        $reponsematch = $db->query('SELECT * FROM `Match` WHERE ID_Equipe1 = '. $id .' OR ID_Equipe2 = '. $id .'');


        if ($reponsematch->fetch_array() == NULL){
            $reponsegroupsunday = $db->query('SELECT * FROM `GroupSunday` WHERE ID_t1 = '. $id .' OR ID_t2 = '. $id .' OR ID_t3 = '. $id .' OR ID_t4 = '. $id .' OR ID_t5 = '. $id .' OR ID_t6 = '. $id .'');
            if ($reponsegroupsunday->fetch_array() == NULL) {
                $reponsegroupsaturday = $db->query('SELECT * FROM `GroupSaturday` WHERE ID_t1 = '. $id .' OR ID_t2 = '. $id .' OR ID_t3 = '. $id .' OR ID_t4 = '. $id .' OR ID_t5 = '. $id .'');
                if ($reponsegroupsaturday->fetch_array() == NULL) {
                    return TRUE;
                }
            }
        }

        return FALSE;
    }

    /* Suppression d'un terrain s'il n'appartient à aucun match ou groupe */
    function canDeleteCourt($id)
    {

        include_once('BDD.php');

        $db = new BDD();
        $reponse = $db->query('SELECT * FROM `Match` WHERE ID_Terrain = ' . $id . '');

        if (!$reponse->fetch_array()) {

            $reponsegroupsunday = $db->query('SELECT * FROM `GroupSunday` WHERE ID_terrain = ' . $id . '');

            if (!$reponsegroupsunday->fetch_array()) {

                $reponsegroupsaturday = $db->query('SELECT * FROM `GroupSaturday` WHERE ID_terrain = ' . $id . '');

                if (!$reponsegroupsaturday->fetch_array()) {
                    return TRUE;
                }
            }

            return FALSE;
        }


        /* Suppression d'un owner s'il n'appartient à aucun terrain */
        function canDeleteOwner($id)
        {

            include_once('BDD.php');

            $db = new BDD();
            $reponse = $db->query('SELECT * FROM `Terrain` WHERE ID_Owner = ' . $id . '');

            if (!$reponse->fetch_array()) {
                return TRUE;
            }

            return FALSE;
        }
    }
?>