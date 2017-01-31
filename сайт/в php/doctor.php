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
                <a href="#">
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
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Фамилия</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="col-sm-2 control-label">Имя</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Отчество</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Пол</label>
                        <div class="col-sm-3">
                            <select class="form-control" id="sel1">
                                           <option value="1">муж</option>   
                                           <option value="2">жен</option>
                                </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Специальность</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputPassword3" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Стаж работы</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputPassword3" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Категория</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputPassword3" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Звание</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputPassword3" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ВУЗ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Биография</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="4" disabled></textarea>
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