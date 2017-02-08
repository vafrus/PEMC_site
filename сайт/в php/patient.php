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
    <script src="js/enable_inputs.js"></script>
</head>

<?php
    $link = mysqli_connect("localhost", "root", "santikwh", "medspace");
    mysqli_set_charset($link, "utf8");

    if (isset($_REQUEST[session_name()])) session_start();
    /* проверка соединения */

    if (mysqli_connect_errno()) 
    {
        printf("Соединение не удалось: %s\n", mysqli_connect_error());
        exit();
    }
    $card = $_GET['number_card'];
    $query = mysqli_query($link, "SELECT * FROM `patient`, `passport` WHERE `patient`.`Number_card` = " . intval($card) . " LIMIT 1");
    $res = mysqli_fetch_assoc($query);

    $query2 = mysqli_query($link, "SELECT
  `patient`.`Fam`,
  `patient`.`Imya`,
  `patient`.`Imya`,
  `patient`.`Number_card`,
  `region`.`Region`,
  `region_city`.`City`,
  `city_street`.`Street`,
  `street_house`.`House`,
  `house_apartment`.`Apartment`
FROM
  `patient` NATURAL
JOIN
  `region`,
  `region_city`,
  `city_street`,
  `street_house`,
  `house_apartment`
WHERE
  `patient`.`id_patient` = " . intval($res['id_patient']) . "  
  AND patient.id_region = region.id_region 
  AND patient.id_city = region_city.id_city 
  AND patient.id_street = city_street.id_street 
  AND patient.id_house = street_house.id_house 
  AND patient.id_apartment = house_apartment.id_apartment");
    $res2 = mysqli_fetch_assoc($query2);
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
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Номер карты</label>
                        <div class="col-sm-5">
                            <?php echo '<input type="text" class="form-control" id="input_info" value="'.$res['Number_card'].'" disabled>' ?>
                        </div>
                        <button type="button" role="button" class="pull-right btn btn-primary" onclick="setEnabled()">Редактировать</button>
                        <button type="button" role="button" class="pull-right btn btn-primary">Сохранить всё</button>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Фамилия</label>
                        <div class="col-sm-10">
                            <?php echo '<input type="text" class="form-control" id="input_info" value="'.$res['Fam'].'" disabled>' ?>
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="col-sm-2 control-label">Имя</label>
                        <div class="col-sm-10">
                            <?php echo '<input type="text" class="form-control" id="input_info" value="'.$res['Imya'].'" disabled>' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Отчество</label>
                        <div class="col-sm-10">
                            <?php echo '<input type="text" class="form-control" id="input_info" value="'.$res['Otch'].'" disabled>' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Дата рождения</label>
                        <div class="col-sm-3">
                            <?php echo '<input type="text" class="form-control" id="input_info" value="'.$res['Date'].'" disabled>' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Пол</label>
                        <div class="col-sm-3">
                            <select class="form-control" disabled>
                                <?php 
                                    switch ($res['id_gender']) {
                                        case 1: echo '<option value="1" selected>муж.</option>';
                                                echo '<option value="2">жен.</option>';
                                                break;
                                        case 2: echo '<option value="1">муж.</option>';
                                                echo '<option value="2" selected>жен.</option>';
                                                break;
                                        default: echo '<option value="0" selected>Не установлено</option>';
                                                 echo '<option value="1">муж.</option>';
                                                 echo '<option value="2">жен.</option>';
                                                 break;
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Паспорт</label>
                        <div class="col-sm-3">
                            <label class="control-label">Серия</label>
                            <?php echo '<input type="text" class="form-control" id="input_info" value="'.$res['Serya'].'" disabled>' ?>
                        </div>
                        <div class="col-sm-7">
                            <label class="control-label">Номер</label>
                            <?php echo '<input type="text" class="form-control" id="input_info" value="'.$res['Number'].'" disabled>' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <label class="control-label">Кем выдан</label>
                            <?php echo '<input type="text" class="form-control" id="input_info" value="'.$res['Who_give'].'" disabled>' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ОМС</label>
                        <div class="col-sm-5">
                            <?php echo '<input type="text" class="form-control" id="input_info" value="'.$res['OMS'].'" disabled>' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Адрес</label>
                        <div class="col-sm-3">
                            <label class="control-label">Регион</label>
                            <?php echo '<input type="text" class="form-control" id="input_info" value="'.$res2['Region'].'" disabled>' ?> 
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label">Город</label>
                            <?php echo '<input type="text" class="form-control" id="input_info" value="'.$res2['City'].'" disabled>' ?> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-4">
                            <label class="control-label">Улица</label>
                            <?php echo '<input type="text" class="form-control" id="input_info" value="'.$res2['Street'].'" disabled>' ?> 
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label">дом</label>
                            <?php echo '<input type="text" class="form-control" id="input_info" value="'.$res2['House'].'" disabled>' ?> 
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label">кв.</label>
                            <?php echo '<input type="text" class="form-control" id="input_info" value="'.$res2['Apartment'].'" disabled>' ?> 
                        </div>
                    </div>
                    <div class="col-sm-offset-2">
                        <label class="control-label">Телефонный номер</label>  
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">+7</span>
                            <?php echo '<input type="tel" class="form-control" aria-describedby="basic-addon1" id="input_info" value="'.$res['Telephone'].'" disabled>' ?> 
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>
        <h2 align="center">Сроки лечения и диагноз</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label">Начало</label>
                        <input type="text" class="form-control" id="input_info" disabled>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Окончание</label>
                        <input type="text" class="form-control" id="input_info" disabled>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Исход лечения</label>
                        <select class="form-control" id="input_info" disabled>
                            <option value="1">1</option>   
                            <option value="2">2</option>  
                            <option value="3">3</option>   
                        </select>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label class="control-label">Диагноз</label>
                        <input type="text" class="form-control" id="input_info" disabled>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Врач</label>
                        <input type="text" class="form-control" id="input_info" disabled>
                    </div>
                    <br>
                    <?php echo '<a type="button" class="btn btn-success" href="table_history.php?fam=' . $res['Fam'] . '&imya='. $res['Imya'] .'&otch=' . $res['Otch'] . '&card='. $res['Number_card'] .'">История болезни</a>' ?>
                    <?php echo '<a type="button" class="btn btn-success" href="table_ambulatory_cards.php?fam=' . $res['Fam'] . '&imya=' . $res['Imya'] . '&otch=' . $res['Otch'] . '&card=' . $res['Number_card'] . '">Амбулаторная карта</a>' ?>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Дата</th>
                    <th>Наименование услуги</th>
                    <th>Врач</th>
                    <th>Стоимость</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
            </tbody>
        </table>
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