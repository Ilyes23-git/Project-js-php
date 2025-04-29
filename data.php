<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'data';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (Exception $e) {
    die("Erreur: " . $e->getMessage());
}
?>
