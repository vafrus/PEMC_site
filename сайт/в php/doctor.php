<!doctype html> 
<?php
    include 'check_auth.php';

    $link = mysqli_connect("localhost", "root", "12369", "medspace");
    mysqli_set_charset($link, "utf8");

    if (isset($_REQUEST[session_name()])) session_start();
    /* проверка соединения */

    if (mysqli_connect_errno()) 
    {
        printf("Соединение не удалось: %s\n", mysqli_connect_error());
        exit();
    }

    $query = mysqli_query($link,"SELECT * FROM `doctor` NATURAL JOIN `clinic` WHERE `id_doctor`='".$_SESSION['id_doctor']."' AND `doctor`.`id_clinic` = `clinic`.`id_clinic` LIMIT 1");
    $res = mysqli_fetch_assoc($query);
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

<body>
    <div class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">
                    <img alt="Brand" src="img/logo2.png" height=66 width=200 align="middle">
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
                <form class="form-horizontal" role="form" method="POST" action="update_doctor.php">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Фамилия</label>
                        <div class="col-sm-6">
                            <?php echo '<input name="fam" type="text" class="form-control" id="inputEmail3" value="'.$res['Fam'].'" readonly>' ?>
                        </div>
                        <button type="button" role="button" class="pull-right btn btn-primary" onclick="setEnabled()">Редактировать</button>
                        <button name="submit" role="button" class="pull-right btn btn-primary" onclick="setDisabled()">Сохранить всё</button>
                    </div>
                   <div class="form-group">
                        <label class="col-sm-2 control-label">Имя</label>
                        <div class="col-sm-6">
                            <?php echo '<input name="imya" type="text" class="form-control" id="inputEmail3" value="'.$res['Imya'].'" readonly>' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Отчество</label>
                        <div class="col-sm-6">
                            <?php echo '<input name="otch" type="text" class="form-control" id="inputEmail3" value="'.$res['Otch'].'" readonly>' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Пол</label>
                        <div class="col-sm-3">
                            <select name="gender" class="form-control" id="sel1" readonly>
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
                        <label class="col-sm-2 control-label">Номер кабинета</label>
                        <div class="col-sm-3">
                            <?php echo '<input name="office_number" type="text" class="form-control" id="inputEmail3" value="'.$res['Office_number'].'" readonly>' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Специальность</label>
                        <div class="col-sm-3">
                            <?php echo '<input name="speciality" type="text" class="form-control" id="inputEmail3" value="'.$res['Specialty'].'" readonly>' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Стаж работы</label>
                        <div class="col-sm-3">
                            <?php echo '<input name="work_experience" type="text" class="form-control" id="inputEmail3" value="'.$res['Work_experience'].'" readonly>' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Категория</label>
                        <div class="col-sm-3">
                            <?php echo '<input name="category" type="text" class="form-control" id="inputEmail3" value="'.$res['Category'].'" readonly>' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Звание</label>
                        <div class="col-sm-3">
                            <?php echo '<input name="rank" type="text" class="form-control" id="inputEmail3" value="'.$res['Rank'].'" readonly>' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ВУЗ</label>
                        <div class="col-sm-3">
                            <?php echo '<input name="university" type="text" class="form-control" id="inputEmail3" value="'.$res['University'].'" readonly>' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Клиника</label>
                        <div class="col-sm-3">
                            <?php echo '<input name="clinic" type="text" class="form-control" id="inputEmail3" value="'.$res['Clinic'].'" readonly>' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Биография</label>
                        <div class="col-sm-10">
                            <?php echo '<textarea name="biography" class="form-control" rows="4" readonly>'.$res["Biography"].'</textarea>' ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>
        <h2 align="center">Отзывы</h2>
        <div class="table-responsive container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Ф.И.О. пациента</th>
                        <th>Отзыв</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input class="form-control"></td>
                        <td><input class="form-control"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><input class="form-control"></td>
                        <td><input class="form-control"></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><input class="form-control"></td>
                        <td><input class="form-control"></td>
                    </tr>
                </tbody>
            </table>
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
<?php
if(isset($_POST['submit']))
{
    // Вытаскиваем из сессии id_doctor
    $id_doctor=$_SESSION['id_doctor'];

    // Вытаскиваем из формы записи
    $fam = $_POST['fam'];
    $imya = $_POST['imya'];
    $otch = $_POST['otch'];
    $gender = $_POST['gender'];
    $office_number = $_POST['office_number'];
    $clinic = $_POST['clinic'];
    $speciality = $_POST['speciality'];
    $work_experience = $_POST['work_experience'];
    $category = $_POST['category'];    
    $rank = $_POST['rank'];
    $university = $_POST['university'];
    $biography = $_POST['biography']; 

    $fam = mysqli_real_escape_string($link, $fam);
    $imya = mysqli_real_escape_string($link, $imya);
    $otch = mysqli_real_escape_string($link, $otch);
    $gender = intval($gender);
    $office_number = intval($office_number);
    $clinic = mysqli_real_escape_string($link, $clinic);
    $speciality = mysqli_real_escape_string($link, $speciality);
    $work_experience = intval($work_experience);
    $category = mysqli_real_escape_string($link, $category);
    $rank = intval($rank);
    $university = mysqli_real_escape_string($link, $university);
    $biography = mysqli_real_escape_string($link, $biography);

    $sql = "INSERT
    INTO
        `doctor`
        (
        `id_doctor`,
        `Fam`,
        `Imya`,
        `Otch`,
        `Office_number`,
        `Gender`,
        `Specialty`,
        `Work_experience`,
        `Category`,
        `Rank`,
        `University`,
        `Biography`,
        `Clinic`
        )
    VALUES
        (
        $id_doctor, 
        '$fam', 
        '$imya', 
        '$otch', 
        $office_number, 
        $gender, 
        '$speciality', 
        $work_experience, 
        '$category',
        $rank,
        '$university', 
        '$biography', 
        '$clinic' 
        )
        ";
    $res = mysqli_query($link, $sql);
    if($res == TRUE)
    {
        mysqli_close($link);
        header("Location: doctor.php"); 
        exit();
    }
    else
    {
        $err = "Ошибка сохранения данных";
    }

}
?>