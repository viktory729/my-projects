<?php
session_start();
include "db_connect.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href='css/header.css'>
        <link rel="stylesheet" href='css/footer.css'>
        <link rel="stylesheet" href="css/text-block.css">
    </head>

    <style>

      .countdown-title {
        color: #b73333;
        font-weight: 600;
        font-size: 40px;
        text-align: center;
      }
      
      .time_block{
        width: 90%;
        background: white;
        border-radius: 10px;
        box-shadow: 1px 1px 2rem rgba(0, 0, 0, 0.3);
        padding: 50px;
        margin: 0 auto;
      }

      .countdown {
        font-family: sans-serif;
        color: white;
        font-weight: 100;
        text-align: center;
        font-size: 40px;
      }
      
      .countdown-number {
        width: 15%;
        padding:20px;
        border-radius: 3px;
        background: #eeacb3;
        display: inline-block;
        text-align:center;
      }
      
      .countdown-time {
        padding: 15px;
        border-radius: 3px;
        display: inline-block;
      }
      
      .countdown-text {
        display: block;
        padding-top: 5px;
        font-size: 16px;
      } 


      #myBtn {
        background-image: linear-gradient(to top, #eeacb3 0%, #fde7eb 100%);
        color: #b73333;
        padding: 12px 16px;
        font-size: 18px;
        font-weight: bold;
        border: none;
        cursor: pointer;
        width: 20%;
        margin-top:50px;
        margin-left:40%;
        text-align:center;
      }


      .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; 
          height: 100%; 
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); 
          background-color: rgba(0,0,0,0.4); 
      }


      .modal-content {
          position: relative;
          background-color: white;
          margin: auto;
          padding: 0;
          height: 40%;
          width: 50%;
          border-radius: 30px;
          box-shadow: 1px 1px 2rem rgba(0, 0, 0, 0.3);
          animation-name: animatetop;
          animation-duration: 0.4s
      }


      @-webkit-keyframes animatetop {
          from {top:-300px; opacity:0} 
          to {top:0; opacity:1}
      }

      @keyframes animatetop {
          from {top:-300px; opacity:0}
          to {top:0; opacity:1}
      }


      .close {
          color: black;
          float: right;
          font-size: 28px;
          font-weight: bold;
      }

      .close:hover,
      .close:focus {
          color: #000;
          text-decoration: none;
          cursor: pointer;
      }

      .modal-header {
        border-radius: 20px;
          padding: 2px 16px;
          background-color: white;
          color: black;
      }

      .modal-body {padding: 2px 16px;}
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
            <h1 style="font-weight: 600;"><span id="HELLO_THIS_IS_MY_FIRST_HEADER-3">FERRARI</span></h1>
            <p style="font-size: 40px;">искусство в движении</p>
            </div>
        </header>

        <br><br><br>        
        <div class="time_block">
        <h1 class="countdown-title">До презентации нового автомобиля осталось:</h1>
        <div id="countdown" class="countdown">
          <div class="countdown-number">
            <span class="days countdown-time"></span>
            <span class="countdown-text">Дни</span>
          </div>
          <div class="countdown-number">
            <span class="hours countdown-time"></span>
            <span class="countdown-text">Часы</span>
          </div>
          <div class="countdown-number">
            <span class="minutes countdown-time"></span>
            <span class="countdown-text">Минуты</span>
          </div>
          <div class="countdown-number">
            <span class="seconds countdown-time"></span>
            <span class="countdown-text">Секунды</span>
          </div>
        </div>
        <br>
        <button id="myBtn">Подробнее</button>
        </div>

        <div id="myModal" class="modal">
        
        <div class="modal-content">
        <div class="modal-header">
          <span class="close">×</span>
          <h2>Все любители автомобилей ferrari</h2>
        </div>
        <div class="modal-body">
          <p>Мы рады пригласить вас на уникальное событие — презентацию нового автомобиля Ferrari, который объединяет в себе передовые технологии и неповторимый стиль.</p>
          <br>
          <p>Не упустите возможность стать частью этого захватывающего события, полюбоваться великолепным дизайном и узнать все о новых функциях нашего флагмана.  </p>
        </div>
      </div>

        </div>


        <div class="cont">
            <section class="about-us">
                <div class="about">
                  <img src='https://cdn.ferrari.com/cms/network/media/img/resize/66d981c8c04391002054ccd7-2024-ferrarri-scuderia-logo-gtw2?width=530&height=597' class="pic">
                  <div class="text">
                    <h2>FERRARI</h2>
                      <p>Гарцующий конь символизирует эксклюзивность, производительность и качество во всем мире.
                        Наш престиж основан на десятилетиях спортивных успехов и неповторимом стиле наших автомобилей, которые уникальны своими инновациями, технологиями и удовольствием от вождения.
                        Мы создаем эксклюзивные, аутентичные и запоминающиеся впечатления для наших клиентов во всем, что мы делаем.</p>
                  </div>
                </div>
            </section>
        </div>

        <?php
        include "footer.html";
        ?>
        <script src = 'index_time.js'></script>
        <script>

          var modal = document.getElementById('myModal');
          var btn = document.getElementById("myBtn");
          var span = document.getElementsByClassName("close")[0];

          btn.onclick = function() {
            modal.style.display = "block";
          }

          span.onclick = function() {
            modal.style.display = "none";
          }

          window.onclick = function(event) {
            if (event.target == modal) {
              modal.style.display = "none";
            }
          }

        </script>
    </body>
</html>