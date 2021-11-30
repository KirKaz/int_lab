<?php

session_start();
include 'connect.php';
if (isset($_SESSION['logged_user'])){
    $name = $_SESSION['logged_user'];
    $user = pg_delete($connection,  'users', $name);
    session_destroy();
    header('location:login.html');
}
else{
    echo 'Пожалуйста, <a href = login.html>войдите</a> в систему';
}
?>

?>
