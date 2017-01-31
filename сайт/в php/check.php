<?php
// Скрипт проверки

// Соединямся с БД
$link=mysqli_connect("localhost", "root", "santikwh", "medspace");
mysqli_set_charset($link, "utf8");
session_start();
if (isset($_SESSION['id_doctor']))
{
    $query = mysqli_query($link, "SELECT `Fam`, `Imya`, `Otch`, `Clinic` FROM `doctor` WHERE `id_doctor` = '".intval($_SESSION['id_doctor'])."'");
    $userdata = mysqli_fetch_assoc($query);
    if((!$userdata['Fam']) or (!$userdata['Imya']) or (!$userdata['Otch']) or (!$userdata['Clinic']))
    {
        header("Location: add_doctor.php"); exit();
    }
    else
    {
        header("Location: doctor.php"); exit();
    }
}
else
{
    echo('asda');
    //header("Location: index.php"); exit();
}
?>