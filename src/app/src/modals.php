<!-- Create Category Modal -->
<div id="createCategory" class="modal">
    <form action="todosmart.php" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Create Category</h2>
            </div>
            <div class="modal-body">
                <p>
                    <label for="category">New Category:</label><br>
                    <input type="text" name="category" id="category" value="<?= $inputs['category'] ?? '' ?>"
                           class="<?= error_class($errors, 'category') ?>">
                    <small><?= $errors['category'] ?? '' ?></small>
                </p>
            </div>
            <br>
            <div class="modal-footer">
                <button type="submit" name="categorySubmit" id="categorySubmit">Submit</button>
            </div>
        </div>
    </form>
</div>

<!-- Create To-Do Modal -->
<div id="createTodo" class="modal">
    <form action="todosmart.php" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Create Todo</h2>
            </div>
            <div class="modal-body">
                <p>
                    <label for="createTodoTitle">Title:</label><br>
                    <input type="text" name="title" id="createTodoTitle" value="<?= $inputs['title'] ?? '' ?>"
                           class="<?= error_class($errors, 'title') ?>">
                    <small><?= $errors['title'] ?? '' ?></small>
                </p>
                <p>
                    <label for="createTodoDescription">Description:</label><br>
                    <input type="text" name="description" id="createTodoDescription"
                           value="<?= $inputs['description'] ?? '' ?>" autocomplete="off"
                           class="<?= error_class($errors, 'description') ?>">
                    <small><?= $errors['description'] ?? '' ?></small>
                </p>
                <p>
                    <label for="createTodoStatus">Status:</label>
                    <select name="status" id="createTodoStatus">
                        <option value="Open">Open</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Done">Done</option>
                    </select>
                </p>
                <p>
                    <label for="createTodoAssignedTo">Assigned To:</label>
                    <select name="assignedTo" id="createTodoAssignedTo">
                        <?php createUserElements() ?>
                    </select>
                </p>
                <p>
                    <label for="createTodoCategory">Category:</label>
                    <select name="category" id="createTodoCategory">
                        <?php createCategoryElements(); ?>
                    </select>
                </p>
            </div>
            <br>
            <div class="modal-footer">
                <button type="submit" name="createTodoSubmit" id="createTodoSubmit">Submit</button>
            </div>
        </div>
    </form>
</div>