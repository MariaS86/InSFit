
<?include 'header/headerauth.php';?>
    <div class="container4">
        <form method="post" action="auth.php">
<h1>НОВЫЙ ПАРОЛЬ</h1>
<input  name="password" id="password" type="text" placeholder="Пароль" required value="" /><br/>
<input  name="password_2" id="password_2" type="text" placeholder="Повторите пароль" required value="" /><br/>

<!-- <input  name="status" id="id3" type="text" placeholder="Введите свой статус"  />
<br/>
<p class="text1">Заполняется только для сотрудников</p>
<br/> -->
<input type="submit" value="Изменить" />


        </form>
        <p class="regtext1">Еще не зарегистрированы?<a href= "registr.php" class="regtext5">&nbsp;Регистрация</a></p>
        <p class="regtext1">Войти в аккаунт<a href= "index.php" class="regtext5">&nbsp;Восстановить</a></p>

</div>
