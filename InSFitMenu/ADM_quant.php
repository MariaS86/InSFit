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

        if (isset($_POST["idworkout"])) {
            if (isset($_POST["idexercise"])) {
                if (isset($_POST["quantity"])) {
      //Если это запрос на обновление, то обновляем
      if (isset($_GET['red_id'])) {
          $sql = mysqli_query($link, "UPDATE `quantityofexercise` SET `id` = '{$_POST['id']}', `idworkout` = '{$_POST['idworkout']}',`idexercise` = '{$_POST['idexercise']}',`quantity` = '{$_POST['quantity']}' WHERE `id`={$_GET['red_id']}");
      } else {
          //Иначе вставляем данные, подставляя их в запрос
          $sql = mysqli_query($link, "INSERT INTO `quantityofexercise` (  `id`,`idworkout`, `idexercise`, `quantity`) VALUES ( '{$_POST['id']}','{$_POST['idworkout']}', '{$_POST['idexercise']}', '{$_POST['quantity']}')");
      }

      //Если вставка прошла успешно
      if ($sql) {
        echo '<p>Успешно!</p>';
        header("Location: ADM_quant.php");
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
  }
    }
}

    if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
      //удаляем строку из таблицы
      $sql = mysqli_query($link, "DELETE FROM `quantityofexercise` WHERE `id` = {$_GET['del_id']}");
      if ($sql) {
        echo "<p>Запись удалена.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($link, "SELECT `id`, `idworkout`, `idexercise`, `quantity` FROM `quantityofexercise` WHERE `id`={$_GET['red_id']}");
      $product = mysqli_fetch_array($sql);
    }
  ?>

<div id="content">
    <div class="formredact3">
  <form class="redact3" action="" method="post">
    <table>
        <tr>
          <td>Идентификатор:</td>
          <td><input type="text" name="id" value="<?= isset($_GET['red_id']) ? $product['id'] : ''; ?>"></td>
        </tr>
      <tr>
        <td>Идентификатор тренировки:</td>
        <td><input type="text" name="idworkout" value="<?= isset($_GET['red_id']) ? $product['idworkout'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Идентификатор упражнения:</td>
        <td><input type="text" name="idexercise" value="<?= isset($_GET['red_id']) ? $product['idexercise'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Количество:</td>
        <td><input type="text" name="quantity" value="<?= isset($_GET['red_id']) ? $product['quantity'] : ''; ?>"></td>
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
      <td>Идентификатор тренировки</td>
      <td>Идентификатор упражнения</td>
      <td>Количество</td>
      <td>Удаление</td>
      <td>Редактирование</td>
    </tr>
    <?php

$sql = mysqli_query($link, 'SELECT  `id`,`idworkout`, `idexercise`, `quantity` FROM `quantityofexercise`');

      while ($result = mysqli_fetch_array($sql)) {
        echo '<tr>' .
        "<td>{$result['id']}</td>" .
             "<td>{$result['idworkout']}</td>" .
             "<td>{$result['idexercise']} </td>" .
             "<td>{$result['quantity']} </td>" .
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
