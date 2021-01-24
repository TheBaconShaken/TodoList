<?php
require 'db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = 'DELETE FROM todos WHERE id=:id';
    $statement = $conn->prepare($query);
    
    if($statement->execute([':id' => $id])){
        header("Location: /Todolist/index.php");
    }
}else{
    echo 'error';
    header("Location: /Todolist/index.php");
}
