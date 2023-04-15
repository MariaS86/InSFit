
<?
session_start();
if(isset($_SESSION["is_auth"])) {
 include 'header/headerlog.php';

}
else {
 include 'header/headerauth.php';

}?>
<link rel="stylesheet" href="css/train.css" id="theme-link" >

        <div class="submenu">
        <a href="donetrain.php"><h1>Готовые тренировки/</h1></a>
        </div>

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
       <a href='trainselect.php?train=3'><img src="img/train.jpg" width = 100% height = 100%><h5>Похудение</h5></a>
     </div>
     <div class="but">
       <a href='trainselect.php?train=3'><img src="img/strach.jpg" width = 100% height = 100%><h5>Гибкость</h5></a>
     </div>
     <div class="but">
       <a href='trainselect.php?train=3'><img src="img/train1.jpg" width = 100% height = 100%><h5>Сила</h5></a>
     </div>
     <div class="but">
       <a href='trainselect.php?train=3'><img src="img/train2.jpg" width = 100% height = 100%><h5>Разминка</h5></a>
     </div>

 </div>
</div>
<style>


</style>
<?php include 'footer.php'; ?>
