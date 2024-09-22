<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href='css/header.css'>
      <link rel="stylesheet" href='css/footer.css'>
      <link rel="stylesheet" href="css/text-block.css">
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
            <h1><span id="HELLO_THIS_IS_MY_FIRST_HEADER-3">Официальные диллеры Ferrari</span></h1>
            <p>всемирная сеть, объединенная единой страстной увлеченностью</p>
            </div>
        </header>


        <div class="cont">
            <section class="about-us">
                <div class="about">
                  <img src='https://ferrari-view.thron.com/api/xcontents/resources/delivery/getThumbnail/ferrari/0x0/b1102091-607f-408a-ab90-04456db603ba.jpg?v=133' class="pic">
                  <div class="text">
                      <p>Официальные дилеры являются отправной точкой каждого приключения Ferrari, позволяющего заказчикам открыть для себя, испытать и персонализировать автомобили завода в Маранелло, полностью погрузившись в атмосферу легенды «Гарцующего жеребца».
                        Выставочные залы, станции технического обслуживания и места встречи представляют собой важную часть жизни каждого поклонника. Здесь вас ждут техническая поддержка, новости, мероприятия и акции, связанные с миром Ferrari.</p>
                  </div>
                </div>
            </section>
        </div>

        <br>
        <hr>
        <div class="container_about">
            <h1 style="text-align: center;">Добро пожаловать в шоурум FERRARI</h1>
            <h2 style="font-size: 30px; font-weight: 500; text-align: center;">Адрес: Рублёво-Успенское шоссе, 8-й километр, 114, стр. 5, д. Барвиха <br> Контактный номер: +7 495 933-33-77</h2>
            </h2>        
        </div>
        <hr>
        <br>

        <?php
        include "footer.html";
        ?>
    </body>
</html>