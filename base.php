<?php
$host='localhost';
$username='root';
$password='';
$db='projet';

$conn = new mysqli($host, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

$sql="CREATE DATABASE $db";

if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();
?>  