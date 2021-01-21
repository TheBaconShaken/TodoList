<?php include_once 'includes/db.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
</head>
<body>
    <!-- Todo List -->
    <div id="todolist-wrapper">
        <div id="todolist-header">
            <h1 id="todolist-heading">Simple Todo List</h1>
        </div>
        <ul id="todolist-list">
            <?php
                $query = "SELECT * FROM todolist;";
                $result = mysqli_query($conn, $query);
                if(!mysqli_num_rows($result)){
                    echo "No results.";
                }else{
                    
                }
            ?>
        </ul>
    </div>
</body>
</html>