<?php
    $handle = ['', ''];

    if(isset($_POST['title']) && isset($_POST['description'])){
        $title = $_POST['title'];
        $desc = $_POST['description'];

        $query = 'INSERT INTO todos (title, description, status) VALUES (:title, :desc, :status)';
        $statement = $conn->prepare($query);
        if($statement->execute([':title' => $title, ':desc' => $desc, ':status' => 0])){
            $handle = ['Succesfully submitted data!', 0];
        }else{
            $handle = ['Failed to submit data..', 1];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" >
    <!-- Tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/24f5eb1201.js"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>