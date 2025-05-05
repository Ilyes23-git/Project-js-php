<?php

$host='localhost';
$username='root';
$password='';
$db='projet';

$conn = new mysqli($host, $username, $password,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

   $table = "CREATE TABLE mots(
             indice INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
             mot VARCHAR(10) NOT NULL)";

   if ($conn->query($table) === TRUE) {
       echo "Table words created successfully";
   } else {
       echo "Error creating table: " . $conn->error;
   }
 
   $conn->close();  
?>         