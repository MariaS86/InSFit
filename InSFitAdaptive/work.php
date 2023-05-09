
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
     $sql2 = mysqli_query($link, "SELECT `name` FROM `workout` WHERE `id`=$s");

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

//подключаем таблицу с количеством
    $sql1 = mysqli_query($link, "SELECT `id`, `idworkout`, `idexercise`, `quantity` FROM `quantityofexercise` WHERE `idworkout`=$s");

         while ($result1 = mysqli_fetch_array($sql1)) {
?>
<!-- <div class="ex">
<h1>Упражнение:</h1>
</div> -->
<!-- достали данные о количестве -->
<?
if ($result1['quantity']!='') {
?>

<?
}
?>
     <?
     $ex= $result1['idexercise'];
     $sql = mysqli_query($link, "SELECT `id`, `name`, `technique`, `resource`,`measure` FROM `exercise` WHERE `id`=$ex");

          while ($result = mysqli_fetch_array($sql)) {?>
<div class="names"><?
if ($result['name']!='') {
              ?>

              <br>
              <h1>Упражнение: <?= $result['name']; ?></h1>

              <?
          }
          ?>
          </div>
              <br>
              <div class="techniq">
              <?
if ($result['technique']!='') {
              ?>
              <h1>Техника: <?= $result['technique']; ?></h1>
              <h1>
                 Выполняйте данное упражение <?= $result1['quantity']; ?> <?= $result['measure']; ?>.
              </h1>
              <?
          }
          ?>

          </div>
              <br>
              <div class="video">
              <?
if ($result['resource']!='') {
              ?>
              <h1></h1>
              <iframe  src="<?=$result['resource']?>"
              title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write;
              encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

              <?
              }
              ?>
          </div>
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
         }
?>


     <!-- </div>
 </div> -->
</div>
<style>


</style>
<?php include 'footer.php'; ?>
