<?php
// Скрипт проверки

// Соединямся с БД
$link=mysqli_connect("localhost", "root", "santikwh", "medspace");
mysqli_set_charset($link, "utf8");
if (isset($_COOKIE['id_doctor']) and isset($_COOKIE['hash']))
{
    $query = mysqli_query($link, "SELECT hash, login, id_doctor FROM login_pass WHERE id_doctor = '".intval($_COOKIE['id_doctor'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);

    if(($userdata['hash'] !== $_COOKIE['hash']) or ($userdata['id_doctor'] !== $_COOKIE['id_doctor']))
    {
        setcookie("id_doctor", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/");
        print "Хм, что-то не получилось";
    }
    else
    {
        header("Location: doctor.php"); exit();
    }
}
else
{
    print "Включите куки";
}
?>