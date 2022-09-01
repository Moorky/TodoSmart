<?php

$errors = [];
$inputs = [];

if (is_post_request() && isset($_POST['createTodoSubmit'])) {

    $fields = [
        'title' => 'string|required|between:3,200',
        'description' => 'string|required|between:10,2000',
        'status' => 'string|required',
        'assignedTo' => 'string|required',
        'category' => 'string|required'
    ];

    // custom messages
    $messages = [];

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

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');
}