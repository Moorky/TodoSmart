<?php

$inputs = [];
$errors = [];

if (is_post_request() && isset($_POST['filterSubmit'])) {
    $fields = [];
    $messages = [];

    [$inputs, $errors] = filter($_POST, $fields, $messages);

    $_SESSION["sortKey"] = $inputs["sort"];
    $_SESSION["categoryName"] = $inputs["category"];

    global $controller;

    redirect_to('todosmart.php');

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');
}