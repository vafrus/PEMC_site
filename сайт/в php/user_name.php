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

$query = "SELECT `Fam`,`Imya`,`Otch` FROM `doctor` WHERE id_doctor = '".intval($_SESSION['id_doctor'])."' LIMIT 1";
                
if($result = mysqli_query($link, $query))
{
    if ($row = mysqli_fetch_assoc($result)) 
    {
        /* извлечение ассоциативного массива */
        echo $row["Fam"] . " " . $row["Imya"] . " " . $row["Otch"];
    }
    else
    {
        echo 'Нет данных. Заполните информацию';
    }
    
}  
?>

