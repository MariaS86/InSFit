
<?
session_start();
if(isset($_SESSION["is_auth"])) {
 include 'header/headerlog.php';

}
else {
 include 'header/headerauth.php';

}?>
<link rel="stylesheet" href="css/train0.css" id="theme-link" >

        <div class="submenu">
        <a href="onlinetrain.php"><h1>Онлайн тренировки/</h1></a>
        </div>
		<br>

		<ul id="menu7">
			<li><a href='trainselect.php?train=1'>Готовые тренировки</a></li>
			<li><a href='trainselect.php?train=2'>Онлайн тренировки</a></li>
		</ul>

        <div class="onl">
<h1>Расписание трансляций</h1>
</div>
 <!-- <div class="video1">
<iframe allowfullscreen="" frameborder="0"  src="//www.youtube.com/embed/live_stream?channel=0VisozVko_3xShQdKt-9LA&autoplay=1" ></iframe>
</div> -->

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
   $sql = mysqli_query($link, 'SELECT `id`, `name`, `time`, `url` FROM `schedule`');

   while ($result = mysqli_fetch_array($sql)) {
       // echo "<a href='trainselect.php?id=$result[id]'> <h5><span>".$result['name']."</span></h5></a>";
?>

<a href='onl.php?id=<?=$result['id']?>'><img src="/imagesonl/<?=$result['id']?>.jpg" width = 100% height = 100% /><h5><span><?= $result['name']; ?> в <?= $result['time']; ?></span></h5></a>
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

<?php include 'footer.php'; ?>
