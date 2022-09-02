<?php

require_once __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/handler/databaseHandler.php';
require_once __DIR__ . '/libs/TodoController.php';
require_once __DIR__ . '/inc/svgVariables.php';

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

        global $deleteButtonSVG;
        global $editButtonSVG;

        echo "<li>
                <form action='todosmart.php' method='post'>
                    <button type='submit' name='deleteTodoSubmit' value='$id'
                        style='float: right;padding: 0;width: 40px;height: 40px'>$deleteButtonSVG</button>
                </form>
                <button name='editTodoBtn' value='$id' 
                style='float: right;padding: 0;width: 40px;height: 40px'>$editButtonSVG</button>
                
                <h4 style='float: right;padding-right: 5px;text-align: right'>
                    <small>To $assignedTo | From $createdBy</small>
                    <br>
                    $status
                </h4>

                <h3>$title</h3>
                <p>$description</p>
                <small style='border: 10px white'><b>$category</b></small>
                
                <small style='float: right'>$dateCreated | $dateUpdated</small>
                
                <input type='hidden' id='$id,title' value='$title'>
                <input type='hidden' id='$id,description' value='$description'>
                <input type='hidden' id='$id,status' value='$status'>
                <input type='hidden' id='$id,assignedTo' value='$assignedTo'>
                <input type='hidden' id='$id,category' value='$category'>
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
        if (isset($_SESSION["categoryName"]) && $_SESSION["categoryName"] === $categoryName) {
            echo "<option value='$categoryName' selected>$categoryName</option>";
        } else {
            echo "<option value='$categoryName'>$categoryName</option>";
        }
    }
}

function createUserElements(): void
{
    foreach (getAllUsernames() as $user) {
        $username = $user["username"];
        echo "<option value='$username'>$username</option>";
    }
}

function createSortByElements(): void
{
    $sortByElements = [["dateUpdated", "Date Updated"], ["dateCreated", "Date Created"], ["title", "Title"],
        ["status", "Status"], ["assignedTo", "Assigned To"], ["createdBy", "Created By"], ["category", "Category"]];

    foreach ($sortByElements as $element) {
        if (isset($_SESSION["sortKey"]) && $_SESSION["sortKey"] === $element[0]) {
            echo "<option value='$element[0]' selected>$element[1]</option>";
        } else {
            echo "<option value='$element[0]'>$element[1]</option>";
        }
    }
}