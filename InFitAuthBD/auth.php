<?php
    session_start(["use_strict_mode" => true]);
    require('dbconnect.php');

    unset($_SESSION['message']);
    if (isset($_POST['login'])){
        $result = $conn->query("SELECT * FROM users WHERE login = '".$_POST['login']."'");

        if ($row = $result->fetch())
        {
            if (MD5($_POST["password"]) == $row['password']){
                $_SESSION['username'] = $_POST['login'];
                $_SESSION['surname'] = $row['surname'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['patronymic'] = $row['patronymic'];
                $_SESSION['email'] = $row['email'];
                $_SESSION["is_auth"] = true;
                setcookie("login", $_SESSION['username']);
              setcookie("surname", $_SESSION['surname']);
              setcookie("name", $_SESSION['name']);
                setcookie("patronymic", $_SESSION['patronymic']);
              setcookie("email", $_SESSION['email']);
                header("Location: authform.php");
                die();
            }
            else {
                $_SESSION['message'] = 'Вы ввели неправильный пароль!';
                $_SESSION["is_auth"] = false;
                header("Location: authform.php");
                die();
            }

        }
        else {
            $_SESSION['message'] = 'Вы ввели неправильный логин!';
            $_SESSION["is_auth"] = false;
            header("Location: authform.php");
            die();
        }

    }
    if ($_GET['logout'] == 1){
        setcookie("login",$_COOKIE, time()+60*60*24);
        session_unset();
        setcookie("surname", "", time()-9999);
        setcookie("name", "", time()-9999);
        setcookie("patronymic", "", time()-9999);
        setcookie("email", "", time()-9999);
        header("Location: authform.php");
        die();
    }
