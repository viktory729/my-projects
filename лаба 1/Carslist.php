<?php

include "db_connect.php";

$per_page = 6;
if(isset($_GET['page'])) {
    $page=$_GET['page'];
}
$start = ($page-1)*$per_page;
$cars = $db->query("SELECT * FROM `Cars` ORDER BY `id` LIMIT $start, $per_page");

        while($row = $cars->fetch_assoc()){
        ?>
            <div class="blog_post">
              <div class="container_copy">
                <img src="<?php echo $row['photo'];?>">
                <h1><?php echo $row['name_car'];?></h1>
                <p><?php echo $row['description'];?></p>
                <a class="btn_primary" href="full_cars.php?id='<?php echo $row['id']; ?>'">Купить</a>
            </div>
        </div>
            <?php
        }
          ?>
            </div>