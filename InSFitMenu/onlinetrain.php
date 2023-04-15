
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
        <a href="onlinetrain.php"><h1>Онлайн тренировки/</h1></a>
        </div>
		<br>

		<ul id="menu7">
			<li><a href='trainselect.php?train=1'>Готовые тренировки</a></li>
			<li><a href='trainselect.php?train=2'>Онлайн тренировки</a></li>
		</ul>

        <div class="onl">
<h1>Расписание онлайн тренровок </h1>
</div>



<?php include 'footer.php'; ?>
