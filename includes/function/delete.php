<?php
require 'db.php';

$id = $_GET['id'];
$query = 'DELETE FROM todos WHERE id=:id';
$statement = $conn->prepare($query);

if($statement->execute([':id' => $id])){
    header("Location: /");
}