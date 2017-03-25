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
    <div>
        <h2 align="center">Список пациентов</h2>
        <div class="container">
            <div class="text-right">
                <a type="button" class="btn btn-success" href="add_patient.php">Добавить пациента</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Номер карты</th>
                        <th>Ф.И.О.</th>
                        <th>Диагноз</th>
                        <th>Дата поступления</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $link = mysqli_connect("localhost", "root", "12369", "medspace_patients");
                mysqli_set_charset($link, "utf8");

                /* проверка соединения */
                if (mysqli_connect_errno()) 
                {
                    printf("Соединение не удалось: %s\n", mysqli_connect_error());
                    exit();
                }

                $query = "SELECT `Number_card`, `Fam`, `Imya`, `Otch`, `In_archive` FROM `patient`";

                if ($result = mysqli_query($link, $query)) 
                {

                    /* извлечение ассоциативного массива */
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        if($row["In_archive"] == 0)
                        {
                            echo '<tr>' .
                                    '<td>' . $row["Number_card"] . '</td>'.
                                    '<td>' . $row["Fam"] . " " . $row["Imya"] . " " . $row["Otch"] . '</td>'.
                                    '<td>' .  '</td>'.
                                    '<td>' .  '</td>'.
                                    '<td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Действия <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="patient.php?number_card=' . $row["Number_card"]. '">Открыть карту</a></li>
                                            <li><a href="#">Выписать направление</a></li>
                                            <li><a href="#">Выписать эпикриз</a></li>
                                            <li><a href="add_to_archive.php?number_card=' . $row["Number_card"]. '">Добавить в архив</a></li>
                                            <li><a href="delete_patient.php?number_card=' . $row["Number_card"]. '">Удалить пациента</a></li>
                                        </ul>
                                    </div>
                                    </td>
                                </tr>';
                        }
                    }
                /* удаление выборки */
                mysqli_free_result($result);
                }
                mysqli_close($link);
                ?>
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