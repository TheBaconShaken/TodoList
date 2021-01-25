<?php

$dsn = 'mysql:host=localhost;dbname=todolist';
$user = 'root';
$pass = '';
$opt = [];


try{
    $conn = new PDO($dsn, $user, $pass, $opt);
}catch(PDOException $e){
    echo 'Failed to connect to database: ' . $e->getMessage();
}







?>
