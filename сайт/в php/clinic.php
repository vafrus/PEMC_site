<?php
$link = mysqli_connect("localhost", "root", "santikwh", "medspace");
mysqli_set_charset($link, "utf8");

/* проверка соединения */
if (mysqli_connect_errno()) 
{
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT `Clinic` FROM `doctor` WHERE id_doctor = '".intval($_COOKIE['id_doctor'])."' LIMIT 1";
                
if ($result = mysqli_query($link, $query)) 
{
    /* извлечение ассоциативного массива */
    $row = mysqli_fetch_assoc($result);
    echo $row["Clinic"];
}
else
{
    echo 'Вы не авторизованы';
}
?>