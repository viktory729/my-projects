<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>
            <a class="active" href="index.php">Главная</a>
            <a href="about_us.php">О нас</a>
            <a href="Cars.php">Автомобили</a>
            <a href="contact_information.php">Диллер</a>
            <a href="insert.php">Добавить новую запись</a>
            <?php
              // if($_SESSION['id'] == 1){
              //   echo '<a href="insert.php">Добавить новую запись</a>';
              // }

             if(empty($_SESSION['user_name'])){
              echo '<a href="registration.php">Регистрация</a>';
            }

            if($_SESSION['user_name']){
            echo "<a href='logout.php'>Выйти из аккаунта</a>";
            } 
           
            ?>
    </body>
</html>