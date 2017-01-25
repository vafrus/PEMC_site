<head>
    <meta charset="utf-8">
</head>
<?php
$link = mysqli_connect("localhost", "root", "santikwh", "medspace");
mysqli_set_charset($link, "utf8");

/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT FIO, Number_card FROM patient";

if ($result = mysqli_query($link, $query)) {

    /* извлечение ассоциативного массива */
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["Number_card"] . " " . $row["FIO"];
    }

    /* удаление выборки */
    mysqli_free_result($result);
}

/* закрытие соединения */
mysqli_close($link);
?>