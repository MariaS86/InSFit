<?
session_start();
if(isset($_SESSION["is_auth"])) { 
 include 'header/headerlog.php'; 
	?>

<div class="contacts1">
                <h4>
                    Для связи с нами заполните форму
                </h4>
            </div>
            <form class="form1" id="main_form"  action="javascript:void(0);" autocomplete="off">

				<div class="form-row input-field">
                    <input id="first_name" type="text" class="input" name="FirstName" value="<?php echo   $_COOKIE['name'];?>" required >
           
                </div>
                <div class="form-row input-field">
                    <input id="last_name" type="text" class="input" name="LastName" value="<?php echo   $_COOKIE['surname'];?>"required>
                    
                </div>
                <div class="form-row input-field">
                    <input id="your_email" type="email" class="input" name="email" value="<?php echo   $_COOKIE['mail'];?>"required>
                   
                </div>
                <div class="form-row input-field">
                    <input id="your_phone" type="tel" class="input" name="Phone" pattern="\d{1}\d{3}\d{3}\d{2}\d{2}" minlength="11" maxlength="18" placeholder="Введите номер телефона">
                   
                    <span class="some-form__hint">(Пример:81231231234)</span>
                </div><div class="form-row input-field">
				<select name="country" >
<option value="">Выберите город</option>
<option value="Сургут">Сургут</option>
<option value="Нефтеюганск">Нефтеюганск</option>
<option value="Лянтор">Лянтор</option>
<option value="Нижневартовск">Нижневартовск</option>
<option value="Омск">Омск</option>
<option value="Тюмень">Тюмень</option>
<option value="Москва">Москва</option>
<option value="Санкт-Питербург">Санкт-Питербург</option>
</select></div>
                <div class="form-row input-field">
                    <input id="your_message" type="text" class="input" name="message" autocomplete="new-password" placeholder="Введите сообщение">

                </div>
                <div class="form-row form-row-btn">
                    <button class="submit" id="submit" type="submit" name="submit">Отправить</button>
                </div>
            </form>

</div>
<div class="contacts">

                <h3>
                    КОНТАКТЫ</h3>
				<h4>	Адрес: г. Сургут, ул. Энергетиков, д. 22</h4>
                <h4>	Email: Sudarikova_ma@edu.surgu.ru</h4>
            </div>

  
	<? 
}
else { 
 include 'header/headerauth.php'; 
 ?>
<div class="contacts1">
                <h4>
                    Для связи с нами заполните форму
                </h4>
            </div>
            <form class="form1" id="main_form"  action="javascript:void(0);" autocomplete="off">

				<div class="form-row input-field">
                    <input id="first_name" type="text" class="input" name="FirstName" value="<?php echo   $_COOKIE['name'];?>" required >
           
                </div>
                <div class="form-row input-field">
                    <input id="last_name" type="text" class="input" name="LastName" value="<?php echo   $_COOKIE['surname'];?>"required>
                    
                </div>
                <div class="form-row input-field">
                    <input id="your_email" type="email" class="input" name="email" value="<?php echo   $_COOKIE['mail'];?>"required>
                   
                </div>
                <div class="form-row input-field">
                    <input id="your_phone" type="tel" class="input" name="Phone" pattern="\d{1}\d{3}\d{3}\d{2}\d{2}" minlength="11" maxlength="18" placeholder="Введите номер телефона">
                   
                    <span class="some-form__hint">(Пример:81231231234)</span>
                </div><div class="form-row input-field">
				<select name="country" >
<option value="">Выберите город</option>
<option value="Сургут">Сургут</option>
<option value="Нефтеюганск">Нефтеюганск</option>
<option value="Лянтор">Лянтор</option>
<option value="Нижневартовск">Нижневартовск</option>
<option value="Омск">Омск</option>
<option value="Тюмень">Тюмень</option>
<option value="Москва">Москва</option>
<option value="Санкт-Питербург">Санкт-Питербург</option>
</select></div>
                <div class="form-row input-field">
                    <input id="your_message" type="text" class="input" name="message" autocomplete="new-password" placeholder="Введите сообщение">

                </div>
                <div class="form-row form-row-btn">
                    <button class="submit" id="submit" type="submit" name="submit">Отправить</button>
                </div>
            </form>

</div>
<div class="contacts">
                <h3>
                    КОНТАКТЫ</h3>
				<h4>	Адрес: г. Сургут, ул. Энергетиков, д. 22</h4>
                <h4>	Email: Sudarikova_ma@edu.surgu.ru</h4>
            </div>

<?
}?>

  
<?php include 'footer.php'; ?>  