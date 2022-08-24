<?php

require_once __DIR__ . '/../bootstrap.php';

function fetchAllTodos($sortKey): array
{
    $sortType = "Id";

    if (!isset($sortKey)) {
        $sortType = $sortKey;
    }

    $sql = "SELECT title, description, status, assignedTo, createdBy, dateCreated, dateUpdated, category
            FROM todos
            ORDER BY $sortType";

    $statement = db()->prepare($sql);
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);

    return $todos;
}

function saveAllTodos($todoList)
{

}