<?php
session_start();
?>
<?php include 'header/headerreg.php'; 
?>

        <!--контент-->
    <div class="container1">
	
	<?php 
// Страница регистрации нового пользователя

// Соединямся с БД
$link=mysqli_connect('localhost', 'root', '', 'reg');

if(isset($_POST['submit']))
{
    $err = [];

        // проверям фамилию
    if(!preg_match("/^[a-zA-Zа-яА-Я]+$/ui",$_POST['surname']))
    {
        $err[] = "Фамилия может состоять только из букв русского и английского алфавита";
    }
	    // проверям имя
    if(!preg_match("/^[a-zA-Zа-яА-Я]+$/ui",$_POST['name']))
    {
        $err[] = "Имя может состоять только из букв русского и английского алфавита";
    }
		// проверям отчество
  /*  if(!preg_match("/^[a-zA-Zа-яА-Я]+$/ui",$_POST['patronymic']))
    {
        $err[] = "Отчество может состоять только из букв русского алфавита";
    }*/
		// проверям email
    if(!preg_match("/[0-9a-z]+@[a-z]/",$_POST['email']))
    {
        $err[] = "Email олжен соответсвовать формату имя_пользователя@_._ (Пример: IvanovIvan@mail.ru)";
    }
	// проверям логин
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT id FROM users WHERE login='".mysqli_real_escape_string($link, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }
    $query = mysqli_query($link, "SELECT id FROM users WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким email уже существует в базе данных";
    }
    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {

        $login = $_POST['login'];
		$email = $_POST['email'];
		$surname = $_POST['surname'];
		$name = $_POST['name'];
		$patronymic = $_POST['patronymic'];
        // Убераем лишние пробелы и делаем двойное хеширование
        $password = md5(md5(trim($_POST['password'])));

        mysqli_query($link,"INSERT INTO users SET surname='".$surname."',name='".$name."',patronymic='".$patronymic."',email='".$email."', login='".$login."', password='".$password."'");
        header("Location: index.php"); exit();
    }
    else
    {
        echo( "<p style='color: red; text-align: center'>"."<b>При регистрации произошли следующие ошибки:</b><br>"."</p>");
		foreach($err AS $error)
        {
			echo( "<p style='color: red; text-align: center'>".$error."</p>");
        }
    }
}
?>

<form method="POST">
<h1>РЕГИСТРАЦИЯ</h1>
<input type="text" name="surname" placeholder="Введите фамилию *"required>
<input type="text" name="name" placeholder="Введите имя *"required>
<input type="text" name="patronymic" placeholder="Введите отчество">
<input type="email" name="email" placeholder="Введите свой Email *"required>
<input name="login" type="text" placeholder="Введите логин *" required><br>
<input name="password" type="password" placeholder="Введите пароль *" required><br>

<input name="submit" type="submit" class="custom-btn btn-1" value="Зарегистрироваться">

<p class="regtext1">У вас уже есть аккаунт?<a href= "index.php" class="regtext">&nbsp;Войти</a></p>	
</form>
    </div>
    </div>

<?php include 'footer.php'; ?>  