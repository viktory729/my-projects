<?php   
session_start();  
include 'db_connect.php';
?>  
<!DOCTYPE html>
<html>
    <head>
        <style>
            /* Basic Styling */
            html, body {
            height: 100%;
            width: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            }
            
            .container {
            max-width: 1200px;
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
            position: absolute;
            left: 0;
            top: 0;
            /* opacity: 0; */
            transition: all 0.3s ease;
            }
            
            .left-column img.active {
            opacity: 1;
            }

            /* Product Description */
            .product-description {
            border-bottom: 1px solid #E1E8EE;
            margin-bottom: 20px;
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

            /* Product Color */
            .product-color {
            margin-bottom: 30px;
            }
            
            .color-choose div {
            display: inline-block;
            }
            
            .color-choose input[type="radio"] {
            display: none;
            }
            
            .color-choose input[type="radio"] + label span {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin: -1px 4px 0 0;
            vertical-align: middle;
            cursor: pointer;
            border-radius: 50%;
            border: 2px solid #FFFFFF;
            box-shadow: 0 1px 3px 0 rgba(0,0,0,0.33);
            }
            
            .color-choose input[type="radio"]#red + label span {
            background-color: #C91524;
            }
            .color-choose input[type="radio"]#blue + label span {
            background-color: #314780;
            }
            .color-choose input[type="radio"]#black + label span {
            background-color: #323232;
            }
            
            .color-choose input[type="radio"]:checked + label span {
            background-image: url(images/check-icn.svg);
            background-repeat: no-repeat;
            background-position: center;
            }

            /* Cable Configuration */
            .cable-choose {
            margin-bottom: 20px;
            }
            
            .cable-choose button {
            border: 2px solid #E1E8EE;
            border-radius: 6px;
            padding: 13px 20px;
            font-size: 14px;
            color: #5E6977;
            background-color: #fff;
            cursor: pointer;
            transition: all .5s;
            }
            
            .cable-choose button:hover,
            .cable-choose button:active,
            .cable-choose button:focus {
            border: 2px solid #86939E;
            outline: none;
            }
            
            .cable-config {
            border-bottom: 1px solid #E1E8EE;
            margin-bottom: 20px;
            }
            
            .cable-config a {
            color: #358ED7;
            text-decoration: none;
            font-size: 12px;
            position: relative;
            margin: 10px 0;
            display: inline-block;
            }
            
            .cable-config a:before {
            content: "?";
            height: 15px;
            width: 15px;
            border-radius: 50%;
            border: 2px solid rgba(53, 142, 215, 0.5);
            display: inline-block;
            text-align: center;
            line-height: 16px;
            opacity: 0.5;
            margin-right: 5px;
            }

            /* Product Price */
            .product-price {
            display: flex;
            align-items: center;
            }
            
            .product-price span {
            font-size: 26px;
            font-weight: 300;
            color: #43474D;
            margin-right: 20px;
            }
            
            .cart-btn {
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
            
            .left-column img {
                width: 300px;
                right: 0;
                top: -65px;
                left: initial;
            }
            }
            
            @media (max-width: 535px) {
            .left-column img {
                width: 220px;
                top: -85px;
            }
            }
        </style>
    </head>

    <body>
        <?php
        include_once 'db_connect.php';
        include "menu.php";
        ?>
        <br>
        <main class="container">
    
        <!-- Left Column / Headphones Image -->
        <div style='margin-left: 0px;' class="left-column">
            <?php
            $brand = $_GET['id'];
            $sql = $db -> query("UPDATE `insertBrand` SET `br`= '$brand' WHERE `id` = '1' ");
            $sqlBrand = $db->query('SELECT * FROM `goods` WHERE `id` = '.$brand);
            while($row = $sqlBrand->fetch_assoc()){
                echo '<img src="image/'.$row['photo'].'" alt="">';
            ?>
        </div>


        <!-- Right Column -->
        <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
            <!-- <span>Headphones</span> -->
            <h1 name='name'><?php echo $row['name']; ?></h1>
            <p><?php echo $row['about']; ?></p>
        </div>

        <!-- Product Pricing -->
        <div class="product-price">
            <span><?php echo $row['price']; ?> ₽</span>           
        </div>
        
        <div>
            <br>
            <?php
                $brand = $_GET['id'];
                echo '<a href="cart1.php?action=add&id='.$row["id"].'" name = "add_to_cart" class="cart-btn">Добавить в корзину</a>';
                }
            ?>
        </div>
    </div>
    </main>
    </body>

</html>