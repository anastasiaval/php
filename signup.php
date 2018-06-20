<?php
include_once 'header.php';
?>

    <section class="main-container">
        <div class="main-wrapper">
            <h2>Регистрация</h2>
            <form class="signup-form" action="includes/signup.inc.php" method="post">
                <input type="text" name="first" placeholder="Имя">
                <input type="text" name="last" placeholder="Фамилия">
                <input type="text" name="email" placeholder="E-mail">
                <input type="text" name="username" placeholder="Логин">
                <input type="password" name="pwd" placeholder="Пароль">
                <button type="submit" name="submit">Зарегистрироваться</button>
            </form>
        </div>
    </section>

<?php
include_once 'footer.php';
?>