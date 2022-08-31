<?php

require_once __DIR__ . '/../databaseHandler.php';
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

    function fetchAllElementsFromDB($sortKey)
    {
        $this->fetchAllCategoriesFromDB();
        $this->fetchAllTodosFromDB($sortKey);
    }

    private function fetchAllCategoriesFromDB()
    {
        $this->categoryList = fetchAllCategories();
    }

    function createCategory($categoryName)
    {
        $this->categoryList[] = $categoryName;
        categoryDBHandler($categoryName, "add");
    }

    function deleteCategory($categoryName)
    {
        if (($key = array_search($categoryName, $this->categoryList)) !== false) {
            unset($this->categoryList[$key]);
            categoryDBHandler($categoryName, "delete");
        }
    }

    private function fetchAllTodosFromDB($sortKey)
    {
        $todos = fetchAllTodos($sortKey);
        $this->todoList->clearAllTodos();

        foreach ($todos as $todo) {
            $this->todoList->addTodo($todo["id"], $todo["title"], $todo["description"], $todo["status"],
                $todo["assignedTo"], $todo["createdBy"], $todo["dateCreated"], $todo["dateUpdated"], $todo["category"]);
        }
    }

    function createTodo($values)
    {
        $todoId = todoDBHandler($values, "add");
        $this->todoList->addTodo($todoId, $values["title"], $values["description"], $values["status"],
            $values["assignedTo"], $values["createdBy"], $values["dateCreated"],
            $values["dateUpdated"], $values["category"]);
    }

    function editTodo($values)
    {
        todoDBHandler($values, "edit");
        $this->todoList->editTodo($values["id"], $values["title"], $values["description"], $values["status"],
            $values["assignedTo"], $values["dateUpdated"], $values["category"]);
    }

    function deleteTodo($id)
    {
        todoDBHandler($id, "delete");
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