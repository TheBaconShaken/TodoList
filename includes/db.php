<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "todolist";


$conn = mysqli_connect($host, $user, $pass, $db);

if(mysqli_errno($conn)){
    echo "Failed to connect to MySQL server: " . mysqli_errno($conn);
    exit();
}