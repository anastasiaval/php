<?php

session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <nav>
        <div class="main-wrapper">
            <div class="login">
                <?php
                    if (isset($_SESSION['u_id'])) {
                        echo '<form action="includes/logout.inc.php" method="POST">
                              <button type="submit" name="submit">Выход</button>
                              </form>';
                    } else {
                        echo '<form action="includes/login.inc.php" method="POST">
                              <input type="text" name="username" placeholder="Логин / e-mail">
                              <input type="password" name="pwd" placeholder="Пароль">
                              <button type="submit" name="submit">Вход</button>
                              </form>
                              <a href="signup.php">Регистрация</a>';
                    }

                ?>


            </div>
        </div>
    </nav>
</header>