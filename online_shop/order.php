<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="mennu.css">
        <link rel="stylesheet" href="product_card.css">
    </head>

    <body>
        <?php
        include "db_connect.php";
        include "menu.php";
        echo "<br>";
        echo '<h1 style="text-align:center;">Заказы</h1>';
        $goods = $db->query('SELECT * FROM `goods` WHERE `id` IN (SELECT `id_good` FROM `Odder` WHERE `id_cust` =' .$_SESSION['id'].')');
        $status = $db->query('SELECT * FROM `Odder` WHERE `id_cust` =' .$_SESSION['id']);
    
        while(($row = $goods->fetch_assoc()) && ($st = $status->fetch_assoc())){
           ?>
            <div class="product-card">
            <div class="badge">Hot</div>
            <div class="product-tumb">
                <img src="image/<?php echo $row['photo']; ?>" alt="">
            </div>
            <div class="product-details">
                <span style=' color: #9e9c9c;' class="product-catagory">Статус <span style='text-decoration:underline;'><?php echo $st['status'];?></span></span>
                <h4><a href=""><?php echo $row['name']; ?></a></h4>
                <p>Количество на складе: <?php echo $row['count']; ?></p>
                <div class="product-bottom-details">
                <div class="product-price"><?php echo $row['price']; ?></div>
                <div class="product-links">
                    <a href=""><i class="fa fa-heart"></i></a>
                    <a href=""><i class="fa fa-shopping-cart"></i></a>
                </div>
                </div>
            </div>
            </div>
        <?php
        }
        ?>
    </body>
</html>