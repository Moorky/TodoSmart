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

    function fetchAllTodosFromDB()
    {
        $this->todoList->setTodos(fetchAllTodos());
    }

    function saveAllTodosToDB()
    {
        saveAllTodos($this->todoList->getAllTodos());
    }

    function createCategory($category)
    {

    }
}