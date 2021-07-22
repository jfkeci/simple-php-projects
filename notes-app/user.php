<?php

$connection = require_once './connection.php';

session_start();

if(isset($_POST['login_username']) && isset($_POST['login_password'])){

    $user = [
        'username' => $_POST['login_username'],
        'password' => $_POST['login_password']
    ];

    $loggedInUser = $connection->loginUser($user);

    if($loggedInUser['username'] == $_POST['login_username']){
        
        $_SESSION['user_id'] = $loggedInUser['id'];

        
        header('Location: index.php');
        exit;
    }else{
        header('Location: login.php');
    }
}

if(isset($_POST['register_username']) && isset($_POST['register_password'])){
    $user = [
        'username' => $_POST['register_username'],
        'password' => $_POST['register_password']
    ];

    $connection->registerUser($user);

    header('Location: login.php');
    exit;
}
?>