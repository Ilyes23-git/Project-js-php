<?php
  require_once 'data.php';

  if(isset($_POST['mot'])){
    $word = $_POST['mot'];

    $s = 'INSERT INTO WORDS (mot) VALUES (?)';
    $stmt = $pdo->prepare($s);
    $stmt->execute([$word]);
    
    echo "Mot enregistré avec succès.";
} else {
    echo "Aucun mot reçu.";

  }
?>