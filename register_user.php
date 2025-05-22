<?php
require "conn.php";

if (!$conn) {
    die("Connection failed : " . mysqli_connect_error());
}

echo "Successful connection with Mysql."; 


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
    echo "⚠️ No data received.";
}

$conn->close();
?>