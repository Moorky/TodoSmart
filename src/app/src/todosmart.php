<?php

require_once __DIR__ . '/databaseHandler.php';
require_once 'libs/TodoController.php';

$controller = new TodoController();
prepareController();

function prepareController()
{
    global $controller;
    $controller->fetchAllElementsFromDB("id");
}

function createTodoElements()
{
    global $controller;
    $todoList = $controller->getTodoList();

    foreach ($todoList->getAllTodos() as $todo) {
        $title = $todo->getTitle();
        $description = $todo->getDescription();
        $status = $todo->getStatus();
        $assignedTo = $todo->getAssignedTo();
        $createdBy = $todo->getCreatedBy();
        $dateCreated = $todo->getDateCreated();
        $dateUpdated = $todo->getDateUpdated();
        $category = $todo->getCategory();

        echo "<li>
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

function createCategoryElements()
{
    global $controller;
    $categoryList = $controller->getCategoryList();

    echo "<option value='none'>None</option>";

    foreach ($categoryList as $category) {
        $categoryName = $category["categoryName"];
        echo "<option value='$categoryName'>$categoryName</option>";
    }
}