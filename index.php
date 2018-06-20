<?php
    include_once 'header.php';
?>

<section class="main-container">
    <div class="main-wrapper">
        <h2>Главная страница</h2>
        <?php
            if (isset($_SESSION['u_id'])) {
                $user = $_SESSION['u_name'];
                echo "Добро пожаловать, $user! Авторизация прошла успешно!";
            }
        ?>
    </div>
</section>

<?php
include_once 'footer.php';
?>