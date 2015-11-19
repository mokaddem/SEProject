<?php
    include_once("../../../addons/Populate/populateDB.php");
    
    PopulateDB();

    header("Location: ../list.php?type=player");
?>