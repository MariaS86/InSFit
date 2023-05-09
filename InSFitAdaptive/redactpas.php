



<!doctype html>
<html lang="ru">
<head>
  <title>Админ-панель</title>
</head>
<body>
  <?php
  include 'header/headerlog.php';

?>

  <form action="" method="post">
        <?php

                if($_SESSION['msg']['passwordchange-err'])
                {
                    echo '<div class="err">'.$_SESSION['msg']['passwordchange-err'].'</div>';
                    unset($_SESSION['msg']['passwordchange-err']);
                }

                if($_SESSION['msg']['passwordchange-success'])
                {
                    echo '<div class="success">'.$_SESSION['msg']['passwordchange-success'].'</div>';
                    unset($_SESSION['msg']['passwordchange-success']);
                }
            ?>

            <label class="grey" for="password1">Current Password:</label>
            <input class="field" type="password" name="password1" id="password1" value="" size="23" />
            <label class="grey" for="password">New Password:</label>
            <input class="field" type="password" name="passwordnew1" id="passwordnew1" size="23" />
            <input type="submit" name="submit" value="Change" class="bt_register" />
        </form>



  <?include 'footer.php';?>
</body>
</html>
<?
$host = 'localhost';  // Хост, у нас все локально
$user = 'root';    // Имя созданного вами пользователя
$pass = ''; // Установленный вами пароль пользователю
$db_name = 'inshinefit';   // Имя базы данных
$link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

if (isset($_POST['update'])) {
   if (isHashVerify($username, $old_password, $link)) {
      $newHash = password_hash($new_password, PASSWORD_DEFAULT);
      $update2 = "UPDATE `users` SET `password`='$newHash' WHERE
                                            `login`='$username'";
      $resultupdate = mysqli_query($conn_db, $update2) or die
      (mysqli_error($conn_db));
      $fsmsg = $new_password;
   } else {
       $fsmsg = 'Старый пароль не подходит!';
   }

}

function isHashVerify($username, $oldPassword, $db)
{
$query = "SELECT `password` FROM `users` WHERE  `login`='$username'";
$currentPassword = MD5("password");
return password_verify($oldPassword, $currentPassword);
}
?>
  <div class="container-fluid padding">
        <div class="row padding">
          <div class="offset-lg-1 col-lg-5">

          <br>

      <form action="" method="POST" style="display: block; width: 400px; margin: 0 auto; background: #f2f1f0; padding: 20px; color:#555; text-align: center;">

        <h3>Форма для смены пароля</h3>
        <br>

        <div class="form-group">
          <label for="exampleInputlogin"><h3>Введите имя пользователя</h3></label>
          <input type="login" name="username" class="form-control" id="exampleInputlogin2" aria-describedby="loginHelp" required placeholder="Введите имя пользователя" pattern="[a-zA-Z0-9]+" title="Используйте только цифры и латинские буквы">
        </div>

        <div class="form-group">
          <label for="exampleInputpassword"><h3>Старый пароль</h3></label>
          <input type="password" name="old_password" class="form-control" id="exampleInputpassword" aria-describedby="passwordHelp" required placeholder="Введите старый пароль" pattern="[a-zA-Z0-9]+" title="Используйте только цифры и латинские буквы">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword2"><h3>Новый пароль</h3></label>
          <input type="password" name="new_password" class="form-control" id="exampleInputPassword2" aria-describedby="passwordHelp" required placeholder="Введите новый пароль" pattern="[a-zA-Z0-9]+" title="Используйте только цифры и латинские буквы">
        </div>

        <div class="form-check">
          <input class="form-check-input" name="id" type="checkbox" value="" id="invalidCheck3" required>
          <label class="form-check-label" for="invalidCheck3"><h5>Подтвердить изменение</h5></label>
        </div>

        <form method="POST">
          <button type="submit" class="btn btn-success btn-block" name="update">Изменить</button>
        </form>


      </form>

          </div>

            <!-- <div class="col-lg-5">

            <br>

            <form action="red.php" method="POST" style="display: block; width: 400px; margin: 0 auto; background: #f2f1f0; padding: 20px; color:#555; text-align: center;">

              <h3>Форма для смены логина</h3>
              <br>

              <div class="form-group">
                <label for="exampleInputemail"><h3>Введите Email</h3></label>
                <input type="email" name="email" class="form-control" id="exampleInputemail" aria-describedby="emailHelp" required pattern="[a-zA-Z0-9-@-.]+" placeholder="Введите свой Email">
              </div>

              <div class="form-group">
                <label for="exampleInputpassword"><h3>Введите пароль</h3></label>
               <input type="password" name="password" class="form-control" id="exampleInputpassword" aria-describedby="passwordHelp" required placeholder="Введите пароль" pattern="[a-zA-Z0-9]+" title="Используйте только цифры и латинские буквы">
              </div>

              <div class="form-group">
                <label for="exampleInputlogin"><h3>Новый логин</h3></label>
                <input type="login" name="new_username" class="form-control" id="exampleInputlogin" aria-describedby="loginHelp" required placeholder="Введите новый логин" pattern="[a-zA-Z0-9]+" title="Используйте только цифры и латинские буквы">
              </div>

              <div class="form-check">
                <input class="form-check-input" name="id" type="checkbox" value="" id="invalidCheck3" required>
                <label class="form-check-label" for="invalidCheck3"><h5>Подтвердить изменение</h5></label>
              </div>

              <form method="POST">
                  <button type="submit" class="btn btn-success btn-block" name="update">Изменить</button>
              </form>

      </form>

            </div> -->
          </div>
        </div>

      <form class="text-center text-danger">

        <?php

          if(!empty($fsmsg)) echo("<br><h2>{$fsmsg}</h2>\n");

        ?>

      </form>
