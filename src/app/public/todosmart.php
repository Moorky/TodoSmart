<?php

require_once __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/../src/todosmart.php';
require_once __DIR__ . '/../src/handler/categoryPostHandler.php';
require_once __DIR__ . '/../src/handler/todoPostHandler.php';
require_once __DIR__ . '/../src/handler/filterPostHandler.php';

require_login();

prepareController();
?>

<?php view('header', ['title' => 'App - TodoSmart']) ?>
    <link rel="stylesheet" href="../../style/app/style.css">

    <div class="todoFrame">

        <!-- Menu -->
        <?php include_once __DIR__ . '/../src/inc/todoMenu.php'; ?>

        <br>

        <!-- To-Do List -->
        <div class="todos">
            <ul id="todos">
                <?php createTodoElements(); ?>
            </ul>
        </div>
    </div>


    <!-- Modals -->
    <?php include_once __DIR__ . '/../src/inc/modalElements.php'; ?>
    <script type="text/javascript" src="javascript/modal.js"></script>

<?php view('footer') ?>