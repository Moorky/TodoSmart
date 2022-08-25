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

    function clearAllTodos()
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

    function editTodo(int $id, $title, $description, $status, $assignedTo, $dateUpdated, $category): Todo
    {
        $editedTodo = null;

        foreach ($this->todos as $todo) {
            if ($todo === $id) {
                $todo->setTitle($title);
                $todo->setDescription($description);
                $todo->setStatus($status);
                $todo->setAssignedTo($assignedTo);
                $todo->setDateUpdated($dateUpdated);
                $todo->setCategory($category);
                $editedTodo = $todo;
            }
        }

        return $editedTodo;
    }

    function deleteTodo(int $id)
    {
        foreach ($this->todos as $todoKey => $todo) {
            if ($todo->getId() === $id) {
                unset($this->todos[$todoKey]);
            }
        }
    }
}