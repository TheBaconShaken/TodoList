<?php 
    include_once 'includes/function/db.php';

    $query = "SELECT * FROM todos;";
    $statement = $conn->prepare($query);
    $statement->execute();

    $todos = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'includes/header.php'; ?>
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
            <table class="table" id="list-table">
                <tr>
                    <th>Status</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                <?php foreach($todos as $todo):?>
                <tr scope="col">
                    <td><input type="checkbox" name="status" id="<?= $todo['id'];?>"></td>
                    <td><?= $todo['title']; ?></td>
                    <td><?= $todo['description']; ?></td>
                    <td>
                        <!-- Completed Status -->
                        <a href="includes/function/edit.php?id=<?= $todo['id']; ?>"
                            class="btn btn-outline-primary">
                            Edit
                        </a>
                        <!-- Delete Button -->
                        <a href="includes/function/delete.php?id=<?= $todo['id']; ?>"
                            class="ml-6 btn btn-outline-danger">
                            Delete
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>