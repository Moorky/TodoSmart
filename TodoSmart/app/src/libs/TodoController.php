<?php

require_once 'databaseHandler.php';
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
        return array($todo->getId(), $todo->getTitle(), $todo->getDescription(), $todo->getStatus(),
            $todo->getAssignedTo(), $todo->getCreatedBy(), $todo->getDateCreated(),
            $todo->getDateUpdated(), $todo->getCategory());
    }
}