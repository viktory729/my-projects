<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href='css/header.css'>
      <link rel="stylesheet" href='css/footer.css'>
      <link rel="stylesheet" href="css/card-block.css">
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
            <h1 style="font-weight: 600;">О нас</h1>
            <p>искусство в движении</p>
            </div>
        </header>

        <br>
        <hr>
        <div class="container_about">
            <h1 style="font-size: 30px; font-weight: 500;">Рожденная духом гонок, Ferrari олицетворяет силу страсти всей жизни и красоту безграничных человеческих достижений, создавая вневременные иконы для меняющегося мира.
            </h1>        
        </div>
        <hr>
        <br>


        <br><br>
        <h1 style="font-weight: bold;text-align: center;">Почему именно мы?</h1>
    <div class="container1">
        <div class="blog_post">
          <div class="container_copy">
            <img src="https://cdn.ferrari.com/cms/network/media/img/resize/63fe03cbdd9c92096688522c-ferrari-corporate-sf-23-team?width=750&height=0">
            <h1>Индивидуальность и команда</h1>
            <p>Наши талантливые сотрудники - наш главный ресурс. Однако добиться экстраординарного они могут, только работая в команде. Поощряя честность, совершенство и щедрость, мы даем каждому из наших сотрудников возможность полностью раскрыть свой потенциал - и стать частью чего-то большего.</p>
          </div>
        </div>
        <div class="blog_post">
            <div class="container_copy">
              <img src="https://cdn.ferrari.com/cms/network/media/img/resize/61f3ff8503c97076b4473924-ferrari-corporate-about-us-values-2-grid-desk?width=750&height=0">
              <h1>Традиции и инновации</h1>
              <p>Традиции и инновации движут друг другом. Постоянное стремление к прочным достижениям - вот что подпитывает легенду Ferrari. Наша способность сочетать революционные технологические решения с исключительным мастерством - это то, что позволяет нам создавать иконы, которые остаются неподвластными времени в быстро меняющемся мире.</p>
            </div>
        </div>
        <div class="blog_post">
            <div class="container_copy">
              <img src="https://cdn.ferrari.com/cms/network/media/img/resize/61f3ff858432360605cfe7a0-ferrari-corporate-about-us-values-3-grid-desk?width=750&height=0">
              <h1>Страсть и достижения</h1>
              <p>Гоночный дух Ferrari живет в эмоциях, которые выходят за рамки дороги и трека, в конечном итоге превращаясь в подлинное и восторженное отношение к жизни. Ничто так не волнует нас, как постановка амбициозных целей и ожиданий, а затем их достижение и превышение, стремление достичь, превзойти все границы. Именно так сила страсти перерастает в красоту достижений на дороге.</p>
            </div>
          </div>
        </div>

        <?php
        include "footer.html";
        ?>

    </body>
</html>