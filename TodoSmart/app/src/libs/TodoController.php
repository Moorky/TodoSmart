<?php

require_once '../databaseHandler.php';
require_once 'TodoList.php';

class TodoController
{
    private object $todoList;

    function __construct()
    {
        $this->todoList = new TodoList();
    }

    function fetchAllTodosFromDB($sortKey)
    {
        $this->todoList->setTodos(fetchAllTodos($sortKey));
    }

    function createCategory($category)
    {

    }

    function createTodo()
    {

    }

    private function getTodoValuesAsArray($todo): array
    {
        return array("id" => $todo->getId(), "title" => $todo->getTitle(), "description" => $todo->getDescription(),
            "status" => $todo->getStatus(), "assignedTo" => $todo->getAssignedTo(),
            "createdBy" => $todo->getCreatedBy(), "dateCreated" => $todo->getDateCreated(),
            "dateUpdated" => $todo->getDateUpdated(), "category" => $todo->getCategory());
    }

    function getTodosByCategory($category): array
    {
        $todos = [];

        foreach ($this->todoList->getAllTodos() as $todo) {
            if ($todo->getCategory() === $category) {
                $todos[] = $todo;
            }
        }

        return $todos;
    }
}