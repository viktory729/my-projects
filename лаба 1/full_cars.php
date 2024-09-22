<?php   
session_start();  
include 'db_connect.php';
?>  
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href='css/header.css'>
    <link rel="stylesheet" href='css/footer.css'>
        <style>
            
            .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 15px;
            display: flex;
            }

            /* Columns */
            .left-column {
            width: 65%;
            position: relative;
            }
            
            .right-column {
            width: 35%;
            margin-top: 60px;
            }

            /* Left Column */
            .left-column img {
            width: 80%;
            margin-top: 50px;
            left: 0;
            top: 0;
            transition: all 0.3s ease;
            }
            
            .left-column img.active {
            opacity: 1;
            }

            /* Product Description */
            .product-description {
            margin-bottom: 20px;
            text-align: center;
            }
            .product-description span {
            font-size: 12px;
            color: #358ED7;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-decoration: none;
            }
            .product-description h1 {
            font-weight: 300;
            font-size: 52px;
            color: #43484D;
            letter-spacing: -2px;
            }
            .product-description p {
            font-size: 16px;
            font-weight: 300;
            color: #86939E;
            line-height: 24px;
            }
            
            .cart-btn {
                margin: 0 auto;
            /* text-align: center; */
            display: inline-block;
            background-color: #7DC855;
            border-radius: 6px;
            font-size: 16px;
            color: #FFFFFF;
            text-decoration: none;
            padding: 12px 30px;
            transition: all .5s;
            }
            .cart-btn:hover {
            background-color: #64af3d;
            }

            /* Responsive */
            @media (max-width: 940px) {
            .container {
                flex-direction: column;
                margin-top: 60px;
            }
            
            .left-column,
            .right-column {
                width: 100%;
            }
            
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

        <?php
            $cars = $_GET['id'];
            $sqlcars = $db->query('SELECT * FROM `Cars` WHERE `id` = '.$cars);
            $specification = $db->query('SELECT * FROM `Specification` WHERE `id` = '.$cars);
            $row = $sqlcars->fetch_assoc();
            $col = $specification->fetch_assoc();
            ?>

        <div class="product-description">
            <h1 name='name'><?php echo $row['name_car']; ?></h1>
            <p><?php echo $row['description']; ?></p>
            <?php
                $brand = $_GET['id'];  //????
                echo '<a href="edit.php?id='.$row["id"].'" class="cart-btn">Изменить</a>';
            ?>
        </div>

        <main class="container">

        
    
        <!-- Left Column / Headphones Image -->
        <div style='margin-left: 0px;' class="left-column">
            
            <img src="<?php echo $row['photo'];?>">
        </div>

    <div class="right-column">

        <!-- Product Description -->
        <div class="product-description" style="margin-left: 30px">
            <h1 name='name'>Характеристики</h1>
            <p>Объем двигателя <?php echo $col['engine_size'];?> куб.см</p>
            <p>Мощность двигателя <?php echo $col['power'];?> л.с.</p>
            <p>Максимальная скорость <?php echo $col['max_speed'];?> км/ч</p>
            <p>Вес снаряженного автомобиля <?php echo $col['weight'];?> кг.</p>
            <p>Расход топлива <?php echo $col['fuel_consumption'];?> л на 100 км</p>
            <a href="delite.php?id='<?php $row["id"]; ?>'" name = "add_to_cart" class="cart-btn">Удалить</a>
        </div>

        <div>
            <br>
            <?php
            $brand = $_GET['id'];
                
            ?>
        </div>
        </div>
    </main>
    <?php
        include "footer.html";
      ?>
    </body>

</html>