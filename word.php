<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'projet';

$word = $_POST['word'];

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO mots(mot) VALUES (?)");
    $stmt->bind_param("s", $word);

    if ($stmt->execute()) {
        echo "Mot ajouté avec succès.";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
?>
