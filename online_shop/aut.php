<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="form.css">
        <style>
            input[type="submit"]{
                background-color: #ffa017;
            }
            input[type="submit"]:hover{
                background-color:#f1ce9d;
            }
        </style>
    </head>

    <body>
    <?php include 'menu.php'; ?>
    <div style='margin-top:50px' class="container">
        <form action='aut_check.php' method='post'>   
            <label for='email'>Почта:</label>
            <input type='email' id='email' name='email' placeholder='Ваша почти..' required>
    
            <label for='password'>Пароль:</label>
            <input type='password' id='password' name='password' placeholder='Ваш пароль..' required>
            <div class = "message">
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            
            </div>
            <input type='submit' value='Войти в аккаунт'>
        </form>
    </div>
    </body>

</html>