<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="product_card.css">
    </head>

    <body>
        <?php
          include "db_connect.php";
          include "menu.php";
          $category = $db->query('SELECT * FROM `Category`');
        ?>
        <br>
        <?php
        
        if($_SESSION['name']){
          echo "<h1 style='text-align: center;'>Здравствуйте ".$_SESSION['name']."</h1>";
          
        }
        echo "<h2>Товары</h2>";
        $good = $db->query('SELECT * from `goods`');
          while($row = $good->fetch_assoc()){
                ?>
                  <div  class="product-card">
                  <div class="badge">Hot</div>
                  <div class="product-tumb">
                    <img src="image/<?php echo $row['photo'];?>" alt="">
                  </div>
                  <div class="product-details">
                    <span class="product-catagory">Категория</span>
                    <h4><a href=""><?php echo $row['name'];?></a></h4>
                    <p>Количество на складе: <?php echo $row['count'];?></p>
                    <div class="product-bottom-details">
                      <div class="product-price"><?php echo $row['price'];?> ₽</div>
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