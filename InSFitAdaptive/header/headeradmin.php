

        <!doctype html>
        <html lang="ru">
        <head>
            <meta charset="utf-8" />
            <title>InshineFit</title>

            <link rel="stylesheet" href="css/lkadm0.css" id="theme-link" >
            <link rel="stylesheet" href="css/tabl.css" id="theme-link" >
            <link rel="stylesheet" href="css/futer.css" id="theme-link" >
            <link rel="stylesheet" href="css/header.css" id="theme-link" >
            <link rel="stylesheet" title="theme" href="#">
            <script src="js/app.js" defer></script>
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
                <script src="js/script.js"></script>
            <script>
            $(document).ready(function() {
                $('.header_burger').click(function (event) {
                    $('.header_burger,.header_menu').toggleClass('active');
                    $('body').toggleClass('lock');/*при открытом меню блокируется прокрутка*/
                });
            });
            </script>
            <meta name="viewport" content="width=device-width">
            <style>
            body {
            /* background: url(img/walp1.png);
            background-attachment: fixed */
            background-color: #afd3fe;
            /* opacity: 0.5; */
            background-attachment: fixed;
            }
            </style>
        </head>
        <body>

            <!-- <div class="page"> -->
            <!-- шапка(верхнее меню) сайта-->
            <header class="header">
                <div class="container">
                    <div class="header_body">
                        <a herf="#" class="header_logo">
                            <img src="img/logo/whitelogo.png" alt="" >
                        </a>
                        <div class="header_burger">
                            <span></span>
                        </div>
                        <nav class="header_menu">
                            <ul class="header_list">
                                <li><a href="ADM_category.php" class="header_link">Категории</a></li>
   						 <li><a href="ADM_work.php" class="header_link">Тренировки</a></li>
                   <li><a href="ADM_quant.php" class="header_link">Количество</a></li>
                   <li><a href="ADM_exercise.php" class="header_link">Упражнения</a></li>
                   <li><a href="ADM_user.php" class="header_link">Пользователи</a></li>
                   <li><a href="ADM_role.php" class="header_link">Роли</a></li>
                   <li><a href="index.php" class="header_link">Личный кабинет</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>
