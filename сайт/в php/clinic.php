<?php
$link = mysqli_connect("localhost", "root", "12369", "medspace");
mysqli_set_charset($link, "utf8");
if (isset($_REQUEST[session_name()])) session_start();
/* проверка соединения */
if (mysqli_connect_errno()) 
{
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT `Clinic` FROM `clinic`, `doctor` WHERE `doctor`.`id_doctor` = '".intval($_SESSION['id_doctor'])."'  AND `doctor`.`id_clinic`=`clinic`.`id_clinic` LIMIT 1";

if($result = mysqli_query($link, $query))
{
    if ($row = mysqli_fetch_assoc($result)) 
    {
        /* извлечение ассоциативного массива */
        echo $row["Clinic"];
    }
    else
    {
        echo 'Нет данных. Заполните информацию';
    }
}            
?>