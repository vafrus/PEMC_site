<?php
// Страница регистрации нового пользователя

// Соединямся с БД
$link=mysqli_connect("localhost", "root", "santikwh", "medspace");
mysqli_set_charset($link, "utf8");
if(isset($_POST['submit']))
{
    $err = [];

    // проверям логин
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT COUNT(id_doctor) FROM login_pass WHERE login='".mysqli_real_escape_string($link, $_POST['login'])."'");
    $row = mysqli_fetch_assoc($query);
    echo $row["COUNT(id_doctor)"] . "\n";
    if($row["COUNT(id_doctor)"] == 1)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {

        $login = $_POST['login'];

        // Убераем лишние пробелы и делаем двойное шифрование
        $password = md5(md5(trim($_POST['password'])));
        
        mysqli_query($link,"INSERT INTO login_pass SET login='".$login."', pass='".$password."'");
        header("Location: index.php"); exit();
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MedSpace</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet" type="text/css">
    <link href="css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
</head>

<body>
    <a href="index.php">
        <img src="img/logo2.png" alt="Логотип" height=66 width=200 style="margin:50px auto;display:block">
    </a>
    <div class="well">
        <legend align="center">Регистрация</legend>
        <form method="POST" role="form">
            <div class="form-group">
                <label for="login">Логин</label>                
                <input name="login" type="text" class="form-control" id="login" placeholder="Логин">
            </div>
            <div class="form-group">
                <label for="pass">Пароль</label>
                <input name="password" type="password" class="form-control" id="pass" placeholder="Пароль">
            </div>
            <button name="submit" type="submit" class="btn btn-success">Зарегистрироваться</button>
        </form>
    </div>
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/jasny-bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>