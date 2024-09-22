<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="menu.css">
    </head>

    <body>
        <?php
          include "db_connect.php";
          $category = $db->query('SELECT * FROM `Category`');
        ?>
        <div class="navbarr">
            <a href="index.php">Главная</a>
            <a href="cart1.php">Корзина</a>
            <?php
              if($_SESSION['id']){
                echo '<a href="order.php">Заказы</a>';
              }
            ?>
            <a href="reg.php">Регистрация</a>
            <?php
            if($_SESSION['name']){
            echo "<a href='logout.php'>Выйти из аккаунта</a>";
            }
            ?>
            <div class="dropdown">
              <div class="dropbtn">Каталог</div>
              <div class="dropdown-one">
                <?php
                  while(($row = $category->fetch_assoc())) {
                    
                      echo '<div id="link1"><a style="width: 170px;" class="dItem" href = "category.php?id='. $row['id'] . '">'.$row['category'].'</a>';
                      echo '<div class="dropdown-two">';
                      $brand = $db->query('SELECT * FROM `Brand` WHERE `id` IN (SELECT `id_brand` FROM `Brand_Cat` WHERE `id_cat` =' .$row['id'].')');
                      while($ct = $brand->fetch_assoc()){
                        echo '<div> <a style="text-align:center;" class="dItem" href = "category.php?id_brand='. $ct['id'] .'&id_cat='.$row['id'].'">'.$ct['brand'].'</a></div>';
                      }
      
                       echo "</div></div>";
                    }
                ?>
              </div>
            </div> 
        </div>
    </body>
</html>
