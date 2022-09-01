<?php

$inputs = [];
$errors = [];

if (is_post_request() && isset($_POST['todoDelete'])) {
    $fields = [];
    $messages = [];

    [$inputs, $errors] = filter($_POST, $fields, $messages);


    global $controller;

    $controller->deleteTodo($inputs['todoDelete']);
    redirect_with_message(
        'todosmart.php',
        'Your todo has been deleted successfully.'
    );

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');
}