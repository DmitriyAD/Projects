<?php

session_start();
require_once 'connect.php';
$connect = mysqli_connect('localhost', 'root', '','project');

$login = $_POST['login'];
$password = $_POST['password'];

$error_fields = [];

if ($login === '') {
    $error_fields[] = 'login';
}

if ($password === '') {
    $error_fields[] = 'password';
}

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверьте правильность полей",
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}

$password = md5($password);

$chek_user = mysqli_query($connect, "SELECT * FROM 'users' WHERE 'login'='$login' AND  'password'='$password'");
    if (mysqli_num_rows($chek_user) > 0)  {
        $user = mysqli_fetch_assoc($chek_user);


        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "email" => $user['email']
        ];

        $response = [
            "status" => true
        ];

        echo json_encode($response);

    } else {

        $response = [
            "status" => false,
            "message" => 'Не верный логин или пароль'
        ];

        echo json_encode($response);
    }
?>