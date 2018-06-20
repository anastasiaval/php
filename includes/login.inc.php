<?php

session_start();

if (isset($_POST['submit'])) {
    include 'config.php';

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //Error handlers
    //Проверка все ли поля заполнены
    if (empty($username) || empty($pwd)) {
        header("Location: ../index.php?login=empty");
        exit();
    } else {
        // Проверка имени пользоателя
        $sql = "SELECT * FROM users WHERE username='$username' OR user_email='$username'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            header("Location: ../index.php?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                //De-hashing the password
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                if ($hashedPwdCheck === false) {
                    header("Location: ../index.php?login=error");
                    exit();
                } else if ($hashedPwdCheck === true) {
                    // Log in
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_name'] = $row['username'];
                    header("Location: ../index.php?login=success");
                    exit();
                }
            }
        }
    }

} else {
    header("Location: ../index.php?login=error");
    exit();
}