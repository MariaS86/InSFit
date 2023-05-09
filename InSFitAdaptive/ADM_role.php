<!doctype html>
<html lang="ru">
<head>
  <title>Админ-панель</title>
</head>
<body>
  <?php
  include 'header/headeradmin.php';
?>
  <?php
    $host = 'localhost';  // Хост, у нас все локально
    $user = 'root';    // Имя созданного вами пользователя
    $pass = ''; // Установленный вами пароль пользователю
    $db_name = 'inshinefit';   // Имя базы данных
    $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

    // Ругаемся, если соединение установить не удалось
    if (!$link) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }

    //Если переменная Name передана
        if (isset($_POST["id"])) {
    if (isset($_POST["name"])) {
      //Если это запрос на обновление, то обновляем
      if (isset($_GET['red_id'])) {
          $sql = mysqli_query($link, "UPDATE `role` SET `id` = '{$_POST['id']}',`name` = '{$_POST['name']}' WHERE `id`={$_GET['red_id']}");
      } else {
          //Иначе вставляем данные, подставляя их в запрос
          $sql = mysqli_query($link, "INSERT INTO `role` ( `id`,`name`) VALUES ( '{$_POST['id']}','{$_POST['name']}')");
      }

      //Если вставка прошла успешно
      if ($sql) {
        echo '<p>Успешно!</p>';
        header("Location: ADM_role.php");
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }
}

    if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
      //удаляем строку из таблицы
      $sql = mysqli_query($link, "DELETE FROM `role` WHERE `id` = {$_GET['del_id']}");
      if ($sql) {
        echo "<p>Запись удалена.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($link, "SELECT  `id`, `name` FROM `role` WHERE `id`={$_GET['red_id']}");
      $product = mysqli_fetch_array($sql);
    }
  ?>

<div id="content">
    <div class="formredact4">
<form class="redact4" action="" method="post">
    <table>
        <tr>
          <td>Идентификатор:</td>
          <td><input type="text" name="id" value="<?= isset($_GET['red_id']) ? $product['id'] : ''; ?>"></td>
        </tr>
      <tr>
        <td>Название:</td>
        <td><input type="text" name="name" value="<?= isset($_GET['red_id']) ? $product['name'] : ''; ?>"></td>
      </tr>


      <tr>
        <td colspan="2"><input type="submit" value="Сохранить"></td>
      </tr>
    </table>
  </form>
</div>
<div class="cont">
  <table class="exer" border='1'>
       <thead>
    <tr>
      <th>Идентификатор</th>
      <th>Название</th>
      <th>Удаление</th>
      <th>Редактирование</th>
    </tr>
</thead>
    <?php

$sql = mysqli_query($link, 'SELECT `id`, `name`FROM `role`');

      while ($result = mysqli_fetch_array($sql)) {
        echo '<tr>' .
             "<td data-label='Идентификатор'>{$result['id']}</td>" .
             "<td data-label='Название'>{$result['name']}</td>" .
             "<td ><a href='?del_id={$result['id']}'>Удалить</a></td>" .
             "<td><a href='?red_id={$result['id']}'>Изменить</a></td>" .
             '</tr><br><br><br><br><br>';
      }
    ?>
  </table>
  </div>
   </div>
  <?include 'footer.php';?>
</body>
</html>
