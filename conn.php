<?php
$serveur = "localhost";
$utilisateur = "root";
$password = "";
$db_name = "projet";

$conn = mysqli_connect($serveur, $utilisateur, $password, $db_name);
if (!$conn) {
    die("Connection failed : " . mysqli_connect_error());
}
?>