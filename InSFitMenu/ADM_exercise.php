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
            if (isset($_POST["technique"])) {
                if (isset($_POST["resource"])) {
                    if (isset($_POST["measure"])) {
      //Если это запрос на обновление, то обновляем
      if (isset($_GET['red_id'])) {
          $sql = mysqli_query($link, "UPDATE `exercise` SET `id` = '{$_POST['id']}',`name` = '{$_POST['name']}',`technique` = '{$_POST['technique']}',`resource` = '{$_POST['resource']}',`measure` = '{$_POST['measure']}' WHERE `id`={$_GET['red_id']}");
      } else {
          //Иначе вставляем данные, подставляя их в запрос
          $sql = mysqli_query($link, "INSERT INTO `exercise` ( `id`,`name`, `technique`, `resource`, `measure`) VALUES ( '{$_POST['id']}','{$_POST['name']}', '{$_POST['technique']}', '{$_POST['resource']}', '{$_POST['measure']}')");
      }

      //Если вставка прошла успешно
      if ($sql) {
        echo '<p>Успешно!</p>';
        header("Location: ADM_exercise.php");
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }
}
}
}
}

    if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
      //удаляем строку из таблицы
      $sql = mysqli_query($link, "DELETE FROM `exercise` WHERE `id` = {$_GET['del_id']}");
      if ($sql) {
        echo "<p>Упражнение удалено.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($link, "SELECT  `id`, `name`, `technique`, `resource`, `measure` FROM `exercise` WHERE `id`={$_GET['red_id']}");
      $product = mysqli_fetch_array($sql);
    }
  ?>

<div id="content">
    <div class="formredact2">
  <form class="redact2" action="" method="post">
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
        <td>Техника:</td>
        <td><input type="text" name="technique" value="<?= isset($_GET['red_id']) ? $product['technique'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Ресурс:</td>
        <td><input type="text" name="resource" value="<?= isset($_GET['red_id']) ? $product['resource'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Ед. измерения:</td>
        <td><input type="text" name="measure" value="<?= isset($_GET['red_id']) ? $product['measure'] : ''; ?>"></td>
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
      <td>Название</td>
      <td>Техника</td>
      <td>Ресурс</td>
      <td>Ед. измерения</td>
      <td>Удаление</td>
      <td>Редактирование</td>
    </tr>
    <?php
//      $sql = mysqli_query($row, 'SELECT `id`, `name`, `technique` FROM `exercise`');
$sql = mysqli_query($link, 'SELECT `id`, `name`, `technique`, `resource`, `measure` FROM `exercise`');

      while ($result = mysqli_fetch_array($sql)) {
        echo '<tr>' .
             "<td>{$result['id']}</td>" .
             "<td>{$result['name']}</td>" .
             "<td>{$result['technique']} </td>" .
             "<td>{$result['resource']} </td>" .
             "<td>{$result['measure']} </td>" .
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
