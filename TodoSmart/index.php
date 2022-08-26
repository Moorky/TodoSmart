<?php
require __DIR__ . '/src/bootstrap.php';
?>

<?php view('header', ['title' => 'Welcome to TodoSmart!']) ?>

    <div class="content">
        <h2>Todos?</h2>
        <h3>Never been easier!</h3>
        <p>Insert text from Laptop here.</p>
        <a href="auth/register">Register</a>
        <a href="auth/login">Login</a>
    </div>

<?php view('footer') ?>