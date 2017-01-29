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
                <p class="panel-title text-left"><?php include 'clinic.php'; ?></p>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <p class="panel-title text-right"><?php include 'user_name.php'; ?></p>
            </div>
        </div>
    </div>
    <div>
        <h2 align="center">История болезни</h2>
        <div class="container">
            <div class="tabbable">
                <ul class="nav nav-pills">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">Анамнез</a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab">Общий осмотр</a>
                    </li>
                    <li>
                        <a href="#tab3" data-toggle="tab">Органы дыхания</a>
                    </li>
                    <li>
                        <a href="#tab4" data-toggle="tab">ССС</a>
                    </li>
                    <li>
                        <a href="#tab5" data-toggle="tab">Органы пищеварения</a>
                    </li>
                    <li>
                        <a href="#tab6" data-toggle="tab">Мочпол система</a>
                    </li>
                    <li>
                        <a href="#tab7" data-toggle="tab">Status localis</a>
                    </li>
                    <li>
                        <a href="#tab8" data-toggle="tab">Анализы и исследования</a>
                    </li>
                    <li>
                        <a href="#tab9" data-toggle="tab">План лечения</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <div class="container">
                            <div class="form-group">
                                <label class="control-label">Жалобы больного</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Anamnesis morbi</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Anamnesis vitae</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Перенесенные заболевания</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <a role="button" class="btn btn-success">Норма</a>
                            <a role="button" class="btn btn-primary">Сохранить</a>
                            <a role="button" class="btn btn-primary">Печать</a>
                            <a role="button" class="btn btn-primary" href="table_history.php">Закрыть</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <div class="container">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Состояние</label>
                                    <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Сознание</label>
                                    <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Положение</label>
                                    <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Мышцы</label>
                                    <input type="email" class="form-control" id="inputEmail3">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Кости</label>
                                    <input type="email" class="form-control" id="inputEmail3">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Суставы</label>
                                    <input type="email" class="form-control" id="inputEmail3">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Слизистые</label>
                                    <input type="email" class="form-control" id="inputEmail3">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Подкожная клетчатка</label>
                                    <input type="email" class="form-control" id="inputEmail3">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Лимфатические узлы</label>
                                    <input type="email" class="form-control" id="inputEmail3">
                                </div>
                            </div>
                            <div class="container form-group">
                                <label class="control-label">Результаты осмотра</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <a role="button" class="btn btn-success">Норма</a>
                            <a role="button" class="btn btn-primary">Сохранить</a>
                            <a role="button" class="btn btn-primary">Печать</a>
                            <a role="button" class="btn btn-primary" href="table_history.php">Закрыть</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab3">
                        <div class="container">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Грудная клетка</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                        </select>
                                    </div>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Аускультативно</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                        </select>
                                    </div>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Хрипы</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                        </select>
                                    </div>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Сравнительная перкусия</label>
                                    <div class="col-sm-5">
                                        <input type="email" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="email" class="form-control" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Дыхательные движения</label>
                                    <div class="col-sm-5">
                                        <input type="email" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="email" class="form-control" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Тип дыхания</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                        </select>
                                    </div>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Голосовое дрожание</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                        </select>
                                    </div>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="container form-group">
                            <label class="control-label">Результаты осмотра</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                        <div class="text-center">
                            <a role="button" class="btn btn-success">Норма</a>
                            <a role="button" class="btn btn-primary">Сохранить</a>
                            <a role="button" class="btn btn-primary">Печать</a>
                            <a role="button" class="btn btn-primary" href="table_history.php">Закрыть</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab4">
                        <div class="container">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <div class="col-sm-8">
                                        <label class="control-label">Границы сердца</label>
                                        <input type="text" class="form-control" id="comment">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="control-label">Тоны сердца</label>
                                        <input type="text" class="form-control" id="comment">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label">Пульс</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="comment">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default" disabled>уд./мин.</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="control-label">Тоны пульса</label>
                                        <input type="email" class="form-control" id="comment">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Артериальное давление</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="comment">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default" disabled>мм рт. ст.</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Патологические шумы</label>
                                        <input type="email" class="form-control" id="comment">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Магистральный кровоток</label>
                                        <input type="email" class="form-control" id="comment">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Результаты осмотра</label>
                                        <textarea class="form-control" rows="4"></textarea>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="text-center">
                            <a role="button" class="btn btn-success">Норма</a>
                            <a role="button" class="btn btn-primary">Сохранить</a>
                            <a role="button" class="btn btn-primary">Печать</a>
                            <a role="button" class="btn btn-primary" href="table_history.php">Закрыть</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab5">
                        <div class="container">
                            <form class="form-horizontal" role="form">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Язык</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Селезенка</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Перистальтика</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Живот</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Печень</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="container">
                            <div align="center">
                                <h3>Симптомы:</h3>
                            </div>
                            <form class="form-horizontal" role="form">
                                <div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Симптом раздражения брюшины</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="sel1">
                                                <option value="1">1</option>   
                                                <option value="2">2</option>  
                                                <option value="3">3</option>   
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="sel1">
                                                <option value="1">1</option>   
                                                <option value="2">2</option>  
                                                <option value="3">3</option>   
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Симптом Ситковского</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Симптом Ровзинга</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="container">
                            <div class="form-group">
                                <label class="control-label">Другие симптомы</label>
                                <input class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Результаты осмотра</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <a role="button" class="btn btn-success">Норма</a>
                            <a role="button" class="btn btn-primary">Сохранить</a>
                            <a role="button" class="btn btn-primary">Печать</a>
                            <a role="button" class="btn btn-primary" href="table_history.php">Закрыть</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab6">
                        <div class="container">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Симптом поколачивания слева</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Симптом поколачивания справа</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="sel1">
                                           <option value="1">1</option>   
                                           <option value="2">2</option>  
                                           <option value="3">3</option>   
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Точки болезненности мочеточника</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Мочевой пузырь</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="text-center">
                            <a role="button" class="btn btn-success">Норма</a>
                            <a role="button" class="btn btn-primary">Сохранить</a>
                            <a role="button" class="btn btn-primary">Печать</a>
                            <a role="button" class="btn btn-primary" href="table_history.php">Закрыть</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab7">
                        <div class="container">
                            <div class="form-group">
                                <label class="control-label">Status localis</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Диагноз</label>
                                <input class="form-control"></input>
                            </div>
                        </div>
                        <div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">МКБ</label>
                                    <input class="form-control"></input>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label class="control-label">Сопутствующие</label>
                                    <input class="form-control"></input>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Осложнение</label>
                                    <input class="form-control"></input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="form-group">
                                <label class="control-label">Другие системы</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <a role="button" class="btn btn-success">Норма</a>
                            <a role="button" class="btn btn-primary">Сохранить</a>
                            <a role="button" class="btn btn-primary">Печать</a>
                            <a role="button" class="btn btn-primary" href="table_history.php">Закрыть</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab8">
                        <h2 align="center">Анализы</h2>
                        <div class="table-responsive container">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Дата</th>
                                        <th>Вид анализа</th>
                                        <th>Результат</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h2 align="center">Исследование</h2>
                        <div class="table-responsive container">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Дата</th>
                                        <th>Вид исследования</th>
                                        <th>Результат</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <a role="button" class="btn btn-success">Норма</a>
                            <a role="button" class="btn btn-primary">Сохранить</a>
                            <a role="button" class="btn btn-primary">Печать</a>
                            <a role="button" class="btn btn-primary" href="table_history.php">Закрыть</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab9">
                        <div class="container">
                            <div class="form-group">
                                <label class="control-label">Лечение</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Рекомендации</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <a role="button" class="btn btn-success">Норма</a>
                            <a role="button" class="btn btn-primary">Сохранить</a>
                            <a role="button" class="btn btn-primary">Печать</a>
                            <a role="button" class="btn btn-primary" href="table_history.php">Закрыть</a>
                        </div>
                    </div>
                </div>
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