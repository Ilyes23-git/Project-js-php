<?php
session_start();
require "conn.php";
$stmt = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user']) && isset($_POST['pass'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if ($user === "admin" && $pass === "0000") {
        $_SESSION['username'] = "admin";
        echo "<script>window.location.href = 'admin.html'</script>";
        exit;
    } 

    $stmt = $conn->prepare("SELECT username, pass FROM auth WHERE username = ?");
    if ($stmt) {
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

      if ($result && $result->num_rows === 1) {
       $row = $result->fetch_assoc();
        
        if ($pass === $row['pass']) {
            $_SESSION['username'] = $row['username'];
            echo "<script>window.location.href = 'Accueil.html'</script>";
            exit;
        } 
        else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Utilisateur introuvable.";
    }

    $stmt->close();
}
}
$conn->close();

?>