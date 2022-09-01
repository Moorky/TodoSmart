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

    function clearAllTodos(): void
    {
        $this->todos = [];
    }

    function addTodo($id, $title, $description, $status, $assignedTo, $createdBy,
                     $dateCreated, $dateUpdated, $category): Todo
    {
        $todo = new Todo($id, $title, $description, $status, $assignedTo, $createdBy,
            $dateCreated, $dateUpdated, $category);
        $this->todos[] = $todo;
        return $todo;
    }
}