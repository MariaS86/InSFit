<?php
    session_start(["use_strict_mode" => true]);


    if (isset($_SESSION['username'])) {
        include 'header/headerlog.php';


        ?>
        <div class="container1">
        <form method="POST">
        <h1>ЛИЧНЫЙ КАБИНЕТ</h1>
        <p class="regtext1">Фамилия</p><a class="regtext"><?print " ".$_SESSION['surname']." ";?></a>
        <p class="regtext1">Имя</p><a class="regtext"><?print " ".$_SESSION['name']." ";?></a>
        <p class="regtext1">Отчество</p><a class="regtext">  <?print " ".$_SESSION['patronymic']." ";?></a></p>
        <p class="regtext1">Email</p><a class="regtext"><?print " ".$_SESSION['email']." ";?></a></p>
        <p class="regtext1">Логин</p><a class="regtext"><?print " " .$_SESSION['username']." ";?></a></p>

<a href='auth.php?logout=1'class="regtext2">Выйти</a>
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

        ?>

<?php }
    else{
include 'header/headerauth.php';    ?>

    <div class="container4">
        <form method="post" action="auth.php">
<h1>ВХОД</h1>
<input  name="login" id="id1" type="text" placeholder="Введите свой логин" required
value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : $_COOKIE['login']; // Заполняем поле по умолчанию ?>" />
<br/>
<input name="password" id="id2" type="password" placeholder="Введите пароль" required value="" /><br/>
<input type="submit" value="Войти" />


        </form>
        <p class="regtext1">Еще не зарегистрированы?<a href= "registr.php" class="regtext5">&nbsp;Регистрация</a></p>

</div>
<?php }
echo ("<p style='color: red'>".$_SESSION['message']."</p>");
unset($_SESSION['message']);

    ?>
