<?php
session_start();
if (!$_SESSION['user']) {
    header('location: /');
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
            <h2><?= $_SESSION['user']['full_name']?></h2>
            <a href="#"><?= $_SESSION['user']['email']?></a>
            <a href="includes/logout.php" class="logout">Выход</a>
        </form>
</body>
</html>