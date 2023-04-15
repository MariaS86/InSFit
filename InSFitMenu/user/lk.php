
<style>

.container1{
    background-image: url(img/fon5.jpg);
    background-size: cover;
}
</style>
<link rel="stylesheet" href="css/formlk.css" id="theme-link" >

<div class="container1">
<form class="clog"method="POST">
    <br>
<h1>ЛИЧНЫЙ КАБИНЕТ</h1>

<p class="regtext1">Фамилия</p>
<div class="containerlk">
<a class="regtext"><?print " ".$_SESSION['surname']." ";?></a>
</div>
<p class="regtext1">Имя</p>
<div class="containerlk">
<a class="regtext"><?print " ".$_SESSION['name']." ";?></a>
</div>
<p class="regtext1">Отчество</p>
<div class="containerlk">
<a class="regtext">  <?print " ".$_SESSION['patronymic']." ";?></a></p>
</div>
<p class="regtext1">Email</p>
<div class="containerlk">
<a class="regtext"><?print " ".$_SESSION['email']." ";?></a></p>
</div>
<p class="regtext1">Логин</p>
<div class="containerlk">
<a class="regtext"><?print " " .$_SESSION['username']." ";?></a></p>
</div>
<!--
<a href="redactpas.php">Изменить пароль</a> -->
<div class="container-contact100-form-btn">
<a href='auth.php?logout=1'class="regtextlk">Выйти</a>
</div>


    </form>
</div>
<div class="containerwes">
    <style>.containerwes{border-radius: 10px;}</style>
    <!-- <video autoplay muted loop width="500" height="400" id="myVideo">
  <source src="video/mem.mp4" type="video/mp4">
</video> -->
<br><br>
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
