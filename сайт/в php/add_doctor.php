<!doctype html> 
<?php
include 'check_auth.php';

?>
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
	
	// 	Вытаскиваем из сессии id_doctor
	$id_doctor=$_SESSION['id_doctor'];
	
	// 	Вытаскиваем из формы записи
	
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
	
	
	//Запрос на клинику
	$query = "SELECT * FROM `clinic` WHERE Clinic = '" . $clinic . "'";
	
    $result = mysqli_query($link, $query);

	//Проверяем на отсутствие клиники в таблице
	if(mysqli_num_rows($result) == 1) 
	{
		$row = mysqli_fetch_assoc($result);
		
		$id_clinic = $row["id_clinic"];
				
	}
	
	
	else
	{
		
		$sql = "INSERT INTO `clinic` (`id_clinic`, `Clinic`) VALUES (NULL, '". $clinic ."')";

		
		$result = mysqli_query($link, $sql);
		
		
		$query = "SELECT * FROM `clinic` WHERE `clinic`.`Clinic` = '" . $clinic . "' LIMIT 1";
		
		
		$result = mysqli_query($link, $query);


		$row = mysqli_fetch_assoc($result);

		
		$id_clinic = $row["id_clinic"];
		
		
	}
		
	$sql = "INSERT
    INTO
        `doctor`
        (
        `id_doctor`, 
        `Fam`, 
        `Imya`, 
        `Otch`,  
        `Office_number`, 
        `id_gender`, 
        `Specialty`, 
        `Work_experience`, 
        `Category`, 
        `Rank`, 
        `University`, 
        `Biography`, 
        `id_clinic`
        )
    VALUES
        (
        '$id_doctor', 
        '$fam', 
        '$imya', 
        '$otch', 
        '$office_number', 
        '$gender', 
        '$speciality', 
        '$work_experience', 
        '$category',
        '$rank',
        '$university', 
        '$biography', 
        '$id_clinic' 
        )
        ";

    echo $sql;
	
	$res = mysqli_query($link, $sql);
	
	if($res === TRUE)
	{
		
		mysqli_close($link);
		
		header("Location: doctor.php");
		
		exit();
		
	}
	
	else
	{
		
		$err = "Ошибка сохранения данных";
		
		echo $err;
		
	}
	
	
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
                        <label class="col-sm-2 control-label">Фамилия</label>
                        <div class="col-sm-10">
                            <input name="fam" type="text" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="col-sm-2 control-label">Имя</label>
                        <div class="col-sm-10">
                            <input name="imya" type="text" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Отчество</label>
                        <div class="col-sm-10">
                            <input name="otch" type="text" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Пол</label>
                        <div class="col-sm-3">
                            <select name="gender" class="form-control">
                                <option value="0">Не установлено</option>';
                                <option value="1">муж.</option>';
                                <option value="2">жен.</option>';
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Номер кабинета</label>
                        <div class="col-sm-3">
                            <input name="office_number" type="text" class="form-control" id="inputPassword3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Клиника</label>
                        <div class="col-sm-3">
                            <input name="clinic" type="text" class="form-control" id="inputPassword3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Специальность</label>
                        <div class="col-sm-3">
                            <input name="speciality" type="text" class="form-control" id="inputPassword3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Стаж работы</label>
                        <div class="col-sm-3">
                            <input name="work_experience" type="text" class="form-control" id="inputPassword3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Категория</label>
                        <div class="col-sm-3">
                            <input name="category" type="text" class="form-control" id="inputPassword3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Звание</label>
                        <div class="col-sm-3">
                            <input name="rank" type="text" class="form-control" id="inputPassword3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ВУЗ</label>
                        <div class="col-sm-10">
                            <input name="university" type="text" class="form-control" id="inputPassword3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Биография</label>
                        <div class="col-sm-10">
                            <textarea name="biography" class="form-control" rows="4"></textarea>
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