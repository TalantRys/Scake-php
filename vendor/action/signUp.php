<?php
session_start();
include '../components/connect.php';
if (isset($_POST['signUp'])) {
    $login = $_POST["login"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordConfirm = $_POST["passwordConfirm"];
    if ($password == $passwordConfirm) {
        $password = md5($password . 'sdads');
        $if = 0;
        $users = mysqli_query($link, "SELECT `user_login` FROM `users` where `user_login` = '$login'");
        if (mysqli_num_rows($users) == 0) {
            $if++;
        } else {
            $_SESSION['error'] = [
                'login' => 'Такой логин уже существует',
            ];
            header("location: ../../index.php");
        }
        if ($if == 1) {
            mysqli_query($link, "INSERT INTO `users`(`user_login`, `user_mail`,
            `user_password`) VALUES ('$login','$email','$password')");
            $users = mysqli_query($link, "SELECT `user_id`, `user_login` FROM `users` 
            WHERE `user_login` = '$login' AND `user_password` = '$password'");
            if (mysqli_num_rows($users) >= 1) {
                $user = mysqli_fetch_array($users);
                $_SESSION['user'] = [
                    'id' => $user['user_id'],
                    'login' => $login,
                ];
                header("location: ../../index.php");
            }
        }
    } else {
        $_SESSION['error'] = [
            'passwordConfirm' => 'Пароли не совпадают. Попробуйте снова'
        ];
        header("location: ../../index.php");
    }
}
