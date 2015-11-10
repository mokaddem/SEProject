<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "SEProjectC";
var_dump($_POST);
if (array_key_exists($_POST)) {
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = 'UPDATE Personne SET LastName="'.$_POST["LastName"].'" WHERE ID = '.$_POST["ID"].'';

    if ($conn->query('UPDATE Personne SET LastName="'.$_POST["LastName"].'" WHERE ID = '.$_POST["ID"].'') === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}

?>