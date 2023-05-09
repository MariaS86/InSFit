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
    //Если переменные переданы
        if (isset($_POST["login"])) {
            if (isset($_POST["surname"])) {
                if (isset($_POST["name"])) {
                    if (isset($_POST["email"])) {
                        if (isset($_POST["roleid"])) {
      if (isset($_GET['red_id'])) {
          $sql = mysqli_query($link, "UPDATE `users` SET `login` = '{$_POST['login']}',`surname` = '{$_POST['surname']}',`name` = '{$_POST['name']}',`patronymic` = '{$_POST['patronymic']}',`email` = '{$_POST['email']}',`roleid` = '{$_POST['roleid']}' WHERE `id`={$_GET['red_id']}");
       }

    if ($sql) {
      echo '<p>Успешно!</p>';
header("Location: ADM_user.php");
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
  }
}
}
}
}
  if (isset($_GET['ban_id'])) {
  if (isset($_GET['ban_id'])) {
      $sql = mysqli_query($link, "UPDATE `users` SET `banned` = 1 WHERE `id`={$_GET['ban_id']}");

  //	$query = 'UPDATE users SET banned=1 WHERE id="'.$_REQUEST['id'].'"';
  }
  //Если вставка прошла успешно
  if ($sql) {
    echo '<p>Успешно!</p>';

  } else {
    echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
  }
}
  if (isset($_GET['unban_id'])) {
      if (isset($_GET['unban_id'])) {
      $sql = mysqli_query($link, "UPDATE `users` SET `banned` = 0 WHERE `id`={$_GET['unban_id']}");

  //	$query = 'UPDATE users SET banned=1 WHERE id="'.$_REQUEST['id'].'"';
  }
  //Если вставка прошла успешно
  if ($sql) {
    echo '<p>Успешно!</p>';
  } else {
    echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
  }
  }

    if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
      //удаляем строку из таблицы
      $sql = mysqli_query($link, "DELETE FROM `users` WHERE `id` = {$_GET['del_id']}");
      if ($sql) {
        echo "<p>Запись удалена.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($link, "SELECT  `id`,`login`,`surname`, `name`, `patronymic`, `email`, `roleid` FROM `users` WHERE `id`={$_GET['red_id']}");
      $product = mysqli_fetch_array($sql);
    }
  ?>

<div id="content">
    <div class="formredact5">
<form class="redact5" action="" method="post">
    <table>
        <tr>
          <td>Логин:</td>
          <td><input type="text" name="login" value="<?= isset($_GET['red_id']) ? $product['login'] : ''; ?>"></td>
        </tr>
        <tr>
          <td>Фамилия:</td>
          <td><input type="text" name="surname" value="<?= isset($_GET['red_id']) ? $product['surname'] : ''; ?>"></td>
        </tr>
        <tr>
          <td>Имя:</td>
          <td><input type="text" name="name" value="<?= isset($_GET['red_id']) ? $product['name'] : ''; ?>"></td>
        </tr>
        <tr>
          <td>Отчество:</td>
          <td><input type="text" name="patronymic" value="<?= isset($_GET['red_id']) ? $product['patronymic'] : ''; ?>"></td>
        </tr>
        <tr>
          <td>Почта:</td>
          <td><input type="text" name="email" value="<?= isset($_GET['red_id']) ? $product['email'] : ''; ?>"></td>
        </tr>
        <tr>
          <td>Роль:</td>
          <td><input type="text" name="roleid" value="<?= isset($_GET['red_id']) ? $product['roleid'] : ''; ?>"></td>
        </tr>


      <tr>
        <td colspan="2"><input type="submit" value="Сохранить"></td>
      </tr>
    </table>
  </form>
</div>
<div class="cont3">
  <table class="exer" border='1'>
       <thead>
      <tr>
        <th>Идентификатор</th>
        <th>Логин</th>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>Почта</th>
        <th>Роль</th>
        <th>Бан</th>
        <th>Удаление</th>
        <th>Редактирование</th>
        <th>Забанить</th>
        <th>Разбанить</th>
      </tr>
  </thead>
    <?php

$sql = mysqli_query($link, 'SELECT  `id`,`login`,`surname`, `name`, `patronymic`, `email`,`roleid`, `banned` FROM `users`');

while ($result = mysqli_fetch_array($sql)) {
  echo '<tr>' .
       "<td data-label='Идентификатор'>{$result['id']}</td>" .
       "<td data-label='Логин'>{$result['login']}</td>" .
       "<td data-label='Фамилия'>{$result['surname']} </td>" .
       "<td data-label='Имя'>{$result['name']} </td>" .
       "<td data-label='Отчество'>{$result['patronymic']} </td>" .
       "<td data-label='Почта'>{$result['email']} </td>" .
       "<td data-label='Роль'>{$result['roleid']} </td>" .
       "<td data-label='Бан'>{$result['banned']} </td>" .
       "<td><a href='?del_id={$result['id']}'>Удалить</a></td>" .
       "<td><a href='?red_id={$result['id']}'>Изменить</a></td>" .
       "<td><a href='?ban_id={$result['id']}'>Забанить</a></td>" .
       "<td><a href='?unban_id={$result['id']}'>Разбанить</a></td>" .
       '</tr><br><br><br><br><br>';
}
    ?>
  </table>
  </div>
   </div>
  <?include 'footer.php';?>
</body>
</html>
