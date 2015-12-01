<!-- Ajout d'une nouvelle action dans l'historique,
fonction appelée dans tous les formulaires qui touchent à la BDDS
 -->

<?php session_start(); ?>
<?php
	include_once('BDD.php');
    function addHistory($IdEntite, $TypeEntite, $Action) {

	$db = BDconnect();
	   $req = $db->prepare("INSERT INTO History(id, idPerson, idEntite, typeEntite, action, date, hour) VALUES(?, ?, ?, ?, ?, ?, ?)");

	   $Id	= '';
        $IdPerson = $_SESSION["ID"];
	   $Date = date("Y-m-d");
        $Hour = date("H:i:s");

        $req->bind_param("iiissss", $Id, $IdPerson, $IdEntite, $TypeEntite, $Action, $Date, $Hour);

	   $req->execute();

    }

?>
