<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href='css/header.css'>
        <link rel="stylesheet" href='css/footer.css'>
        <link rel="stylesheet" href='css/reg_aut.css'>
        
    </head>

    <style>

.getCode{
    background-image: linear-gradient(to top, #eeacb3 0%, #fde7eb 100%);
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }

        .message{
            text-align: center;
            color: black;
        }

        .error .input{
            border-color: red;
            display: none;
        }

        .error-label{
            display: none;
            float: left;
            /* display: block; */
            color: red;
            /* justify-content: space-around; */
            /* margin: 10px; */
        }

        .div{
            width: 100%;
        }

    </style>

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
            <h1 style="font-weight: 600;"><span>Регистрация</span></h1>
            </div>
        </header>
        
        <div class="body">
            
        <div class="container" id="container">
            <div class="form-container sign-in-container">
                <form novalidate class="form"  method='post' id="reg_form">
                    <h1 class="h1">Создать аккаунт</h1>
                    <br><br>
                    <input class="input" type="text"  id='user_name' name='user_name' placeholder="Имя" required/>
                    <label id="error" style="display:none;">Нет имени</label>

                    <input class="input" type="email" id='user_email' name='user_email' placeholder="Почта" required/>
                    <label id="error" style="display:none;">Нет почты</label>

                    
                    <input class="input" type="password" id='user_password' name='user_password' placeholder="Пароль" required/>
                    <label id="error" style="display:none;">Нет пароля</label>
                    

                    <input style="display:none;" class="input" type="password" id='secret_code' name='secret_code' placeholder="Введите код подтверждения" required/>

                    <input type="submit" class="getCode" value='Получить код подверждения' id="btn_code">
                   
                    <input class="getCode" type="submit" style="display:none;" value='Зарегестрироваться' id="btn_reg">
                    <br>
                    <a class="a" href="authorization.php">Есть аккаунт? Авторизируйтесь</a>
                </form>
            </div>
            <div class="overlay-container">
                <img src="https://i.pinimg.com/564x/bb/a9/71/bba971205ed12b4b1a3c3e31876ded7c.jpg" width="384" height="480">
                <div class="overlay">
            </div>
        </div>
        </div>
        </div>
        
        <?php
     
            $rand_number = rand(1000, 9999); 
            $_SESSION['code'] = $rand_number; 
            include "footer.html";
        ?>

        <script>
            var name = document.getElementById('user_name')
            
            // else{
            $(document).ready(function(){

                

            $("#btn_code").click(function(){
                if((document.getElementById("user_name").value.length == 0) || (document.getElementById("user_password").value.length == 0) || (document.getElementById("user_email").value.length == 0)){
                    alert('Поля не заполнены');
                }else{
                $("#reg_form").submit(function() {
                    var form_data = $(this).serialize();
                    $.ajax({
                        type: "POST",
                        url: "email.php",
                        data: form_data
                    });
                    $("#btn_code").css({'display' : 'none'});
                    $( "#btn_code" ).attr( "type", "text" );
                    $("#btn_reg").css({'display' : 'block'});
                    $("#secret_code").css({'display' : 'block'});
                    return false;
                });
                };
                
                });

            });

                $("#btn_reg").click(function(){
                    if((document.getElementById("secret_code").value.length == 0)){
                        alert('Поле с кодом не заполнено');
                    }else{
                    $("#reg_form").submit(function() {
                        var form_data = $(this).serialize();
                        $.ajax({
                            type: "POST",
                            url: "reg_check.php",
                            data: form_data,
                            success: function () {
                                alert('Успешно');
                                document.location.href = 'http://localhost/лабы%20Кубенко/лаба%201/index.php';
                            },
                        });
                    return false;
                    });
                };
                });
            // }
        
         </script>

    </body>
</html>