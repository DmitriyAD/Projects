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
    <form >
        <label >Фио</label>
        <input type="text" name = "full_name" placeholder="Введите Фио">
        <label >Логин</label>
        <input type="text"  name = "login"  placeholder="Введите логин">
        <label >Email</label>
        <input type="email"  name = "email" placeholder="Введите email">
        <label >Пароль</label>
        <input type="password" name = "password"  placeholder="Введите пароль">
        <label >Подтвердите пароль</label>
        <input type="password"  name = "password_confirm" placeholder="Повторите пароль">
        <button type="submit" class="register-btn">Войти</button>
        <p>
            Есть аккаунта? - <a href= "/">Авторизируйтесь</a>
        </p>
        <p class="msg none"></p>
        <script src="stili/JS/Jquery.js"></script>
        <script src="stili/JS/main.js"></script>
        
    </form>
    
</body>
</html>