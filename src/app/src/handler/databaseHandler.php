<?php

require_once __DIR__ . '/../../../src/bootstrap.php';

function fetchAllTodos($sortKey): array
{
    $sql = "SELECT *
            FROM todos
            ORDER BY $sortKey";

    $statement = db()->prepare($sql);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function todoDBHandler($values, $key)
{
    switch ($key) {
        case "add":
            if (array_key_exists("id", $values)) {
                array_shift($values);
            }
            $sql = "INSERT INTO todos 
                    (title, description, status, assignedTo, createdBy, dateCreated, dateUpdated, category)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            break;
        case "edit":
            $id = array_shift($values);
            $values[] = $id;
            $sql = "UPDATE todos 
                    SET title = ?, description = ?, status = ?, assignedTo = ?, dateUpdated = ?, category = ?
                    WHERE id = ?";
            break;
        case "delete":
            $sql = "DELETE FROM todos WHERE id = ?";
            break;
        default:
            $sql = null;
    }
    $statement = db()->prepare($sql);
    $statement->execute(array_values($values));

    if ($key === "add") {
        return db()->lastInsertId("todos");
    }
}

function fetchAllCategories(): array
{
    $sql = "SELECT categoryName FROM category";

    $statement = db()->prepare($sql);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function categoryDBHandler($categoryName, $key): void
{
    $sql = match ($key) {
        "add" => "INSERT INTO category (categoryName) VALUES (?)",
        "delete" => "DELETE FROM category WHERE categoryName = ?",
        default => null,
    };

    $statement = db()->prepare($sql);
    $statement->execute([$categoryName]);
}

function fetchAllTodosByCategory($sortKey, $categoryName): array
{
    $sql = "SELECT *
            FROM todos
            WHERE category = :categoryName
            ORDER BY $sortKey";

    $statement = db()->prepare($sql);
    $statement->bindValue(":categoryName", $categoryName);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function fetchTodoById($id): array
{
    $sql = "SELECT *
            FROM todos
            WHERE id = :id";

    $statement = db()->prepare($sql);
    $statement->bindValue(":id", $id);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}