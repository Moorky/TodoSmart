<?php

require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../src/todosmart.php';

require_login();
?>

<?php view('header', ['title' => 'App - TodoSmart']) ?>

    <header>
        <div class="content welcomeUser">
            <p>
                Welcome <?= current_user() ?><br>
                <button onclick="location.href = '../../app/public/logout.php'">Logout</button>
            </p>
        </div>
    </header>

    <div class="content">

        AAAAaaaa
    </div>

<?php view('footer') ?>