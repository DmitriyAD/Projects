<?php

    session_start();
    require_once 'connect.php';
    $connect = mysqli_connect('localhost', 'root', '','project');

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];


$check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
if (mysqli_num_rows($check_login) > 0) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Такой логин уже существует",
        "fields" => ['login']
    ];

    echo json_encode($response);
    die();
}

$error_fields = [];

if (strlen($login) < 6) {
    $error_len[] = 'login';
}

if ($login === '') {
    $error_fields[] = 'login';
}
if (strlen($password) < 6) {
    $error_len[]= 'paswword';
}
if (stristr($password, " ")) {
    $error_pass[] = 'password';
}
if ($password === '' ) {
    $error_fields[] = 'password';
}
if (strlen($full_name ) > 2){
    $error_name[] = 'full_name';
}
if ($full_name === '') {
    $error_fields[] = 'full_name';
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_fields[] = 'email';
}

if ($password_confirm === '') {
    $error_fields[] = 'password_confirm';
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
if (!empty($error_pass)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Пароль не должен содержать пробелы!",
        "fields" => $error_pass
    ];

    echo json_encode($response);

    die();
}
if (!empty($error_len)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Длина Логина и Пароля должна быть больше 6 символов",
        "fields" => $error_len
    ];

    echo json_encode($response);

    die();
}
if (!empty($error_name)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Имя должно состоять из двух латинских букв",
        "fields" => $error_name
    ];

    echo json_encode($response);

    die();
}

if ($password === $password_confirm) {
$password = md5($password);
mysqli_query($connect, "INSERT INTO `users` (`id`,`full_name`,`login`,`email`,`password`) VALUES ('','$full_name','$login','$email','$password')");
$response = [
    "status" => true,
    "message" => "Регистрация прошла успешно!",
];


} else {
    $response = [
        "status" => false,
        "message" => "Пароли не совпадают",
    ];
}
echo json_encode($response);
?>