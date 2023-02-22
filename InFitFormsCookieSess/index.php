
<?
// Страница авторизации
?>
	<?php
session_start(); //Запускаем сессии
 
class AuthClass {
    private $_login = "11"; 
    private $_password = "11"; 
	private $_surname = "Сударикова"; 
	private $_name = "Мария"; 
	private $_patronymic = "Александровна"; 
	private $_email = "Sudarikova_ma@edu.surgu.ru"; 
    /*авторизован пользователь или нет*/
    public function isAuth() {
        if (isset($_SESSION["is_auth"])) { 
            return $_SESSION["is_auth"]; 
        }
        else return false; 
    }
     
    /* Авторизация пользователя*/
    public function auth($login, $passwors) {
        if ($login == $this->_login && $passwors == $this->_password) { 
            $_SESSION["is_auth"] = true; 
            $_SESSION["login"] = $login; 
			$_SESSION["name"] = $this->_name;
			$_SESSION["surname"] = $this->_surname;
			$_SESSION["patronymic"] = $this->_patronymic;
			$_SESSION["email"] = $this->_email;
			$surname=$this->_surname;
			$name=$this->_name;
			$patronymic=$this->_patronymic;
			$email=$this->_email;
			/*получем куки для заполнения форм*/
	  setcookie("login", $login);
      setcookie("pass", $passwors);
	  setcookie("surname", $surname);
	  setcookie("name", $name);
      setcookie("patronymic", $patronymic);
	  setcookie("email", $email);
		
            return true;
        }
        else { 
            $_SESSION["is_auth"] = false;
            return false; 
        }
    }
     
    public function getLogin() {
        if ($this->isAuth()) {
            return $_SESSION["login"]; 
			
        }
    }
      public function getName() {
        if ($this->isAuth()) { 
             
			return $_SESSION["name"];
        }
    }   
        public function getSurname() {
        if ($this->isAuth()) { 
             
			return $_SESSION["surname"];
        }
    }   
        public function getPatronymic() {
        if ($this->isAuth()) { 
             
			return $_SESSION["patronymic"];
        }
    }   
        public function getEmail() {
        if ($this->isAuth()) { 
             
			return $_SESSION["email"];
        }
    }        
    public function out() {
        $_SESSION = array(); 
        session_destroy(); 
    }
}
 
$auth = new AuthClass();
 
if (isset($_POST["login"]) && isset($_POST["password"])) { 
    if (!$auth->auth($_POST["login"], $_POST["password"])) { 
        echo "Логин или пароль введен не правильно!</h2>";
    }
}
 
if (isset($_GET["is_exit"])) { 
    if ($_GET["is_exit"] == 1) {
		setcookie("login",$_COOKIE, time()+60*60*24);//Храним кукс с логином сутки (для автозаполнения)
	  
	  $auth->out(); //Выходим
	  setcookie("pass", "", time()-9999);//уничтожение кукис с данными с помощью браузера
	  setcookie("surname", "", time()-9999);
	  setcookie("name", "", time()-9999);
	  setcookie("patronymic", "", time()-9999);
	  setcookie("email", "", time()-9999);

  header("Location: ?is_exit=0"); //Редирект после выхода
    }
	else{
	
	}
}
 
?>
<?php 
if ($auth->isAuth()) {  
    include 'header/headerlog.php'; 

	 ?>
	<div class="container1">
	<form method="POST">
<h1>ЛИЧНЫЙ КАБИНЕТ</h1>
<p class="regtext1">Фамилия</p><a class="regtext"><?print " ".$auth->getSurname()." ";?></a>	
<p class="regtext1">Имя</p><a class="regtext"><?print " ".$auth->getName()." ";?></a>	
<p class="regtext1">Отчество</p><a class="regtext">  <?print " ".$auth->getPatronymic()." ";?></a></p>	
<p class="regtext1">Email</p><a class="regtext"><?print " ".$auth->getEmail()." ";?></a></p>	
<p class="regtext1">Логин</p><a class="regtext"><?print " " .$auth->getLogin()." ";?></a></p>	

<p><a href='?is_exit=1' class="regtext2">Выйти</a></p>	
</form>
    </div>
    <div class="container2">
      <h1>ИМТ КАЛЬКУЛЯТОР</h1>
      <div class="display">
	  <div class="display1"><p>Результат</p></div>
                <p id="result">20.0</p>
                <p id="category">Нормальный вес 😍</p>
      </div>
        <div class="row">
            <input type="range" min="20" max="200" value="20" id="weight" oninput="calculate()">
            <span id="weight-val">20 кг</span>
        </div>
        <div class="row">
            <input type="range" min="100" max="250" value="100" id="height" oninput="calculate()">
            <span id="height-val">100 см</span>
        </div>


    </div>
<?php include 'footer.php'; ?> 
    <!--Скрипт для калькулятора-->
    <script type="text/javascript">
function calculate(){
    var bmi;
    var result = document.getElementById("result");

    var weight = parseInt(document.getElementById("weight").value);
    document.getElementById("weight-val").textContent = weight + " кг";

    var height = parseInt(document.getElementById("height").value);
    document.getElementById("height-val").textContent = height + " см";

    bmi = (weight / Math.pow( (height/100), 2 )).toFixed(1);
    result.textContent = bmi;

    if(bmi < 18.5){
        category = "Недостаточный вес 😒";
        result.style.color = "#ffc44d";
    }
    else if( bmi >= 18.5 && bmi <= 24.9 ){
        category = "Нормальный вес 😍";
        result.style.color = "#0be881";
    }
    else if( bmi >= 25 && bmi <= 29.9 ){
        category = "Избыточный вес 😮";
        result.style.color = "#ff884d";
    }
    else{
        category = "Ожирение 😱";
        result.style.color = "#ff5e57";
    }
    document.getElementById("category").textContent = category;
}
    </script>	
	
		<?  include 'footer.php';  
} 
else { 
?>
<?php include 'header/headerauth.php'; 
?>
	<div class="container4">
<form method="post" action="">
<h1>ВХОД</h1>
    <input  name="login" type="text" placeholder="Введите свой логин" required
    value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : $_COOKIE['login']; // Заполняем поле по умолчанию ?>" />
    <br/>
   <input name="password" type="password" placeholder="Введите пароль" required value="" /><br/>
    <input type="submit" value="Войти" />
	
</form>
<p class="regtext1">Еще не зарегистрированы?<a href= "registr.php" class="regtext5">&nbsp;Регистрация</a></p>

</div>
<?php 
}
?>
<?php include 'footer.php'; ?>  