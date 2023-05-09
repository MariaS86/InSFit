
<?
session_start();
if(isset($_SESSION["is_auth"])) {
 include 'header/headerlog.php';

}
else {
 include 'header/headerauth.php';

}?>
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

$s=$_GET['id'];
?>
<link rel="stylesheet" href="css/train0.css" id="theme-link" >


        <!-- <div class="submenu">
        <a href="donetrain.php"><h1>Готовые тренировки/</h1></a>
        </div> -->

        <br>
        <?
            $sql1 = mysqli_query($link, "SELECT `name` FROM `typeofworkout` WHERE `id`=$s");

                 while ($result1 = mysqli_fetch_array($sql1)) {
        ?>
<!--
        <ul id="menu7">
            <li><a href='trainselect.php?train=1'>Готовые тренировки</a></li>
            <li><a href='trainselect.php?train=2'>Онлайн тренировки</a></li>
        </ul> -->

        <div class="submenu">
        <a href="donetrain.php"><h1>Тренировки/</h1></a>
        </div>
        <div class="work">
        <h1><?= $result1['name']; ?></h1>
       </div>
       <?
   }
       ?>
  <div class="macmenu">
 <div class="button1">
     <div class="but1">




<? $sql = mysqli_query($link, "SELECT `id`, `idtypeofworkout`, `name`, `timeworkout`,`img` FROM `workout` WHERE `idtypeofworkout`=$s");

     while ($result = mysqli_fetch_array($sql)) {
         // echo "<a href='trainselect.php?id=$result[id]'> <h5><span>".$result['name']."</span></h5></a>";
 ?>

 <a href='work.php?id=<?=$result['id']?>'><img src="/imageswg/<?=$result['img']?>.jpg" width = 100% height = 100% /><h5><span><?= $result['name']; ?></span></h5></a>
     <?
     }

     ?>
     </div>
     <style>
     .but1 img {
opacity: 1;
}
.but1 img:hover {
 opacity: 0.7;
}
</style>


 </div>
</div>
<style>


</style>
<?php include 'footer.php'; ?>
