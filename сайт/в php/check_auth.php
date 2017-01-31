<?php
session_start();
if(!isset($_SESSION['id_doctor']))
{
    header("Location: index.php"); exit();
}
?>