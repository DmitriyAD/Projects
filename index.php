<?php
session_start();
if ($_SESSION['user']) {
    header('location: profile.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>АвтоРег</title>
    <link rel="stylesheet" href="stili/css/main.css">
</head>
<body>
    <form>
        <label >Логин</label>
        <input type="text" name="login" placeholder="Введите логин">
        <label >Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit" class="login-btn">Войти</button>
        <p>
            Нет аккаунта? - <a href= "/register.php">Зарегестрируйтесь</a>
        </p>
        <p class="msg none"> Пользователь зарегестрирован </p>
        <script src="stili/JS/Jquery.js"></script>
        <script src="stili/JS/main.js"></script>
    </form>
    
</body>
</html>