<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href='css/header.css'>
        <link rel="stylesheet" href='css/footer.css'>
        <link rel="stylesheet" href="css/card-block.css">
    </head>


    <body>
       

        <?php
        session_start();
        session_destroy();
        ?>

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
            <h1 style="font-weight: 600;"><span id="HELLO_THIS_IS_MY_FIRST_HEADER-3">FERRARI</span></h1>
            </div>
        </header>

        <div class="container1" style="text-align:center; margin-top:5%;">
            <div class="blog_post">
                <div class="container_copy">
                    <h1 style="margin-bottom:50px;">Вы вышли из аккаунта</h1>
                    <a href="index.php" class="btn_primary">На главную</a>
                    <a href='authorization.php' class="btn_primary" style="margin-left:10%;">Авторизироваться</a>
                    <br><br><br>
                </div>
            </div>
        </div>
        
        <?php
        include "footer.html";
        ?>

    </body>

</html>