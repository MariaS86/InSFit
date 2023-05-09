
<?
session_start();
if(isset($_SESSION["is_auth"])) {
 include 'header/headerlog.php';

}
else {
 include 'header/headerauth.php';

}?>


    <div class="container-contact100">
		<div class="contact100-map" id="google_map" data-map-x="61.242298" data-map-y="73.401031" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>

		<div class="wrap-contact100">
			<form action="telegram.php" method="POST" class="contact100-form validate-form">
				<span class="contact100-form-title">
					Для связи с нами заполните форму
				</span>

				<div class="wrap-input100 validate-input" data-validate="Пожалуйста введите ваше имя">
					<input id="name" class="input100" type="text" name="name" placeholder="Имя" value="<?php echo   $_COOKIE['name'];?>" required >
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Пожалуйста введите сообщение">
					<textarea id="message" class="input100" name="message" placeholder="Your Message"></textarea>
					<span class="focus-input100"></span>
				</div>
                <div class="wrap-input100 validate-input" data-validate = "Пожалуйста введите ваш email: e@a.x">
					<input id="email"  class="input100" type="text" name="email" placeholder="Email">
					<span class="focus-input100"></span>
				</div>
				<div class="container-contact100-form-btn">

					<button class="contact100-form-btn">
						Отправить
					</button>
				</div>
			</form>

        </div>
        </div>



    <?php include 'footer.php'; ?>



<!--===============================================================================================-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="telegramform.js"></script>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main0.css">
