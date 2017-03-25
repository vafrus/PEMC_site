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
        <?php
            //Если не авторизованы
            session_start();
            if(!isset($_SESSION['id_doctor'])) {
                echo    '<legend align="center">Вход в систему</legend>
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
                        </form>';

                // Соединямся с БД
                $link=mysqli_connect("localhost", "root", "12369", "medspace");
                mysqli_set_charset($link, "utf8");

                //Проверка на авторизацию и выдача сообщения ($_SESSION['err'] задается в check_auth.php)
                if(isset($_SESSION['err']))
                {
                    echo '<div class="alert alert-danger">' . $_SESSION['err'] . '</div>';
                    unset($_SESSION['err']);
                }
                
                if(isset($_POST['submit']))
                {
                    // Вытаскиваем из БД запись, у которой логин равняеться введенному
                    $query = mysqli_query($link,"SELECT id_doctor, pass FROM login_pass WHERE login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
                    $data = mysqli_fetch_assoc($query);
                    // Сравниваем пароли
                    if($data['pass'] === md5(md5($_POST['password'])))
                    {               
                        session_start();
                        $_SESSION['id_doctor'] = $data['id_doctor'];

                        // Переадресовываем браузер на страницу проверки нашего скрипта
                        header("Location: check.php"); exit();
                    }
                    else
                    {
                        echo '<div class="alert alert-danger">Вы ввели неправильный логин/пароль</div>';
                    }
                }
            }
            else 
            {
                echo 
                '<legend align="center">Вы авторизованы</legend>
                <form method="POST" role="form">
                    <div class="text-center">
                        <a class="btn btn-primary" href="doctor.php">Профиль</a>
                        <button name="logout" type="submit" class="btn btn-danger">Выйти</button>
                    </div>
                </form>';
            }
            if (isset($_POST['logout'])) {
                unset($_SESSION['id_doctor']);
                session_destroy();
                header("Location: index.php"); exit();
            }
        ?>
    </div>
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/jasny-bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>