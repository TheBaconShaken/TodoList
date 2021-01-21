<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "todolist";

$conn = new mysqli($host, $user, $pass, $db);

//Check Connection
if ($conn -> mysqli_connect_errno){
    echo "Failed to connect to MySQL: ";
    exit();
}

