<?php

$errors = [];
$inputs = [];

$fields = [
    'title' => 'string|required|between:3,200',
    'description' => 'string|required|between:0,2000',
    'status' => 'string|required',
    'assignedTo' => 'string|required',
    'category' => 'string|required'
];
$messages = [];

if (is_post_request() && isset($_POST['createTodoSubmit'])) {

    [$inputs, $errors] = filter($_POST, $fields, $messages);

    if ($errors) {
        redirect_with('todosmart.php', [
            'inputs' => $inputs,
            'errors' => $errors
        ]);
    }

    global $controller;

    $controller->createTodo(["title" => $inputs['title'], "description" => $inputs['description'],
        "status" => $inputs['status'], "assignedTo" => $inputs['assignedTo'], "createdBy" => current_user(),
        "dateCreated" => date("Y-m-d"), "dateUpdated" => date("Y-m-d"), "category" => $inputs['category']]);
    redirect_with_message(
        'todosmart.php',
        'Your todo has been created successfully.'
    );

} else if (is_post_request() && isset($_POST['editTodoSubmit'])) {

    [$inputs, $errors] = filter($_POST, $fields, $messages);

    if ($errors) {
        redirect_with('todosmart.php', [
            'inputs' => $inputs,
            'errors' => $errors
        ]);
    }

    global $controller;

    $controller->editTodo(["id" => $_POST["id"], "title" => $inputs['title'],
        "description" => $inputs['description'], "status" => $inputs['status'], "assignedTo" => $inputs['assignedTo'],
        "dateUpdated" => date("Y-m-d"), "category" => $inputs['category']]);
    redirect_with_message(
        'todosmart.php',
        'Your todo has been edited successfully.'
    );

} else if (is_post_request() && isset($_POST['deleteTodoSubmit'])) {

    $fields = [];

    [$inputs, $errors] = filter($_POST, $fields, $messages);

    global $controller;

    $controller->deleteTodo($inputs['deleteTodoSubmit']);
    redirect_with_message(
        'todosmart.php',
        'Your todo has been deleted successfully.'
    );

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');
}