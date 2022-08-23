<?php

require_once 'Todo.php';

class TodoList
{
    private array $todos;

    function __construct()
    {
        $this->todos = [];
    }

    function getAllTodos(): array
    {
        return $this->todos;
    }

    function setTodos($todos)
    {
        // Write code in a way that takes the parameter and creates a new Todo Instance for each entry
        $this->todos = $todos;
    }

    function addTodo($title, $description, $status, $assignedTo, $createdBy,
                     $dateCreated, $dateUpdated, $category)
    {
        $this->todos[] = new Todo($title, $description, $status, $assignedTo, $createdBy,
            $dateCreated, $dateUpdated, $category);
    }

    function getTodosByCategory($category)
    {

    }

    function sortTodosBy($param)
    {

    }
}