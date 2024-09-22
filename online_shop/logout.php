<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="reg_dec.css">
        <style>
            body{
                text-align:center;
                font-family: 'Roboto', sans-serif;
            }
            a{
                background-color: #ffa017;
                text-decoration:none;
                color: black;
                font-size: 18px;
                padding-left: 10px;
                padding-right: 10px;
                padding-top: 5px;
                padding-bottom: 5px;
                margin: 30px;
                text-align:center;
            }
        </style>
    </head>


    <body>
       

        <?php
        session_start();
        session_destroy();
        echo "<h1>Вы вышли из аккаунта</h1>";
        echo "<br>";
        echo "<a href='index.php'>На главную страницу</a>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<a href='aut.php'>Авторизироваться</a>";
        ?>

    </body>

</html>