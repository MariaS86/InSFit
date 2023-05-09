<?php header('Content-type: text/html; charset=utf-8'); // задаем кодировку
if (!empty($_POST['email']) && (!empty($_POST['message']))) {
    if  (!empty($_POST['name'])) { //проверяем поля на пустоту
$to = "Sudarikova_ma@edu.surgu.ru" ; // куда отправляем письмо
$mail = 'Почта: '.$_POST['email']; // получаем данные из формы
$text='Сообщение:' .$_POST['message']; // получаем данные из формы
$text = rawurlencode($text);
$name='Имя:' .$_POST['name']; // получаем данные из формы
$message=$mail."\r\n". htmlentities($text); // формируем сообщение
$subject = "Письмо с сайта"; // тема письма
mail($to, $subject, $message); // отправка письма
$token='6096852078:AAFBeC0gAY43nQUaQaTa7KmoDzccR3LhIR8'; // ваш токен телеграм
$chat_id='-985562304'; // ваш id телеграм
if (isset ($token) && ($chat_id)) {
fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text=$mail%0A$name%0A$text","r"); // отправка данных c формы в телеграм
}
echo "Форма отправлена! С вами скоро свяжутся."; // сообщение при отправке
}
} else {
echo "Заполните все поля"; // сообщение при ошибке
}
?>
<script type="text/javascript">
setInterval(function(){ document.location.replace("index.php"); }, 3000);
</script>
