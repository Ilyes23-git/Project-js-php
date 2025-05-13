<?php

$host='localhost';
$username='root';
$password='';
$db='projet';

$conn = new mysqli($host, $username, $password,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

if(isset($_POST['word'])){
    $word = $_POST['word'];
    $stmt = $conn->prepare("INSERT INTO mots (mot) VALUES (?)");
    $stmt->bind_param("s", $word);


   if ($stmt->execute()) {
       echo "insertion succesful";
   } else {
       echo "Error insertion table: " . $conn->error;
   }
   $stmt->close();
   $conn->close();  
}


?>         