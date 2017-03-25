<?php
    $card = $_GET['number_card'];
    $link = mysqli_connect("localhost", "root", "12369", "medspace");
    mysqli_set_charset($link, "utf8");

    /* проверка соединения */
    if (mysqli_connect_errno()) 
    {
        printf("Соединение не удалось: %s\n", mysqli_connect_error());
        exit();
    }
    
    $query = "DELETE FROM `patient` WHERE `patient`.`Number_card` = " . intval($card) . "";
    $result = mysqli_query($link, $query);
    if($result === false)
    {
        echo '<div class="alert alert-danger">Что-то не так. Пациент не удален.</div>';
    }
    else
    {
        mysqli_close($link);
        header("Location: list_of_patients.php"); 
        exit();
    }
?>