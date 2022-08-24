<?php

require_once __DIR__ . '/../../../src/bootstrap.php';

function fetchAllTodos($sortKey): array
{
    $sql = 'SELECT title, description, status, assignedTo, createdBy, dateCreated, dateUpdated, category
            FROM todos
            ORDER BY :sortKey';

    $statement = db()->prepare($sql);
    $statement->bindValue(':sortType', $sortKey, PDO::PARAM_STR);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function saveTodoToDB($todo)
{

}

function editTodoInDB($todo)
{
    // check if todo exists, if yes then edit it
}

function deleteTodoInDB($todo)
{
    // check if todo exists, if yes then delete it
}

function checkIfTodoExists($todo)
{

}