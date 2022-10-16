<?php 


$pdo = new PDO('mysql:host=maria_db;dbname=mariadbdata', 'root', 'password');
$delete =  $pdo->prepare('DELETE FROM content WHERE id = :id');
$delete = $delete->execute([
    ':id' => $_GET['id']
]);

header('Location: ../content.php');
