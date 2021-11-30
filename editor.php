<?php
require 'connect.php';
session_start();
if (isset($_SESSION['logged_user'])){
    $data = $_POST;
    $name = $_SESSION['logged_user'];
    if (isset($data['edit_news'])) {
            $pg = pg_update($connection, 'users',
                array('name' => $data['name'], 'city' => $data['city'], 'birthday_date' => $data['date'], 'about' => $data['about']),
                array('login' => $name['login']));
            echo 'Данные обновлены!';
            header("refresh: 2; index.php");
        }


    $user = pg_fetch_assoc(pg_query($connection, "SELECT * FROM users WHERE login = '$name[login]'"));

}
else{
    echo 'Пожалуйста, <a href = login.html>войдите</a> в систему';
}

?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <div class="article_div">
        <form action="editor.php" method="post">
            <p>
            <p><strong>Введите имя</strong></p>
            <input type="text" name="name" value="<?php echo @$user['name'] ?>">
            </p>

            <p>
            <p><strong>Введите город</strong></p>
            <input type="text" name="city" value="<?php echo @$user['city'] ?>">
            </p>

            <p>
            <p><strong>Введите дату рождения</strong></p>
            <input type="date" name="date" value="<?php echo @$user['birthday_date'] ?>">
            </p>

            <p>
            <p><strong>Введите информацию о себе</strong></p>
            <textarea name="about"><?php echo @$user['about'] ?></textarea>
            </p>


            <button type="submit" name="edit_news">Изменить</button>



        </form>
    </div>
    </body>
    </html>
