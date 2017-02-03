<?php
session_start();
if(!isset($_SESSION['id_doctor']))
{
    $_SESSION['err'] = "Вы не авторизованы!";
    header("Location: index.php"); exit();
}
?>