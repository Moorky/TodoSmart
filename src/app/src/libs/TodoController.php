<?php

require_once __DIR__ . '/../handler/databaseHandler.php';
require_once 'TodoList.php';

class TodoController
{
    private object $todoList;
    private array $categoryList;

    function __construct()
    {
        $this->todoList = new TodoList();
        $this->categoryList = [];
    }

    function getTodoList(): object
    {
        return $this->todoList;
    }

    function getCategoryList(): array
    {
        return $this->categoryList;
    }

    function fetchAllElementsFromDB($sortKey): void
    {
        $this->fetchAllCategoriesFromDB();
        $this->fetchAllTodosFromDB($sortKey);
    }

    function fetchAllElementsFromDBByCategory($sortKey, $categoryName): void
    {
        $this->fetchAllCategoriesFromDB();
        $this->fetchAllTodosFromDBByCategory($sortKey, $categoryName);
    }

    private function fetchAllTodosFromDBByCategory($sortKey, $categoryName): void
    {
        $todos = fetchAllTodosByCategory($sortKey, $categoryName);
        $this->todoList->clearAllTodos();

        foreach ($todos as $todo) {
            $this->todoList->addTodo($todo["id"], $todo["title"], $todo["description"], $todo["status"],
                $todo["assignedTo"], $todo["createdBy"], $todo["dateCreated"], $todo["dateUpdated"], $todo["category"]);
        }
    }

    private function fetchAllCategoriesFromDB(): void
    {
        $this->categoryList = fetchAllCategories();
    }

    function createCategory($categoryName): void
    {
        $this->categoryList[] = $categoryName;
        categoryDBHandler($categoryName, "add");
    }

    function deleteCategory($categoryName): void
    {
        categoryDBHandler($categoryName, "delete");
    }

    private function fetchAllTodosFromDB($sortKey): void
    {
        $todos = fetchAllTodos($sortKey);
        $this->todoList->clearAllTodos();

        foreach ($todos as $todo) {
            $this->todoList->addTodo($todo["id"], $todo["title"], $todo["description"], $todo["status"],
                $todo["assignedTo"], $todo["createdBy"], $todo["dateCreated"], $todo["dateUpdated"], $todo["category"]);
        }
    }

    function createTodo($values): void
    {
        $todoId = todoDBHandler($values, "add");
        $this->todoList->addTodo($todoId, $values["title"], $values["description"], $values["status"],
            $values["assignedTo"], $values["createdBy"], $values["dateCreated"],
            $values["dateUpdated"], $values["category"]);
    }

    function editTodo($values): void
    {
        todoDBHandler($values, "edit");
        $this->todoList->editTodo($values["id"], $values["title"], $values["description"], $values["status"],
            $values["assignedTo"], $values["dateUpdated"], $values["category"]);
    }

    function deleteTodo($id): void
    {
        todoDBHandler([$id], "delete");
        $this->todoList->deleteTodo($id);
    }

    private function getTodoValuesAsArray($todo): array
    {
        return array("id" => $todo->getId(), "title" => $todo->getTitle(), "description" => $todo->getDescription(),
            "status" => $todo->getStatus(), "assignedTo" => $todo->getAssignedTo(),
            "createdBy" => $todo->getCreatedBy(), "dateCreated" => $todo->getDateCreated(),
            "dateUpdated" => $todo->getDateUpdated(), "category" => $todo->getCategory());
    }
}