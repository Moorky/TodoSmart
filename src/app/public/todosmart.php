<?php

require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../src/todosmart.php';

require_login();
?>

<?php view('header', ['title' => 'App - TodoSmart']) ?>
    <link rel="stylesheet" href="../stylesheets/style.css">

    <div class="todoFrame">
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
                            <button type="submit">Apply</button>
                        </li>
                    </ul>
                </form>
            </div>
            <div>
                <ul>
                    <li>
                        <!-- Trigger/Open The Modal -->
                        <button id="myBtn">Create Category</button>
                    </li>
                    <li>
                        <!-- CREATE TODO -->
                    </li>
                </ul>
            </div>
        </div>

        <div class="todos">
            <ul id="todos">
                <?php createTodoElements(); ?>
            </ul>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Modal Header</h2>
            </div>
            <div class="modal-body">
                <p>Some text in the Modal Body</p>
                <p>Some other text...</p>
            </div>
            <div class="modal-footer">
                <h3>Modal Footer</h3>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="modal.js"></script>

<?php view('footer') ?>