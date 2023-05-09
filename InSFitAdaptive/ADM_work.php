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
          $sql = mysqli_query($link, "UPDATE `workout` SET `id` = '{$_POST['id']}',`idtypeofworkout` = '{$_POST['idtypeofworkout']}',`name` = '{$_POST['name']}',`timeworkout` = '{$_POST['timeworkout']}',`img` = '{$_POST['img']}' WHERE `id`={$_GET['red_id']}");
      } else {
          //Иначе вставляем данные, подставляя их в запрос
          $sql = mysqli_query($link, "INSERT INTO `workout` ( `id`, `idtypeofworkout`, `name`, `timeworkout`, `img`) VALUES ( '{$_POST['id']}','{$_POST['idtypeofworkout']}', '{$_POST['name']}', '{$_POST['timeworkout']}','{$_POST['img']}')");
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
      $sql = mysqli_query($link, "SELECT  `id`, `idtypeofworkout`, `name`, `timeworkout`, `img` FROM `workout` WHERE `id`={$_GET['red_id']}");
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
        <td>Название изображения:</td>
        <td><input type="text" name="img" value="<?= isset($_GET['red_id']) ? $product['img'] : ''; ?>"></td>
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
      <th>Идентификатор категории</th>
      <th>Название категории</th>
      <th>Название</th>
      <th>Время</th>
      <th>Название изображения</th>
      <th>Удаление</th>
      <th>Редактирование</th>
    </tr>
</thead>
    <?php

$sql = mysqli_query($link, 'SELECT `id`, `idtypeofworkout`, `name`, `timeworkout`,`img` FROM `workout`');

      while ($result = mysqli_fetch_array($sql)) {
           // while ($result1 = mysqli_fetch_array($sql1)) {
           $s=$result['idtypeofworkout'];
           $sql1 = mysqli_query($link, "SELECT `name` FROM `typeofworkout` WHERE `id`=$s");

               while ($result1 = mysqli_fetch_array($sql1)) {
                   $n=$result1['name'];}
        echo '<tr>' .
             "<td data-label='Идентификатор'>{$result['id']}</td>" .
             "<td data-label='Идентификатор категории'>{$result['idtypeofworkout']}</td>" .
             "<td data-label='Название категории'>{$n}</td>" .
             "<td data-label='Название'>{$result['name']}</td>" .
             "<td data-label='Время'>{$result['timeworkout']} </td>" .
             "<td data-label='Название изображения'>{$result['img']} </td>" .
             "<td><a href='?del_id={$result['id']}'>Удалить</a></td>" .
             "<td><a href='?red_id={$result['id']}'>Изменить</a></td>" .
             '</tr><br><br><br><br><br>';
      }


    ?>
  </table>
  </div>
  <br>
  <br>
  <br>
  </div>
  <?include 'footer.php';?>
</body>
</html>
