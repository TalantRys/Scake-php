<?php 
    session_start();
    include '../components/connect.php';
    if (isset($_POST['signIn'])) {
        $login = $_POST["login"];
        $password = md5($_POST["password"].'sdads');
        
        $users = mysqli_query($link, "SELECT * FROM `users` 
        WHERE `user_login` = '$login' AND `user_password` = '$password'");
        if ( mysqli_num_rows($users) >= 1) {
            $user = mysqli_fetch_array($users);
            $_SESSION['user']=[
                'id' => $user['user_id'],
                'login' => $login,
                'status' => $user['user_status'],
            ];
            header("location: ../../index.php");
        } elseif (mysqli_num_rows($users) == 0){
            $_SESSION['error'] = [
                'logPass' => 'Неверный логин или пароль',
            ];
            header("location: ../../authorize.php");
        }
    }
    
