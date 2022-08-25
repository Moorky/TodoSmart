<?php

require_once __DIR__ . '/../../../src/bootstrap.php';

function fetchAllTodos($sortKey): array
{
    $sql = "SELECT title, description, status, assignedTo, createdBy, dateCreated, dateUpdated, category
            FROM todos
            ORDER BY :sortKey";

    $statement = db()->prepare($sql);
    $statement->bindValue(':sortType', $sortKey, PDO::PARAM_STR);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function todoDBHandler($values, $handler)
{
    switch ($handler) {
        case "add":
            array_shift($values);
            $sql = "INSERT INTO todos 
                    (title, description, status, assignedTo, createdBy, dateCreated, dateUpdated, category)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            break;
        case "edit":
            $values[] = array_shift($values);
            $sql = "UPDATE todos 
                    SET title = ?, description = ?, status = ?, assignedTo = ?, createdBy = ?,
                        dateCreated = ?, dateUpdated = ?, category = ?
                    WHERE id = ?";
            break;
        case "delete":
            $sql = "DELETE FROM todos WHERE id = ?";
            break;
        default:
            $sql = null;
    }

    $statement = db()->prepare($sql);
    $statement->execute($values);
}

function fetchAllCategories(): array
{
    $sql = "SELECT categoryName FROM category";

    $statement = db()->prepare($sql);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function categoryDBHandler($categoryName, $handler)
{
    switch ($handler) {
        case "add":
            $sql = "INSERT INTO category (categoryName) VALUES (?)";
            break;
        case "delete":
            $sql = "DELETE FROM category WHERE categoryName = ?";
            break;
        default:
            $sql = null;
    }

    $statement = db()->prepare($sql);
    $statement->execute($categoryName);
}