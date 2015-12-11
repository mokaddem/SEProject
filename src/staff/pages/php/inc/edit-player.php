<?php
include_once('../BDD.php');
require_once('../add-new-history.php');

//	$db = BDconnect();

//$database_host = 'localhost';
//$database_user = 'root';
//$database_pass = '123';
//$database_db = 'SEProjectC';
//$db = new mysqli($database_host, $database_user, $database_pass, $database_db);
$db = BDconnect();
$ID	 	    = $_GET['id'];
$FirstName	= utf8_decode($_GET['InputPrenom']);
$LastName	= utf8_decode($_GET['InputNom']);
$Title		= $_GET['title'];
$ZIPCode	= $_GET['InputCP'];
$PhoneNumber= $_GET['InputFixe'];
$GSMNumber	= $_GET['InputMob'];
$Ville		= utf8_decode($_GET['InputLoc']);
$Rue		= utf8_decode($_GET['InputAdresse']);
$Number		= $_GET['InputBat'];
$BirthDate	= $_GET['birth_year']."-".$_GET['birth_month']."-".$_GET['birth_day'];
$Mail		= $_GET['InputEmailFirst'];
$Note       = utf8_decode($_GET['InputMessage']);

if(array_key_exists("confirm", $_GET)){
    $table1="TmpPersonne";
    $table2="TmpPersonneExtra";
    $type="confirm";
}else{
    $table1="Personne";
    $table2="PersonneExtra";
    $type="player";
}
error_log(serialize($_GET));

$req = $db->prepare("UPDATE ".$table1." SET FirstName = ?,LastName = ?,Title = ?,ZIPCode =?,PhoneNumber = ?,GSMNumber = ?,Ville = ?,Rue = ?,Number = ?,BirthDate = ?,Mail = ?,Note=? WHERE ".$ID."=TmpPersonne.ID");
$req->bind_param("ssiiiississs", $FirstName, $LastName, $Title, $ZIPCode, $PhoneNumber, $GSMNumber, $Ville, $Rue, $Number, $BirthDate, $Mail, $Note);
$req->execute();

//$req = $db->prepare("UPDATE SEProjectC.PersonneExtra SET Extra_ID=? WHERE Personne_ID=?");
//$nbrIter = $db->query('SELECT count(ID) as nbr FROM Extras')->fetch_array()['nbr'];
$extraIDs = $db->query('SELECT ID as id FROM Extras');
//error_log(serialize($_GET));
//for($i=1; $i<=$nbrIter; $i++){
while($extraID = $extraIDs->fetch_array()){
    $extraName="extra_".(String) ($extraID['id']);
    if(isset($_GET[$extraName])) {
        $extra = $_GET[$extraName];

        $extraPresent = false;
        $extratemp = $db->query("SELECT Extra_ID as Eid FROM ".$table2." WHERE Personne_ID=".$ID);
        while($extraNameNumber = $extratemp->fetch_array()){
            if($extraNameNumber['Eid'] == $extraID['id']){
                $extraPresent = true;
            }
        }
        if($extraPresent)
        {
            //Do nothing
        }
        else{
            $db->query("INSERT INTO ".$table2." (ID, Extra_ID, Personne_ID) VALUES(\"\",".$extraID['id'].",".$ID.")");
        }

    } else{
        $db->query("DELETE FROM ".$table2." WHERE Extra_ID=".$extraID['id']." AND Personne_ID=".$ID);
    }
}

addHistory($ID, "Joueur", "Edition");

header("Location: ../../list.php?type=".$type);

?>
