<?php
require 'db.php';

$id = $_POST['id'];

if(empty($id)){
    echo 'error';
    header("Location: /Todolist/index.php");
}else{
    $todos = $conn->prepare("SELECT id, status FROM todos WHERE id=:id");
    $todos->execute([':id'=>$id]);
    $todo = $todos->fetch();
    
    $todoId = $todo['id'];
    $checked = $todo['status'];

    $unChecked = $checked ? 0 : 1;

    $res = $conn->prepare("UPDATE todos SET status=:unChecked WHERE id=:todoId");
    $res->execute([':unChecked'=>$unChecked, ':todoId'=>$todoId]);

    if($res){
        echo $checked;
    }else{
        echo 'error';
    }

    exit();
}