<?php
session_start();
//if($_SESSION['id'] == 13){
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
          $category = $db->query('SELECT * FROM `Category`');
        ?>
        <div class="navbar">
            <a href="#home">Главная</a>
            <div class="dropdown">
              <div class="dropbtn">Каталог</div>
              <div class="dropdown-one">
                <?php
                  while(($row = $category->fetch_assoc())) {
                    
                      echo '<div id="link1"><a style="width: 170px;" class="dItem" href = "category.php?id='.$row['id'].'">'.$row['category'].'</a>';
                      echo '<div class="dropdown-two">';
                      $brand = $db->query('SELECT * FROM `Brand` WHERE `id` IN (SELECT `id_brand` FROM `Brand_Cat` WHERE `id_cat` =' .$row['id'].')');
                      while($ct = $brand->fetch_assoc()){
                        echo '<div><a style="text-align:center;" class="dItem" href="category.php?id_brand='.$ct['id'].'&id_cat='.$row['id'].'">'.$ct['brand'].'</div></a>';
                      }
                      echo "</div></div>";
                      }
                      
                ?>
              
                <div id="link1"><a style="width: 170px;" class="dItem" href = "edit.php">изменить</a></div>
              </div>
            </div> 
            <div class="dropdown">
              <div class="dropbtn">Поставки</div>
              <div class="dropdown-one">
                <?php
                      $brand1 = $db->query('SELECT * FROM `Brand`');
                      while($ct1 = $brand1->fetch_assoc()){ 
                        echo '<div id="link1"><a style="width: 170px; color="balck";" class="dItem" href = "delivery.php?id='.$ct1['id'].'">'.$ct1['brand'].'</a></div>';
                      }
                ?>
              </div>
              </div>
            <a href="order.php">Заказы клиентов</a>
        </div>
          <br>
        <?php
        
        echo "<h2>Все товары</h2>";
       
          
          $good = $db->query('SELECT * from `goods`');
          while($row = $good->fetch_assoc()){
                  echo '
                  <div  class="product-card">
                  <div class="badge">Hot</div>
                  <div class="product-tumb">
                    <img src="image/'.$row['photo'].'" alt="">
                  </div>
                  <div class="product-details">
                    <span class="product-catagory">Категория</span>
                    <h4><a href="">'.$row['name'].'</a></h4>
                    <p>Количество на складе: '.$row['count'].'</p>
                    <div class="product-bottom-details">
                      <div class="product-price"><small></small>'.$row['price'].'</div>
                      <div class="product-links">
                        <a href=""><i class="fa fa-heart"></i></a>
                        <a href=""><i class="fa fa-shopping-cart"></i></a>
                      </div>
                    </div>
                  </div>
                </div>';


                }
         
        ?>
    </body>
</html>
<?php
// }else{
//   header('Location: http://localhost/lab5-6/aut.php');
// }
?>