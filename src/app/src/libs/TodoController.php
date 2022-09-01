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
        $this->fetchAllTodosHandler(fetchAllTodosByCategory($sortKey, $categoryName));

    }

    private function fetchAllTodosFromDB($sortKey): void
    {
        $this->fetchAllTodosHandler(fetchAllTodos($sortKey));
    }

    private function fetchAllTodosHandler($todos): void
    {
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
        categoryDBHandler($categoryName, "add");
    }

    function deleteCategory($categoryName): void
    {
        categoryDBHandler($categoryName, "delete");
    }

    function createTodo($values): void
    {
        todoDBHandler($values, "add");
    }

    function editTodo($values): void
    {
        todoDBHandler($values, "edit");
    }

    function deleteTodo($id): void
    {
        todoDBHandler([$id], "delete");
    }
}