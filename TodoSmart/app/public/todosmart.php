<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/todosmart.php';

require_login();
?>

<?php view('header', ['title' => 'Todo App']) ?>

<!-- HTML CODE -->

<?php view('footer') ?>