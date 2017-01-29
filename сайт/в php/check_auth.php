<?php

if(!$_COOKIE['hash'] or !$_COOKIE['id_doctor'])
{
    header("Location: index.php"); exit();
}

?>