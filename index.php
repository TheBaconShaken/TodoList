<?php include_once 'includes/db.php';?>

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

</head>
<body>
    <!-- Todo List -->
    <div id="todolist-wrapper" class="bh-white">
        <div id="todolist-header" class="bg-gray-50 pl-4 pb-4 pt-8 border-4 border-gray-100">
            <h1 id="todolist-heading" class="text-5xl font-bold">Simple Todo List</h1>
            <!-- Add New Todo Item (Later Date) -->
        </div>
        <div id="todolist-list" class="flex flex-col space-y-8 bg-gray-100 pl-6 pr-6 pt-6 pb-6">
        <?php
                $query = "SELECT * FROM todos;";
                $result = mysqli_query($conn, $query);
                $resultcheck = mysqli_num_rows($result);
                $marked = false;
                
                if($resultcheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                            <div id="list-item" class="flex flex-row space-x-2 shadow-lg">
                                <div id="item-check">
                                    <span class="fa fa-check-circle"></span>
                                </div>
                                <div id="item-text" class="flex flex-col">
                                    <div id="text-head" class="text-4xl font-semibold">
                                        <h1 id="head-title"><?php echo $row['title'];?></h1>
                                    </div>
                                    <div id="text-content">
                                        <p id="content-description"><?php echo $row['description'];?></p>
                                    </div>
                                </div>
                                <div id="item-delete">
                                    <span class="fa fa-times-circle"></span>
                                </div>
                            </div>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>