<?php
require "conn.php";

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