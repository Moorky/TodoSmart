<?php

require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../src/login.php';

if (is_user_logged_in()) {
    redirect_to('../../app/todosmart.php');
}
?>

<?php view('header', ['title' => 'Login - TodoSmart']) ?>

<?php if (isset($errors['login'])) : ?>
    <div class="alert alert-error">
        <?= $errors['login'] ?>
    </div>
<?php endif ?>

    <div class="content">
        <form action="login.php" method="post">
            <h3>Login</h3>
            <div>
                <p>
                    <label for="username">Username:</label><br>
                    <input type="text" name="username" id="username" value="<?= $inputs['username'] ?? '' ?>">
                    <small><?= $errors['username'] ?? '' ?></small>
                </p>
            </div>
            <div>
                <p>
                    <label for="password">Password:</label><br>
                    <input type="password" name="password" id="password">
                    <small><?= $errors['password'] ?? '' ?></small>
                </p>
            </div>
            <section>
                <button type="submit">Submit</button>
            </section>
            <footer><p>No account yet? <a href="register">Register</a></p></footer>
        </form>
    </div>

<?php view('footer') ?>