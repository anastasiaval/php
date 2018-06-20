<?php

if (isset($_POST['submit'])) {
    include_once 'config.php';

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    // Error handlers
    // Проверка все ли поля заполнены
    if (empty($first) || empty($last) || empty($email) || empty($username) || empty($pwd)) {
        header("Location: ../signup.php?signup=empty");
        exit();
    } else {
        // Валидация (имя, фамилия)
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            header("Location: ../signup.php?signup=invalid");
            exit();
        } else {
            // Валидация e-mail
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.php?signup=invalidemail");
                exit();
            } else {
                // Проверка имени пользователя
                $sql = "SELECT * FROM users WHERE username='$username'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck > 0) {
                    header("Location: ../signup.php?signup=userexists");
                    exit();
                } else {
                    // Hashing the password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    // Вносим данные пользователя в БД
                    $sql = "INSERT INTO users (user_first, user_last, user_email, username, user_pwd) VALUES ('$first', 
                      '$last', '$email', '$username', '$hashedPwd')";
                    mysqli_query($conn, $sql);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }

} else {
    header("Location: ../signup.php");
    exit();
}