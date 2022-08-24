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

    function saveAllTodosToDB()
    {
        saveAllTodos($this->todoList->getAllTodos());
    }

    function createCategory($category)
    {

    }
}