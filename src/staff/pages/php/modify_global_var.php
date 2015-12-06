<?php
include_once('./BDD.php');

$db = BDconnect();
$req = $db->prepare("UPDATE SEProjectC.GlobalVariables SET `Value` = ? WHERE `Name` =\"".$_POST['varName']."\"");

$req->bind_param("s", $_POST['varVal']);
$req->execute();

header("Location: ../../group.php?jour=weekend&cat=toutes");

?>
