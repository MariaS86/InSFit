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
    if (isset($_POST["name"])) {
      //Если это запрос на обновление, то обновляем
      if (isset($_GET['red_id'])) {
          $sql = mysqli_query($link, "UPDATE `workout` SET `id` = '{$_POST['id']}',`idtypeofworkout` = '{$_POST['idtypeofworkout']}',`name` = '{$_POST['name']}',`timeworkout` = '{$_POST['timeworkout']}' WHERE `id`={$_GET['red_id']}");
      } else {
          //Иначе вставляем данные, подставляя их в запрос
          $sql = mysqli_query($link, "INSERT INTO `workout` ( `id`, `idtypeofworkout`, `name`, `timeworkout`) VALUES ( '{$_POST['id']}','{$_POST['idtypeofworkout']}', '{$_POST['name']}', '{$_POST['timeworkout']}')");
      }

      //Если вставка прошла успешно
      if ($sql) {
        echo '<p>Успешно!</p>';
          header("Location: ADM_work.php");
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
      //удаляем строку из таблицы
      $sql = mysqli_query($link, "DELETE FROM `workout` WHERE `id` = {$_GET['del_id']}");
      if ($sql) {
        echo "<p>Запись удалена.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($link, "SELECT  `id`, `idtypeofworkout`, `name`, `timeworkout` FROM `workout` WHERE `id`={$_GET['red_id']}");
      $product = mysqli_fetch_array($sql);
    }
  ?>

<div id="content">
    <div class="formredact6">
<form class="redact6" action="" method="post">
    <table>
        <tr>
          <td>Идентификатор:</td>
          <td><input type="text" name="id" value="<?= isset($_GET['red_id']) ? $product['id'] : ''; ?>"></td>
        </tr>
      <tr>
        <td>Идентификатор категории:</td>
        <td><input type="text" name="idtypeofworkout" value="<?= isset($_GET['red_id']) ? $product['idtypeofworkout'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Название:</td>
        <td><input type="text" name="name" value="<?= isset($_GET['red_id']) ? $product['name'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Время:</td>
        <td><input type="text" name="timeworkout" value="<?= isset($_GET['red_id']) ? $product['timeworkout'] : ''; ?>"></td>
      </tr>

      <tr>
        <td colspan="2"><input type="submit" value="Сохранить"></td>
      </tr>
    </table>
  </form>
</div>
  <table class="exer" border='1'>
    <tr>
      <td>Идентификатор</td>
      <td>Идентификатор категории</td>
      <td>Название</td>
      <td>Время</td>
      <td>Удаление</td>
      <td>Редактирование</td>
    </tr>
    <?php

$sql = mysqli_query($link, 'SELECT `id`, `idtypeofworkout`, `name`, `timeworkout` FROM `workout`');

      while ($result = mysqli_fetch_array($sql)) {
        echo '<tr>' .
             "<td>{$result['id']}</td>" .
             "<td>{$result['idtypeofworkout ']}</td>" .
             "<td>{$result['name']}</td>" .
             "<td>{$result['timeworkout']} </td>" .
             "<td><a href='?del_id={$result['id']}'>Удалить</a></td>" .
             "<td><a href='?red_id={$result['id']}'>Изменить</a></td>" .
             '</tr>';
      }
    ?>
  </table>
  </div>
  <?include 'footer.php';?>
</body>
</html>
