
<?
session_start();
if(isset($_SESSION["is_auth"])) {
 include 'header/headerlog.php';

}
else {
 include 'header/headerauth.php';

}?>
<link rel="stylesheet" href="css/train0.css" id="theme-link" >

	<br>
		<ul id="menu7">
			<li><a href='trainselect.php?train=1'>Готовые тренировки</a></li>
			<li><a href='trainselect.php?train=2'>Онлайн тренировки</a></li>
		</ul>


<div class="categorydone">
    <h1> Выберите цель: </h1>
</div>

  <div class="macmenu">
 <div class="button">
     <div class="but">
     <?
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
     $sql = mysqli_query($link, 'SELECT `id`, `name`,`img` FROM `typeofworkout`');

     while ($result = mysqli_fetch_array($sql)) {

 ?>

 <a href='category.php?id=<?=$result['id']?>'><img src="/imagescat/<?=$result['img']?>.jpg" width = 100% height = 100% /><h5><span><?= $result['name']; ?></span></h5></a>
     <?
     }

     ?>
     <style>
     .but img {
opacity: 1;
}
.but img:hover {
 opacity: 0.7;
}
</style>
     </div>


 </div>
</div>
<style>


</style>
<?php include 'footer.php'; ?>
