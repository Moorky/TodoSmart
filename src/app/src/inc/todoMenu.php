<div class="menu">
    <div>
        <form action="todosmart.php" method="post">
            <ul>
                <li>
                    <label for="sort">Sort by:</label>
                    <select name="sort" id="sort">
                        <?php createSortByElements() ?>
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
                <li>
                    <button type="submit" name="filterResetSubmit" id="filterResetSubmit">Reset</button>
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
                <button id="deleteCategoryBtn">Delete Category</button>
            </li>
            <li>
                <button id="createTodoBtn">Create Todo</button>
            </li>
        </ul>
    </div>
</div>