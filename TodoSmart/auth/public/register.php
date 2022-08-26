<?php

require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../src/register.php';

if (is_user_logged_in()) {
    redirect_to('../../app/todosmart.php');
}
?>

<?php view('header', ['title' => 'Register - TodoSmart']) ?>

<div class="content">
    <form action="register.php" method="post">
        <h3>Register</h3>

        <div>
            <p>
                <label for="username">Username:</label><br>
                <input type="text" name="username" id="username" value="<?= $inputs['username'] ?? '' ?>"
                       class="<?= error_class($errors, 'username') ?>">
                <small><?= $errors['username'] ?? '' ?></small>
            </p>
        </div>

        <div>
            <p>
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" value="<?= $inputs['password'] ?? '' ?>"
                       class="<?= error_class($errors, 'password') ?>">
                <small><?= $errors['password'] ?? '' ?></small>
            </p>
        </div>

        <div>
            <p>
                <label for="password2">Password Again:</label><br>
                <input type="password" name="password2" id="password2" value="<?= $inputs['password2'] ?? '' ?>"
                       class="<?= error_class($errors, 'password2') ?>">
                <small><?= $errors['password2'] ?? '' ?></small>
            </p>
        </div>

        <button type="submit">Submit</button>

        <footer><p>Already a member? <a href="login">Login here</a></p></footer>

    </form>
</div>

<?php view('footer') ?>
