<?php
// Страница авторизации

// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

// Соединямся с БД
$link=mysqli_connect("localhost", "root", "santikwh", "medspace");
mysqli_set_charset($link, "utf8");
if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($link,"SELECT id_doctor, pass FROM login_pass WHERE login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data['pass'] === md5(md5($_POST['password'])))
    {
        // Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));

        // Записываем в БД новый хеш авторизации и IP
        mysqli_query($link, "UPDATE login_pass SET hash='".$hash."' WHERE id_doctor='".$data['id_doctor']."'");

        // Ставим куки
        setcookie("id_doctor", $data['id_doctor'], time()+60*60*24*30);
        setcookie("hash", $hash, time()+60*60*24*30,null,null,null,true); // httponly !!!

        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: check.php"); exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
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
    <img src="img/logo2.png" alt="Логотип" height=66 width=200 style="margin:50px auto;display:block">
    <div class="well">
        <legend align="center">Вход в систему</legend>
        <form method="POST" role="form">
            <div class="form-group">
                <label for="login">Логин</label>                
                <input name="login" type="login" class="form-control" id="login" placeholder="Логин">
            </div>
            <div class="form-group">
                <label for="pass">Пароль</label>
                <input name="password" type="password" class="form-control" id="pass" placeholder="Пароль">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Войти</button>
            <a name="register" type="register" class="btn btn-success" href="register.php" style="text-align: right;">Регистрация</a>
        </form>
    </div>
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/jasny-bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>