<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href='css/header.css'>
        <link rel="stylesheet" href='css/footer.css'>
        <link rel="stylesheet" href='css/reg_aut.css'>
    </head>

    <body>
        <header style="background-image: URL(https://images.drive.ru/i/0/5b06848aec05c4ce4d000070.jpg); background-repeat: no-repeat; background-size: cover;">
            <div class="header">
            <a href="главная страница.html" class="logo"><img src="https://www.pngarts.com/files/3/Ferrari-Logo-Download-PNG-Image.png" alt=""></a>
            <div class="header-right">

            <?php
              include "menu.php";
            ?>
            </div>
            
            </div>

            
            <div class="main-heading">
            <h1 style="font-weight: 600;"><span id="HELLO_THIS_IS_MY_FIRST_HEADER-3">Автомобили FERRARI</span></h1>
            <p>искусство в движении</p>
            </div>
        </header>
        
        <div class="body">
        <div class="container" id="container">
            <div class="form-container sign-in-container">
                <form class="form" action='aut_check.php' method='post'>
                    <h1 class="h1">Авторизироваться</h1>
                    <br><br>    
                    <input class="input" type="email" id='user_email' name='user_email' placeholder="Почта" />
                    <input class="input" type="password" id='user_password' name='user_password' placeholder="Пароль" />
                    <input type='submit' value='Регистрация'>
                    <br>
                    <a class="a" href="registration.php">Нет аккаунта? Зарегистрируйтесь</a>
                </form>
            </div>
            <div class="overlay-container">
                <img src="https://i.pinimg.com/564x/2e/0c/94/2e0c94a04564f8144f85830ef9216084.jpg" width="384" height="480">
                <div class="overlay">
            </div>
        </div>
        </div>
        </div>
        <?php
            include "footer.html";
        ?>
    </body>
</html>