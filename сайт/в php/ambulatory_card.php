<!doctype html>
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
    <div class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm" id="bs-example-navbar-collapse-1">
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
                <p class="panel-title text-left">Название клиники</p>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <p class="panel-title text-right">Пользователь</p>
            </div>
        </div>
    </div>

    <div class="navbar navbar-default navbar-fixed-top hidden-md hidden-lg">
        <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target="#bs-example-navbar-collapse-1">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">MedSpace</a>
    </div>
    <div class="container">
        <form class="form-horizontal">
            <h2 align="center">Амбулаторная карта пациента</h2>
            <div class="form-group">
                <div class="col-md-5">
                    <label class="control-label">Ф.И.О. пациента</label>
                    <input type="text" class="form-control" id="card_id">
                </div>
                <div class="col-md-5">
                    <label class="control-label">№ карты</label>
                    <input type="text" class="form-control" id="card_id">
                </div>
            </div>
            <h3 align="center">Новая запись</h3>
            <div class="form-group">
                <div class="col-sm-5">
                    <label class="control-label">Ф.И.О. врача</label>
                    <input type="text" class="form-control" id="fio">
                </div>
                <div class="col-sm-4">
                    <label class="control-label">Специальность</label>
                    <input type="text" class="form-control" id="bday">
                </div>
                <div class="col-sm-3">
                    <label class="control-label">Дата</label>
                    <input type="text" class="form-control" id="age">
                </div>
            </div>
            <label class="control-label">Осмотр</label>
            <textarea class="form-control" rows="4"></textarea>
            <label class="control-label">Диагноз</label>
            <input type="text" class="form-control" id="card_id">
            <label class="control-label">Лечение</label>
            <textarea class="form-control" rows="4"></textarea>
            <label class="control-label">Рекомендации</label>
            <textarea class="form-control" rows="4"></textarea>
            <br>
            <div class="text-center">
                <a role="button" class="btn btn-primary">Сохранить</a>
                <a role="button" class="btn btn-primary">Печать</a>
                <a role="button" class="btn btn-primary" href="table_ambulatory_cards.php">Закрыть</a>
            </div>
        </form>
    </div>
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/jasny-bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</body>

</html>