<?php

function register_user(string $username, string $password, bool $isAdmin = false): bool
{
    $sql = 'INSERT INTO users(username, password, isAdmin) VALUES(:username, :password, :isAdmin)';

    $statement = db()->prepare($sql);

    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT), PDO::PARAM_STR);
    $statement->bindValue(':isAdmin', (int)$isAdmin, PDO::PARAM_INT);


    return $statement->execute();
}

function find_user_by_username(string $username)
{
    $sql = 'SELECT id, username, password, isAdmin
            FROM users
            WHERE username=:username';

    $statement = db()->prepare($sql);
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function login(string $username, string $password): bool
{
    $user = find_user_by_username($username);

    // if user found, check the password
    if ($user && password_verify($password, $user['password'])) {

        // prevent session fixation attack
        session_regenerate_id();

        // set username in the session
        $_SESSION['username'] = $user['username'];
        $_SESSION['userId'] = $user['id'];
        $_SESSION['isAdmin'] = $user['isAdmin'];


        return true;
    }

    return false;
}

function is_user_logged_in(): bool
{
    return isset($_SESSION['username']);
}

function require_login(): void
{
    if (!is_user_logged_in()) {
        redirect_to('/auth/public/login.php');
    }
}

function logout(): void
{
    if (is_user_logged_in()) {
        unset($_SESSION['username'], $_SESSION['user_id']);
        session_destroy();
        redirect_to('/');
    }
}

function current_user()
{
    if (is_user_logged_in()) {
        return $_SESSION['username'];
    }
    return null;
}

function getAllUsernames(): bool|array
{
    $sql = 'SELECT username
            FROM users';

    $statement = db()->prepare($sql);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}