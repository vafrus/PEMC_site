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
                        <a href="#">
                            Услуги
                        </a>
                    </li>
                    <li>
                        <a href="index5.php">
                            Направления
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index6.php">
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
		<script type="text/javascript" src="js/my.js"></script>
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
            <div class="form-group">
                <div class="pull-right col-md-5">
                    <label class="control-label">№ карты</label>
                    <input type="text" class="form-control" id="card_id">
                </div>
            </div>
            <h2 align="center">Выписной эпикриз</h2>
            <div class="form-group">
                <div class="col-sm-5">
                    <label class="control-label">ФИО</label>
                    <input type="text" class="form-control" id="fio">
                </div>
                <div class="col-sm-2">
                    <label class="control-label">Дата рождения</label>
                    <input type="text" class="form-control" id="bday">
                </div>
                <div class="col-sm-2">
                    <label class="control-label">Возраст</label>
                    <input type="text" class="form-control" id="age">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-5">
                    <label class="control-label">МКБ</label>
                    <input type="text" class="form-control" id="MKB">
                </div>
                <div class="col-sm-2">
                    <label class="control-label">Лечение с</label>
                    <input type="text" class="form-control" id="l_from">
                </div>
                <div class="col-sm-2">
                    <label class="control-label">по</label>
                    <input type="text" class="form-control" id="l_to">
                </div>

            </div>
            <hr>
            <h2 align="center">Диагноз</h2>
            <label class="control-label">Основной диагноз</label>
            <input type="text" class="form-control" id="basic_diag">
            <label class="control-label">Сопутствующий</label>
            <input type="text" class="form-control" id="diag">
            <label class="control-label">Осложнения</label>
            <input type="text" class="form-control" id="oslojn">
            <hr>
            <h2 align="center">Анализы и исследования</h2>
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">Анализы</a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab">Исследования</a>
                    </li>
                    <li>
                        <a href="#tab3" data-toggle="tab">Проведенный операции</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <textarea class="form-control" rows="4" id="anal"></textarea>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <textarea class="form-control" rows="4" id="issled"></textarea>
                    </div>
                    <div class="tab-pane" id="tab3">
                        <textarea class="form-control" rows="4" id="oper"></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <h2 align="center">Лечение и консультация</h2>
            <label class="control-label">Проведено лечение</label>
            <input type="text" class="form-control" id="basic_diag">
            <label class="control-label">Консультация специалиста</label>
            <input type="text" class="form-control" id="diag">
            <label class="control-label">Послеоперационный период</label>
            <input type="text" class="form-control" id="oslojn">
            <label class="control-label">Рекомендации</label>
            <input type="text" class="form-control" id="oslojn">
            <div class="form-group">
                <div class="col-sm-4">
                    <label class="control-label">Исход</label>
                    <select class="form-control" id="sel1">
                            <option value="1">1</option>   
                            <option value="2">2</option>
                            <option value="3">3</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label class="control-label">Лечащий врач</label>
                    <input type="text" class="form-control" id="l_from">
                </div>
                <div class="col-sm-4">
                    <label class="control-label">Зав. отделением</label>
                    <input type="text" class="form-control" id="l_from">
                </div>
            </div>
            <div class="form-actions">
                <a type="button" class="btn btn-primary">Сохранить</a>
                <a type="button" class="btn btn-primary">Печать</a>
                <a type="button" class="btn btn-primary" href="table_epicrisis.php">Закрыть</a>
            </div>
            <hr>
        </form>
    </div>
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/jasny-bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</body>

</html>