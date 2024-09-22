<?php   
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "test");  
 include 'db_connect.php';
//---------------НЕ АВТОРИЗИРОВАННЫЙ ПОЛЬЗОВАТЕЛЬ---------------------
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["sshopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["sshopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';    
                }  
           }  
      } 
 } 

 if(isset($_GET["action"]))  
{  
    if($_GET["action"] == "add")  
    {  

     if(isset($_SESSION["sshopping_cart"]))  
     {  
          $item_array_id = array_column($_SESSION["sshopping_cart"], "item_id");  
          if(!in_array($_GET["id"], $item_array_id))  
          {  
               $count = count($_SESSION["sshopping_cart"]);  
               $item_array = array(  
                    'item_id'               =>     $_GET["id"], 
                    'item_quantity'               =>     1  
               );  
               $_SESSION["sshopping_cart"][$count] = $item_array;  
          }  
          else  
          {  
               echo '<script>alert("Item Already Added")</script>';  
               echo '<script>window.location="index.php"</script>';  
          }  
     }  
     else  
     {  
          $item_array = array(  
               'item_id'               =>     $_GET["id"],
               'item_quantity'               =>     1   
          );  
          $_SESSION["sshopping_cart"][0] = $item_array;  
     } 
    } 
}  

if(isset($_GET["action"]))  
{  
     if($_GET["action"] == "checkout")  
     {  
          if(isset($_SESSION["sshopping_cart"]) && isset($_SESSION['user']))  
          {  
               $error = '0';
               foreach($_SESSION["sshopping_cart"] as $keys => $values)  
               {    
                    $id_good = $values['item_id'];     
                    $id_user = $_SESSION['id'];
                    $quantity = $values['item_quantity'];
                    $status = 'Новый';
                    $col = $db->query("SELECT `count` FROM `goods` WHERE `id` = ".$id_good);
                    $col1 = $col->fetch_all(MYSQLI_ASSOC);
                    if($col1[0]['count'] <= 0){
                         global $error;
                         $error = 1;
                         echo '<script>alert("Недостаточно товара")</script>';
                         break;   
                    }
                    else{
                    $db -> query("INSERT INTO `Odder`(`id`, `id_good`, `id_cust`, `count`, `status`) VALUES (null,'$id_good','$id_user','$quantity','$status')");
                    $db -> query("UPDATE `goods` SET `count` = `count` - '$quantity' ");
                    unset($_SESSION["sshopping_cart"][$keys]);  
                    }
               }
               if($error = 0){
               echo '<script>alert("Заказ оформлен")</script>'; 
               }  
          } else{
               echo '<script>alert("Зарегистрируйтесь")</script>';  
          }
     }
}

 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <style>
               body{
                    font-family: 'Roboto', sans-serif;
               }
           </style>
      </head>  
      <body>
                <?php  
                include 'db_connect.php';
                include "menu.php";
                $query = "SELECT * FROM `goods` ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                ?>
                
                <div style="clear:both"></div>  
                <br />  
                <h3>Корзина товаров</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Имя товара</th>  
                               <th width="10%">Количество</th>  
                               <th width="20%">Цена</th>  
                               <th width="20%">Действие</th>
                          </tr>  
                          <?php 
                            $total = 0; 
                          if(!empty($_SESSION["sshopping_cart"]))  
                          {  
                              foreach($_SESSION["sshopping_cart"] as $keys => $values)  
                              { 
                                   $good = $db->query('SELECT * FROM `goods` WHERE `id` = '.$values['item_id']); 
                                   //$sql = $db->query("INSERT INTO `Odder`(`id`, `id_good`, `id_cust`, `count`, `status`) VALUES (null,\'1\',\'1\',\'1\',\'aergz\')");
                                   while($row = $good->fetch_assoc()){ 
                          ?>  
                          <tr>
                              
                              <td><?php echo $row["name"]; ?></td>
                              <td><input class='iquantity' type='number' value='<?php echo $values["item_quantity"]; ?>' min='1' max='10'></td>    
                              <td><?php echo "$".$row["price"]; ?><input type='hidden' class='iprice' value='<?php $row["price"];?>'></td> 
                              <td><a href="cart1.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Удалить из корзины</span></a></td>                    
                               <?php  $total += ($row["price"]); 
                              //  $col = $db->query("SELECT `count` FROM `goods` WHERE `id` = ".$values['item_id']);
                              //  $col1 = $col->fetch_all((MYSQLI_ASSOC));
                              //  echo $col1[0]['count'];
                              ?>
                          </tr>    
                                  <?php  
                               }  
                              
                              }
                              
                              echo' <tr>
                              <td colspan="3" text-align="right">Total</td>
                               <td text-align="right">'.$total.'</td>
                               </tr>';
                              }  
                          ?>  
                          <a href='cart1.php?action=checkout'>Оформить заказ</a>
                     </table>  
                     
                </div>  
           </div>  
           <br/>  
      </body>  
 </html>
   