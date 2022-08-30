<?php
require __DIR__ . '/src/bootstrap.php';
?>

<?php view('header', ['title' => 'Welcome to TodoSmart!']) ?>

    <div class="content">
        <h2>Todos?</h2>
        <h3>Never been easier!</h3>
        <p>Tired of losing track of what your todos are?<br>
            Searching for a way to share your todos?<br>
            Join the experience. Join TodoSmart!</p>
        <a href="/auth/public/register.php">Register</a>
        <a href="/auth/public/login.php">Login</a>
    </div>

<?php view('footer') ?>