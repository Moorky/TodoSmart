<?php

require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../src/todosmart.php';

require_login();
?>

<?php view('header', ['title' => 'App - TodoSmart']) ?>

    </section>

    <header>
        <div class="content welcomeUser">
            <p>
                Welcome <?= current_user() ?><br>
                <button onclick="location.href = '../../app/public/logout.php'">Logout</button>
            </p>
        </div>
    </header>

    <div class="todoFrame">
        <div class="menu">
            <div>
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
                            <option value="none">None</option>
                        </select>
                    </li>
                    <li>
                        <!-- APPLY -->
                    </li>
            </div>
            <div>
                <ul>
                    <li>
                        <!-- CREATE CATEGORY -->
                    </li>
                    <li>
                        <!-- CREATE TODO -->
                    </li>
                </ul>
            </div>
        </div>

        <div class="todos">
            <ul>

            </ul>
        </div>
    </div>

<?php view('footer') ?>