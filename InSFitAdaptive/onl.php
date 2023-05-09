
<?
session_start();
if(isset($_SESSION["is_auth"])) {
 include 'header/headerlog.php';

}
else {
 include 'header/headerauth.php';

}?>
<link rel="stylesheet" href="css/train0.css" id="theme-link" >


        <!-- <div class="submenu">
        <a href="donetrain.php"><h1>Готовые тренировки/</h1></a>
        </div> -->

        <br>
<!--
        <ul id="menu7">
            <li><a href='trainselect.php?train=1'>Готовые тренировки</a></li>
            <li><a href='trainselect.php?train=2'>Онлайн тренировки</a></li>
        </ul> -->



  <div class="macmenu">
 <!-- <div class="button1">
     <div class="but1"> -->
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
//передаемм id выбранной тренировки
     $s=$_GET['id'];
     $sql2 = mysqli_query($link, "SELECT `name` FROM `schedule` WHERE `id`=$s");

          while ($result2 = mysqli_fetch_array($sql2)) {
 ?><div class="categorydone">
 </div>
 <div class="submenu">
 <a href="donetrain.php"><h1>Тренировки/</h1></a>
 </div>
 <div class="work">
 <h1><?= $result2['name']; ?></h1>
 <style>
.hr {
margin: -30px auto 10px;
padding: 0;
height: 50px;
border: none;
border-bottom: 1px solid #1f1209;
box-shadow: 0 20px 20px -20px #333;
width: 40%;
transform:rotate(2deg);
}
</style>
 <hr class="hr">
</div>
      <?
          }

     $sql = mysqli_query($link, "SELECT `id`, `name`, `time`, `url`, `quant` FROM `schedule` WHERE `id`=$s");

          while ($result = mysqli_fetch_array($sql)) {?>


              <br>
              <?
if ($result['url']!='') {
              ?>
              <h1></h1>

              <div class="video">
              <iframe allowfullscreen="" frameborder="0"  src="//www.youtube.com/embed/live_stream?channel=<?=$result['url']?>&autoplay=1" ></iframe>
              </div>
              <div class="onl">
              <h1>Начало: <?=$result['time']?></h1>
              </div>
              <div class="onl">
              <h1>Длительность: <?=$result['quant']?></h1>
              </div>
              <?
              }
              ?>
              <br>

              <style>
  .hr1 {
      margin: -30px auto 10px;
  	padding: 0;
  	height: 50px;
  	border: none;
  	border-bottom: 1px solid #1f1209;
  	box-shadow: 0 20px 20px -20px #333;
  	width: 95%;
    transform:rotate(-2deg);
  }
 </style>
              <hr class="hr1">
        <?
                  }

?>


</div>

<style>


</style>
<?php include 'footer.php'; ?>
