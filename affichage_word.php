<?php
session_start();

$serveur = "localhost";
$utilisateur = "root";
$password = "";
$db_name = "projet";

$conn = mysqli_connect($serveur, $utilisateur, $password, $db_name);

if (!$conn) {
    die("Erreur de connexion");
}

$sql = "SELECT mot FROM mots ORDER BY RAND()";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$mot = $row['mot'];
$melange = str_shuffle($mot);

$_SESSION['mot_original'] = $mot;

echo json_encode([
    "mot" => $mot,
    "melange" => $melange,
    "score" => $_SESSION['score']
]);

mysqli_close($conn);
