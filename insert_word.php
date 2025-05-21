<?php
$serveur = "localhost";
$utilisateur = "root";
$password = "";
$db_name = "projet";


$conn = mysqli_connect($serveur, $utilisateur, $password, $db_name);

if (!$conn) {
    die("Connection failed : " . mysqli_connect_error());
}

echo "Successful connection with Mysql."; 


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['word'])) {
    $word = $_POST['word']; 

        $stmt = $conn->prepare("INSERT INTO mots (mot) VALUES (?)");
        $stmt->bind_param("s", $word);

        if ($stmt->execute()) {
            echo "<h1>Create was successful</h1>";
        } else {
            echo " Erreur : " . $stmt->error;
        }

        $stmt->close();
} else {
    echo " No data received.";
}

$conn->close();
?>