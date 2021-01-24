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
    <div id="todolist-wrapper" class="bg-white">
        <div id="todolist-header" class="bg-gray-50 pl-4 pb-4 pt-8 border-4 border-gray-100">
            <a href="index.php" class="no-underline text-gray-900 hover:text-gray-700"><h1 id="todolist-heading" class="text-5xl font-bold">Simple Todo List</h1></a>
            <div id="todolist-add">
                <!-- Edit Query -->
                <?php if(isset($_GET['edit'])):?>
                    <div class="mt-4 alert alert-<?php echo $_GET['edit'];?>" role="alert">
                        <?php if($_GET['edit'] == 'success'): ?>
                            Successfully edited!
                        <?php elseif($_GET['edit'] == 'danger'): ?>
                            Error editing the todo..
                        <?php endif; ?>
                    </div>
                <?php endif;?>
                <!-- Add Query -->
                <?php if(isset($_GET['handle'])):?>
                    <div class="mt-4 alert alert-<?php echo $_GET['handle'];?>" role="alert">
                        <?php if($_GET['handle'] == 'success'): ?>
                            Successfully added todo to the list!
                        <?php elseif($_GET['handle'] == 'danger'): ?>
                            Error adding the todo to the list..
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <form id="add-form" method="post" autocomplete="off">
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
                <?php if($todo['status'] == 1): ?>
                <tr scope="col" class="line-through">
                    <td>
                        <input type="checkbox" 
                                name="status" 
                                id="<?= $todo['id'];?>" 
                                class="input-checkbox"
                                todo-id="<?= $todo['id'];?>"
                                checked>
                    </td>
                <?php elseif($todo['status'] == 0): ?>
                <tr scope="col">
                    <td>
                        <input type="checkbox" 
                                name="status" 
                                id="<?= $todo['id'];?>" 
                                class="input-checkbox"
                                todo-id="<?= $todo['id'];?>">
                    </td>
                <?php endif; ?>
                    
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
    <!-- Custom Inline Script -->
    <script>
        var $ = jQuery;

        $('.input-checkbox').on('change', function(e){
            const id = $(this).attr('todo-id');
            $.post('includes/function/check.php',
                {
                    id: id
                },
                (data) => {
                    if(data != 'error'){
                        const title = $(this).parent().next();
                        const desc = title.next();
                        if(data === '1'){
                            title.addClass('line-through');
                            desc.addClass('line-trough');
                            location.reload();
                        }else if(data === '0'){
                            title.removeClass('line-through');
                            desc.removeClass('line-trough');
                            location.reload();
                        }
                    }
                }
            );
        });
    </script>
    <!-- Bootstrap 5.0 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>