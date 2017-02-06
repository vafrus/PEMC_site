<!doctype html> 
<?php
// Ввод информации о враче

// Соединямся с БД
$link=mysqli_connect("localhost", "root", "santikwh", "medspace");
mysqli_set_charset($link, "utf8");
if (mysqli_connect_errno()) 
{
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
}
if(isset($_POST['submit']))
{
    // Вытаскиваем из сессии id_doctor

    // Вытаскиваем из формы записи
    
    $gender = $_POST['gender'];

    $gender = intval($gender);

    echo $gender;

    /*$res = mysqli_query($link, $sql);
    if($res == TRUE)
    {
        mysqli_close($link);
        header("Location: doctor.php"); 
        exit();
    }
    else
    {
        $err = "Ошибка сохранения данных";
    }*/

}



    ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MedSpace</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
</head>

<body>
    <h2 align="center">Профиль врача</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="panel panel-success">
                    <div align="center" class="panel-heading">
                        Фото
                    </div>
                    <div class="panel-body">
                        <img class="img-thumbnail center-block" src="img/people.png" alt="Неизвестно">
                    </div>
                    <button type="button" class="btn btn-info btn-block">ред.</button>
                </div>
            </div>
            <div class="col-md-10">
                <form method="POST" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Пол</label>
                        <div class="col-sm-3">
                            <select name="gender" class="form-control" id="sel1">
                                    <option value="1">муж.</option>   
                                    <option value="2">жен.</option>
                            </select>
                        </div>
                    </div>
                    <div align="center">
                        <button name="submit" type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jasny-bootstrap.min.js"></script>
</body>
</html>