<!doctype html> 
<?php
include 'check_auth.php';
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MedSpace</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
</head>

<?php
    $link = mysqli_connect("localhost", "root", "santikwh", "medspace");
    mysqli_set_charset($link, "utf8");

    if (isset($_REQUEST[session_name()])) session_start();

    if (mysqli_connect_errno()) 
    {
        printf("Соединение не удалось: %s\n", mysqli_connect_error());
        exit();
    }
    
    if(isset($_POST['submit']))
    {
        $card = intval($_POST['card']);
        $fam = mysqli_real_escape_string($link, $_POST['fam']);
        $imya = mysqli_real_escape_string($link, $_POST['imya']);
        $otch = mysqli_real_escape_string($link, $_POST['otch']);
        $gender = intval($_POST['gender']);
        $telephone = intval($_POST['telephone']);
        $date = mysqli_real_escape_string($link, $_POST['date']);
        $oms = intval($_POST['oms']);
        $series = intval($_POST['series']);
        $number = intval($_POST['number']);
        $who_give = mysqli_real_escape_string($link, $_POST['who_give']);

        $region = mysqli_real_escape_string($link, $_POST['region']);
        $city = mysqli_real_escape_string($link, $_POST['city']);
        $street = mysqli_real_escape_string($link, $_POST['street']);    
        $house = intval($_POST['house']);
        $apartment = intval($_POST['apartment']);

        $sql = "SELECT `Region`,`id_region` FROM `region` WHERE `Region`='".$region."'";
        if ($res = mysqli_query($link, $sql) and $res = mysqli_fetch_assoc($res))
        {
            $id_region = $res['id_region'];
        }
        else
        {
            $sql = "INSERT INTO `region` (`Region`) VALUES ('".$region."')";
            $res = mysqli_query($link, $sql);
            $id_region = intval(mysqli_insert_id($link));
        }

        $sql = "INSERT INTO `region_city` (`city`,`id_region`) VALUES ('".$city."','".$id_region."')";
        $res = mysqli_query($link, $sql);
        $id_city = intval(mysqli_insert_id($link));

        $sql = "INSERT INTO `city_street` (`street`,`id_city`) VALUES ('".$street."','".$id_city."')";
        $res = mysqli_query($link, $sql);
        $id_street = intval(mysqli_insert_id($link));

        $sql = "INSERT INTO `street_house` (`house`,`id_street`) VALUES ('".$house."','".$id_street."')";
        $res = mysqli_query($link, $sql);
        $id_house = intval(mysqli_insert_id($link));

        $sql = "INSERT INTO `house_apartment` (`apartment`,`id_house`) VALUES ('".$apartment."','".$id_house."')";
        $res = mysqli_query($link, $sql);
        $id_apartment = intval(mysqli_insert_id($link));

        $sql = "INSERT INTO `passport` (`serya`,`number`,`who_give`) VALUES ('$series','$number','$who_give')";
        $res = mysqli_query($link, $sql);

        $sql = "INSERT INTO `patient` 
                (
                    `number_card`,
                    `fam`,
                    `imya`,
                    `otch`,
                    `date`,
                    `id_region`,
                    `id_city`,
                    `id_street`,
                    `id_house`,
                    `id_apartment`,
                    `telephone`,
                    `oms`,
                    `gender`,
                    `serya`,
                    `number`,
                    `in_archive`
                ) 
                VALUES (
                    '$card',
                    '$fam',
                    '$imya',
                    '$otch',
                    '$date',
                    '$id_region',
                    '$id_city',
                    '$id_street',
                    '$id_house',
                    '$id_apartment',
                    '$telephone',
                    '$oms',
                    '$gender',
                    '$series',
                    '$number',
                    '0'
                )";
        
        echo $sql;

        $res = mysqli_query($link, $sql);

        if($res == TRUE)
        {
            mysqli_close($link);
            //header("Location: doctor.php"); 
            exit();
        }
        else
        {
            $err = "Ошибка сохранения данных";
        }
    }
?>

<body>
    <div class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">
                    <img alt="Brand" src="img/logo2.png" height=66 width=200>
                </a>
            </div>
        </div>
        <br>
        <hr>
        <ul class="nav navmenu-nav">
            <li>
                <a href="doctor.php">
                    <span class="glyphicon glyphicon-education"></span> Профиль врача
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="glyphicon glyphicon-heart"></span> Лечебная деятельность
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu navmenu-nav">
                    <li>
                        <a href="list_of_patients.php">
                            Список пациентов
                        </a>
                    </li>
                    <li>
                        <a href="table_epicrisis.php">
                            Выписки
                        </a>
                    </li>
                    <li>
                        <a href="services.php">
                            Услуги
                        </a>
                    </li>
                    <li>
                        <a href="reception.php">
                            Направления
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="timetable_doctor.php">
                    <span class="glyphicon glyphicon-calendar"></span> График работы
                </a>
            </li>
            <li>
                <a href="archive.php">
                    <span class="glyphicon glyphicon-inbox"></span> Архив
                </a>
            </li>
        </ul>
        <hr>
        <?php
		echo '<p class="panel-title text-center">' . date('d.m.Y') . '</p>';
		?>
		<script type="text/javascript" src="js/time.js"></script>   
    </div>
    <div class="panel panel-default">
        <div class="panel-body grey">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <p class="panel-title text-left"><?php include 'clinic.php'; ?></p>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <p class="panel-title text-right"><?php include 'user_name.php'; ?></p>
            </div>
        </div>
    </div>
    <h2 align="center">Карта пациента</h2>
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
                <form  method="POST" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Номер карты</label>
                        <div class="col-sm-5">
                            <input name="card" type="text" class="form-control" id="input">
                        </div>
                        <button name="submit" type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Фамилия</label>
                        <div class="col-sm-10">
                            <input name="fam" type="text" class="form-control" id="input" >
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="col-sm-2 control-label">Имя</label>
                        <div class="col-sm-10">
                            <input name="imya" type="text" class="form-control" id="input" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Отчество</label>
                        <div class="col-sm-10">
                            <input name="otch" type="text" class="form-control" id="input" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Дата рождения</label>
                        <div class="col-sm-3">
                            <input name="date" type="text" class="form-control" id="input" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Пол</label>
                        <div class="col-sm-3">
                            <select name="gender" class="form-control" id="sel1">
                                <option value="1">муж</option>   
                                <option value="2">жен</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Паспорт</label>
                        <div class="col-sm-3">
                            <label class="control-label">Серия</label>
                            <input name="series" type="text" class="form-control" id="input" >
                        </div>
                        <div class="col-sm-7">
                            <label class="control-label">Номер</label>
                            <input name="number" type="text" class="form-control" id="input" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <label class="control-label">Кем выдан</label>
                            <input name="who_give" type="text" class="form-control" id="input" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ОМС</label>
                        <div class="col-sm-5">
                            <input name="oms" type="text" class="form-control" id="input" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Адрес</label>
                        <div class="col-sm-3">
                            <label class="control-label">Регион</label>
                            <input name="region" type="text" class="form-control" id="input" > 
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label">Город</label>
                            <input name="city" type="text" class="form-control" id="input" > 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-4">
                            <label class="control-label">Улица</label>
                            <input name="street" type="text" class="form-control" id="input" > 
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label">дом</label>
                            <input name="house" type="text" class="form-control" id="input" > 
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label">кв.</label>
                            <input name="apartment" type="text" class="form-control" id="input" > 
                        </div>
                    </div>
                    <div class="col-sm-offset-2">
                        <label class="control-label">Телефонный номер</label>  
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">+7</span>
                            <input name="telephone" type="tel" class="form-control" aria-describedby="basic-addon1" > 
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="navbar navbar-default navbar-fixed-top hidden-md hidden-lg">
        <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">MedSpace</a>
    </div>
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jasny-bootstrap.min.js"></script>
    
</body>

</html>