<?php
require 'connect.php';
session_start();
if(isset($_POST['do_login'])) {
    $user = pg_fetch_assoc(pg_query($connection, "SELECT * FROM users WHERE mail='$_POST[email]' AND pass='$_POST[password]'"));
    if ($user) {
        $_SESSION['logged_user'] = $user;

        echo "success";
    } else {
        echo "fail";

    }
    exit();
}