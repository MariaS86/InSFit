<?php
    session_start(["use_strict_mode" => true]);


    if (isset($_SESSION['username'])) {

if  ($_SESSION['roleid'] == 1) { //проверка на админа
    include 'admin/lkAdmin.php';
    include 'footer.php';
     }
        ?>
    <?
            if  ($_SESSION['roleid'] == 0) { //проверка на админа
include 'header/headerlog.php';
                    include 'user/lk.php';
                    include 'footer.php';
                 }

 }
    else{
include 'header/headerauth.php';
include 'user/vh.php';
include 'footer.php';
 ?>

<?php }
echo ("<p style='color: red'>".$_SESSION['message']."</p>");
unset($_SESSION['message']);

    ?>
