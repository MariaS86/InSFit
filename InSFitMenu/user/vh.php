
<style>

.containerA{
    background-image: url(img/fon5.jpg);
    background-size: cover;
}

</style>
    <div class="containerA">
        <form class="c4" method="post" action="auth.php">
            <br/>
<h3>ВХОД</h3>
<label for="login">Имя пользователя</label>
<input  name="login" id="id1" type="login"  required
value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : $_COOKIE['login']; // Заполняем поле по умолчанию ?>" />
<br/>


<label for="password">Пароль</label>
<input name="password" id="id2" type="password" required value="" />
<!-- <input  name="status" id="id3" type="text" placeholder="Введите свой статус"  />
<br/>
<p class="text1">Заполняется только для сотрудников</p>
<br/> -->
<input type="submit" value="Войти" />

<p class="regtext1">Еще не зарегистрированы?<a href= "registr.php" class="regtext5">&nbsp;Регистрация</a></p>
<p class="regtext1">Забыли пароль<a href= "#" class="regtext5">&nbsp;Восстановить</a></p>

        </form>
        <br><br><br>

</div>
