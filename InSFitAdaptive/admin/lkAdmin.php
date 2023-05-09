<!doctype html>
<html lang="ru">
<head>
  <title>Админ-панель</title>
</head>
<body>
  <?php
  include 'header/headeradmin.php';
?>
<?php
    session_start(["use_strict_mode" => true]);

if  ($_SESSION['roleid'] == 1) { //проверка на админа
$adm="Администратор";
     }
     ?>
<div class="containeradm">
<form method="POST">
    <br>
<h1>ЛИЧНЫЙ КАБИНЕТ</h1>
<p class="regtext1">Фамилия</p><a class="regtext"><?print " ".$_SESSION['surname']." ";?></a>
<p class="regtext1">Имя</p><a class="regtext"><?print " ".$_SESSION['name']." ";?></a>
<p class="regtext1">Отчество</p><a class="regtext">  <?print " ".$_SESSION['patronymic']." ";?></a></p>
<p class="regtext1">Email</p><a class="regtext"><?print " ".$_SESSION['email']." ";?></a></p>
<p class="regtext1">Логин</p><a class="regtext"><?print " " .$_SESSION['username']." ";?></a></p>
<p class="regtext1">Роль</p><a class="regtext"><?print " " .$adm." ";?></a></p>
<a href='auth.php?logout=1'class="regtext2">Выйти</a>
    </form>
</div>
