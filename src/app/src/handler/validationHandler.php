<?php

require_once __DIR__ . '/databaseHandler.php';

function validateUser($id): bool
{
    return isUserCreator($id) || isUserAdmin();
}

function isUserCreator($id): bool
{
    if (fetchTodoById($id)["createdBy"] === $_SESSION["username"]) {
        return true;
    }

    return false;
}

function isUserAdmin(): bool
{
    if ($_SESSION["isAdmin"] === 1) {
        return true;
    }

    return false;
}