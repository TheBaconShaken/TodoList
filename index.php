<?php include_once 'includes/db.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="css/style.css" >
</head>
<body>
    <!-- Todo List -->
    <div id="todolist-wrapper">
        <div id="todolist-header">
            <h1 id="todolist-heading">Simple Todo List</h1>
        </div>
        <ul id="todolist-list">
            <?php
                $query = "SELECT * FROM todos;";
                $result = mysqli_query($conn, $query);
                $resultcheck = mysqli_num_rows($result);
                
                if($resultcheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                            <li class="list-item">
                                <h1 class="item-title"><?php echo $row['title'];?></h1>
                                <p class="item-description"><?php echo $row['description'];?></p>
                                <h2><?php echo $row['status']; ?></h2>
                            </li>
                        <?php
                    }
                }
            ?>
        </ul>
    </div>
</body>
</html>