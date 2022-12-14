<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <title><?= $title ?? 'Home' ?></title>
</head>
<body>
<main>
    <?php flash() ?>
    <section class="showcase">
        <header>
            <a href="/" style="text-decoration: none"><h2 class="logo">TodoSmart</h2></a>

            <?php if (is_user_logged_in()): ?>
                <div class="content welcomeUser">
                    <p>
                        Welcome <?= current_user() ?><br>
                        <button onclick="location.href = '../../app/public/logout.php'">Logout</button>
                    </p>
                </div>
            <?php endif; ?>
        </header>
