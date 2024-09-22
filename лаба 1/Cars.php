<?php
session_start();
include "db_connect.php";

?>

<!DOCTYPE html>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <link rel="stylesheet" href='css/header.css'>
      <link rel="stylesheet" href='css/footer.css'>
      <link rel="stylesheet" href="css/text-block.css">
      <link rel="stylesheet" href="css/card-block.css">


      <style>

          nav {
            display: flex;
            justify-content: center;
            margin-top:50px;
          }

          .pagination { 
            list-style: none;
            margin-top: 20px;
            padding: 0;
            display: flex;
            
          }

          .pagination li {
            margin: 0 1px;
          }

          .ul {
            list-style: none;
            margin: 0 auto;
            /* border: solid, 2px, #dddddd; */
        }
        .li{
            list-style: none;
            float: left;
            /* margin-right: 16px; */
            border:solid 1px #dddddd;
            color:black;
            padding: 8px 16px;
            background-color: none;
        }
        .li:hover{
            color:#FF0084;
            cursor: pointer;
        }

        .li.active{
          background-color : pink;
        }

        .li:hover:not(.active){
          background-color : white;
        }


        .blog_post {
          background: #fff;
          width: 30%;
          border-radius: 10px;
          box-shadow: 1px 1px 2rem rgba(0, 0, 0, 0.3);
          margin-top: 10px;
        }
        .container1 {
        display: flex;
        flex-wrap: wrap;
        font-family: "Raleway", sans-serif;
        }
      </style>

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

        <br>
        <div class="container1" id="content_container"></div>

      <?php
        $per_page = 6;
        $sql = $db->query("SELECT * FROM cars");
        $count = mysqli_num_rows($sql);
        $pages = ceil($count/$per_page);
      ?>

      <nav aria-label="pagination">
        <ul class="ul" id="paginate">
            <li class="li" id="1">&laquo;</li>
            <?php        
            $n = 1;
            for($i=1; $i<=$pages; $i++)  {
                echo '<li class="li" id="'.$i.'">'.$i.'</li>';
                if($i > $n){
                  $n = $i;
                  echo '<li class="li" id="'.$n.'">&raquo;</li>';
                }
            }
            ?>
            
        </ul>
      </nav>


      <?php
        include "footer.html";
      ?>

    <script>
    $(document).ready(function(){ 
        $("#paginate li:first-child+li").css({'color' : 'black'}).css({'border' : 'solid #dddddd 1px'}).css({'background-color' : 'pink'});
        $("#content_container").load("Carslist.php?page=1");
        $("#paginate li").click(function(){     
            $("#paginate li").css({'border' : 'solid #dddddd 1px'}).css({'color' : 'black'}).css({'background-color' : 'white'});
            $(this).css({'color' : 'white'}).css({'border' : 'none'}).css({'background-color' : 'pink'});
            var page_num = this.id;
            $("#content_container").load("Carslist.php?page=" + page_num);
        });
    });
    </script>
    </body>
</html>