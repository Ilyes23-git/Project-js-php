<?php
$serveur = "localhost";
$utilisateur = "root";
$password = "";
$db_name = "projet";


$conn = mysqli_connect($serveur, $utilisateur, $password, $db_name);

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

echo "Connexion réussie avec MySQLi."; 


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mail'])&& isset($_POST['username'])&& isset($_POST['password'])) {
    $mail = $_POST['mail']; 
    $username = $_POST['username']; 
    $password = $_POST['password']; 

        $stmt = $conn->prepare("INSERT INTO auth (email,username,pass) VALUES (?,?,?)");
        $stmt->bind_param("sss", $mail,$username,$password);

        if ($stmt->execute()) {
            echo "<h1>Create was successful</h1>";
        } else {
            echo " Erreur : " . $stmt->error;
        }

        $stmt->close();
} else {
    echo "⚠️ Aucune donnée reçue.";
}

$conn->close();
?>