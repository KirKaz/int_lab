<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
session_start();
include 'connect.php';
if (isset($_SESSION['logged_user'])){
    $name = $_SESSION['logged_user'];
    $user = pg_fetch_assoc(pg_query($connection, "SELECT * FROM users WHERE login= '$name[login]'"));
    echo <<<HTML
    
    <h2>Добро пожаловать, $user[name]</h2>
    <p><b>Информация о Вас:</b></p>
    <p><i>Ваш город: </i>$user[city]</p>
    <p><i>Ваша дата рождения: </i>$user[birthday_date]</p>
    <p><i>Описание: </i>$user[about]</p>
    <form method='post' action='editor.php'>
    <input  type='submit' name='logout' value='Редактировать данные'>
    <p><a href="logout.php">Сменить пользователя</a></p>
    <p><a href="drop.php">Удалить пользователя</a></p>
    </form>
    
HTML;
}
else{
    echo 'Пожалуйста, <a href = login.html>войдите</a> в систему';
}
?>
</body>
</html>
