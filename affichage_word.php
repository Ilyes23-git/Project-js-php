<?php
session_start();

require "conn.php";
$sql = "SELECT mot FROM mots ORDER BY RAND()";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$mot = $row['mot'];
$melange = str_shuffle($mot);

$_SESSION['mot_original'] = $mot;

echo json_encode([
    "mot" => $mot,
    "melange" => $melange,
]);

mysqli_close($conn);
?>
