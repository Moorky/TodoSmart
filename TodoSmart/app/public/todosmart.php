<?php

require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../src/todosmart.php';

require_login();
?>

<?php view('header', ['title' => 'Todo App']) ?>

    <div class="text">
        <p>Welcome <?= current_user() ?> <a href="../../app/public/logout.php">Logout</a></p>
    </div>

<?php view('footer') ?>