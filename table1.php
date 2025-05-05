<?php

$host='localhost';
$username='root';
$password='';
$db='projet';

$conn = new mysqli($host, $username, $password,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

   $table = "CREATE TABLE auth(
             indice INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
             username VARCHAR(20),
             email VARCHAR(20),
             pass VARCHAR(20))";

   if ($conn->query($table) === TRUE) {
       echo "Table words created successfully";
   } else {
       echo "Error creating table: " . $conn->error;
   }
 
   $conn->close();  
?>         