<?php

$errors = [];
$inputs = [];

if (is_post_request() && isset($_POST['categoryCreateSubmit'])) {

    $fields = [
        'category' => 'string|required|between:1,25|unique:category,categoryName',
    ];

    $messages = [];

    [$inputs, $errors] = filter($_POST, $fields, $messages);

    if ($errors) {
        redirect_with('todosmart.php', [
            'inputs' => $inputs,
            'errors' => $errors
        ]);
    }

    global $controller;

    $controller->createCategory($inputs['category']);
    redirect_with_message(
        'todosmart.php',
        'Your category has been created successfully.'
    );

} else if (is_post_request() && isset($_POST['categoryDeleteSubmit'])) {

    $fields = [];
    $messages = [];

    [$inputs, $errors] = filter($_POST, $fields, $messages);

    if ($errors) {
        redirect_with('todosmart.php', [
            'inputs' => $inputs,
            'errors' => $errors
        ]);
    }

    global $controller;

    $controller->deleteCategory($inputs['category']);
    redirect_with_message(
        'todosmart.php',
        'Your category has been deleted successfully.'
    );

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');
}