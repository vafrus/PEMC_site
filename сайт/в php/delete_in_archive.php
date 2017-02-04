<?php
    $card = $_GET['number_card'];
    echo $card;
    $link = mysqli_connect("localhost", "root", "santikwh", "medspace");
    mysqli_set_charset($link, "utf8");

    /* проверка соединения */
    if (mysqli_connect_errno()) 
    {
        printf("Соединение не удалось: %s\n", mysqli_connect_error());
        exit();
    }

    $query = "UPDATE `patient` SET `In_archive` = 0 WHERE `patient`.`Number_card` = " . intval($card) . "";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    header("Location: archive.php"); 
    exit();
?>