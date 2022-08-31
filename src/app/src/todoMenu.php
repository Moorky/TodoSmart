<div class="menu">
    <div>
        <form action="todosmart.php" method="post">
            <ul>
                <li>
                    <label for="sort">Sort by:</label>
                    <select name="sort" id="sort">
                        <option value="title">Title</option>
                        <option value="status">Status</option>
                        <option value="assignedTo">Assigned To</option>
                        <option value="createdBy">Created By</option>
                        <option value="dateCreated">Date Created</option>
                        <option value="dateUpdated">Date Updated</option>
                        <option value="category">Category</option>
                    </select>
                </li>
                <li>
                    <label for="category">Select category:</label>
                    <select name="category" id="category">
                        <?php createCategoryElements(); ?>
                    </select>
                </li>
                <li>
                    <button type="submit" name="filterSubmit" id="filterSubmit">Apply</button>
                </li>
            </ul>
        </form>
    </div>
    <div>
        <ul>
            <li>
                <button id="createCategoryBtn">Create Category</button>
            </li>
            <li>
                <button id="createTodoBtn">Create Todo</button>
            </li>
        </ul>
    </div>
</div>