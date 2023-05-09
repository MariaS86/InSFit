<?php
    session_start(["use_strict_mode" => true]);
    require('dbconnect.php');

    unset($_SESSION['message']);

    if ($_GET['train'] == 1){
    include 'donetrain.php';
    }
    if ($_GET['train'] == 2){
    include 'onlinetrain.php';
    }

    $host = 'localhost';  // Хост, у нас все локально
    $user = 'root';    // Имя созданного вами пользователя
    $pass = ''; // Установленный вами пароль пользователю
    $db_name = 'inshinefit';   // Имя базы данных
    $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

    // Ругаемся, если соединение установить не удалось
    if (!$link) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }
    if ($_GET['id']){
    // $sql = mysqli_query($link, 'SELECT `id`, `idtypeofworkout`, `name`, `timeworkout`,`img` FROM `workout`');

    include 'category.php';
    }


?>
