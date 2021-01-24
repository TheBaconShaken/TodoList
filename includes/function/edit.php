<?php
require 'db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $todos = $conn->prepare("SELECT * FROM todos WHERE id=:id");
    $todos->execute([':id'=>$id]);
    $todo = $todos->fetch(PDO::FETCH_ASSOC);
    
}else{
    echo 'error';
    header("Location: /Todolist/index.php?edit=danger");
}


if(isset($_POST['edit-title']) && isset($_POST['edit-description'])){
    $title = $_POST['edit-title'];
    $desc = $_POST['edit-description'];

    $query = 'UPDATE todos SET title = :title , description = :description WHERE id=:id';
    $statement = $conn->prepare($query);
    
    if($statement->execute([':title'=>$title,':description'=>$desc,':id'=>$id])){
        header("Location: /Todolist/index.php?edit=success");
    }else{
        header("Location: /Todolist/index.php?edit=danger");
    }
}

?>
<!-- Custom CSS -->
<link rel="stylesheet" href="css/style.css" >
<!-- Tailwind CSS -->
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<div class="bg-gray-50 pl-4 pb-4 pt-8 border-4 border-gray-100">
    <a href="index.php" class="no-underline text-gray-900 hover:text-gray-700"><h1 id="todolist-heading" class="text-5xl font-bold">Edit Todo</h1></a>
    <div id="todolist-edit">
        <form id="edit-form" method="post" autocomplete="off">
            <div class="form-input flex flex-col">
                <label for="edit-title" class="text-2xl">Title</label>
                <input type="text" name="edit-title" id="input-title" class="form-title form-control" value="<?= $todo['title'] ?>">
            </div>
            <div class="form-input flex flex-col">
                <label for="edit-description" class="text-2xl">Description</label>
                <input type="text" name="edit-description" id="input-desc" class="form-desc form-control" value="<?= $todo['description'] ?>">
            </div>
            <div class="form-input pt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>