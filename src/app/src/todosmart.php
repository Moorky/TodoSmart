<?php

require_once __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/handler/databaseHandler.php';
require_once __DIR__ . '/libs/TodoController.php';

$controller = new TodoController();

function prepareController(): void
{
    global $controller;

    if (isset($_SESSION["categoryName"]) && $_SESSION["categoryName"] !== "none") {
        $controller->fetchAllElementsFromDBByCategory($_SESSION["sortKey"] ?? "id", $_SESSION["categoryName"]);

    } else {
        $controller->fetchAllElementsFromDB($_SESSION["sortKey"] ?? "id");

    }
}

function createTodoElements(): void
{
    global $controller;
    $todoList = $controller->getTodoList();

    foreach ($todoList->getAllTodos() as $todo) {
        $id = $todo->getId();
        $title = $todo->getTitle();
        $description = $todo->getDescription();
        $status = $todo->getStatus();
        $assignedTo = $todo->getAssignedTo();
        $createdBy = $todo->getCreatedBy();
        $dateCreated = $todo->getDateCreated();
        $dateUpdated = $todo->getDateUpdated();
        $category = $todo->getCategory();

        echo "<li>
                <form action='todosmart.php' method='post'>
                    <button type='submit' name='todoDelete' id='todoDelete' value='$id'
                        style='float: right'>&times;</button>
                </form>
                <button style='float: right'>...</button>

                Title: $title <br>
                Description: $description <br>
                Status: $status <br>
                Assigned To: $assignedTo <br>
                Created By: $createdBy <br>
                Date Created: $dateCreated <br>
                Date Updated: $dateUpdated <br>
                Category: $category
            </li>";
    }
}

function createCategoryElements(): void
{
    global $controller;
    $categoryList = $controller->getCategoryList();

    echo "<option value='none'>None</option>";

    foreach ($categoryList as $category) {
        $categoryName = $category["categoryName"];
        echo "<option value='$categoryName'>$categoryName</option>";
    }
}

function createUserElements(): void
{
    foreach (getAllUsernames() as $user) {
        $username = $user["username"];
        echo "<option value='$username'>$username</option>";
    }
}