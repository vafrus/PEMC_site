<?php
$link = mysqli_connect("localhost", "root", "12369", "medspace_patents");

mysqli_set_charset($link, "utf8");


if (isset($_REQUEST[session_name()])) session_start();


/* проверка соединения */


if (mysqli_connect_errno()) 
{
	
	printf("Соединение не удалось: %s\n", mysqli_connect_error());
	
	exit();
	
}

session_start();

if(isset($_POST["submit"]))
{
	
	// 	Вытаскиваем из формы записи
    $card = $_POST["number_card"];

	$fam = $_POST["fam"];
	
	$imya = $_POST['imya'];
	
	$otch = $_POST['otch'];

    $date = $_POST['date'];
	
	$gender = $_POST['gender'];
	
	$serya = $_POST['serya'];
	
	$number = $_POST['number'];
	
	$who_give = $_POST['who_give'];
	
	$oms = $_POST['oms'];
	
	$region = $_POST['region'];
	
	$city = $_POST['city'];
	
	$street = $_POST['street'];
	
	$house = $_POST['house'];

    $apartment = $_POST['apartment'];
	
    //После этого места еще не переписывал
	
	$fam = mysqli_real_escape_string($link, $fam);
	
	$imya = mysqli_real_escape_string($link, $imya);
	
	$otch = mysqli_real_escape_string($link, $otch);
	
	$gender = intval($gender);
	
	$office_number = intval($office_number);
	
	$speciality = mysqli_real_escape_string($link, $speciality);
	
	$work_experience = intval($work_experience);
	
	$category = mysqli_real_escape_string($link, $category);
	
	$rank = intval($rank);
	
	$university = mysqli_real_escape_string($link, $university);
	
	$clinic = mysqli_real_escape_string($link, $clinic);
	
	$biography = mysqli_real_escape_string($link, $biography);
	
	
	//Запрос на клинику
	$query = "SELECT * FROM `clinic` WHERE Clinic = '" . $clinic . "'";
	
	//Проверяем на отсутствие клиники в таблице
	if($result = mysqli_query($link, $query)) 
	{
		$row = mysqli_fetch_assoc($result);
		
		$id_clinic = $row["id_clinic"];
		
	}
	
	else
	{
		$query = "INSERT INTO `clinic` (`id_clinic`, `Clinic`) VALUES (NULL, ". $clinic .")";
		
		mysqli_query($link, $query);
		
		$query = "SELECT `id_clinic` FROM `clinic` WHERE `clinic`.`Clinic` = " . $clinic . "";
		
		$result = mysqli_query($link, $query);
		
		$row = mysqli_fetch_assoc($result);
		
		$id_clinic = $row["id_clinic"];
		
	}
	
	$sql = "UPDATE `patient`
    SET
    `Fam`= '".$fam."',
    `Imya`='" . $imya . "',
    `Otch`='" . $otch . "',
    `Office_number`='" . $office_number . "',
    `id_gender`='" . $gender . "',
    `Specialty`='" . $speciality . "',
    `Work_experience`='" . $work_experience . "',
    `Category`='" . $category . "',
    `Rank`='" . $rank . "',
    `University`='" . $university . "',
    `Biography`='" . $biography . "',
    `id_clinic`='" . $id_clinic . "'
    WHERE 
    `doctor`.`id_doctor`= '".$id_doctor."'";

	$res = mysqli_query($link, $sql);
	
	if($res)
	{
		
		mysqli_close($link);
		
		header("Location: doctor.php");
		
		exit();
		
	}
	
	else
	{
		
		echo "Ошибка сохранения данных";
		
	}
	
}

?>