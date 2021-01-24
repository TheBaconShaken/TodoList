<?php 
    include_once 'includes/db.php';

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
<body>
    <!-- Todo List -->
    <div id="todolist-wrapper" class="bh-white">
        <div id="todolist-header" class="bg-gray-50 pl-4 pb-4 pt-8 border-4 border-gray-100">
            <h1 id="todolist-heading" class="text-5xl font-bold">Simple Todo List</h1>
            <div id="todolist-add">
                <?php if(!empty($handle)):?>
                    <div class="mt-4 alert 
                        <?php   if($handle[1] == 0){
                                    echo 'alert-success';
                                }elseif($handle[1] == 1){
                                    echo 'alert-danger';
                                } 
                        ?>" role="alert">
                        <?php echo $handle[0]; ?>
                    </div>
                <?php endif; ?>
                <form id="add-form" method="post">
                    <div class="form-input flex flex-col">
                        <label for="title" class="text-2xl">Title</label>
                        <input type="text" name="title" id="input-title" class="form-title form-control">
                    </div>
                    <div class="form-input flex flex-col">
                        <label for="description" class="text-2xl">Description</label>
                        <input type="text" name="description" id="input-desc" class="form-desc form-control">
                    </div>
                    <div class="form-input pt-4">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="todolist-list" class="flex flex-col space-y-8 bg-gray-100 pl-6 pr-6 pt-6 pb-6">

        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>