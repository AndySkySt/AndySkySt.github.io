<?php session_start();?> 
<!DOCTYPE>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Библиотека - приходи и читай</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css"> <!-- подключение css-->
        <link rel="shortcut icon" type="image/x-icon" href="img/books_library.ico"> <!--подключение иконки для сайта ico-->
    </head>
    <body>
        <?php require_once "view/header.php"?>
        <?php require_once "view/leftCol.php"?>


        <?php require_once "view/content.php";
        ?>

        <?php require_once "view/footer.php"?>
    </body>
</html>