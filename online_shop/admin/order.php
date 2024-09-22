<?php
session_start();

if($_SESSION['id'] == 13){
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            body {
                margin: 0;
                font-family: Roboto,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
                font-size: .8125rem;
                font-weight: 400;
                line-height: 1.5385;
                color: #333;
                text-align: left;
                background-color: #f5f5f5;
            }

            .mt-50{
                margin-top: 50px;
            }
            .mb-50{
                margin-bottom: 50px;
            }


            .bg-teal-400 { 
                background-color: #26a69a;
            }

            a{
                text-decoration: none !important;
            }


            .fa {
                    color: red;
            }
        </style>
    </head>
    <?php
    // include "db_connect.php";
    // $order = $db->query('SELECT * FROM `Odder`');
    // $k = 0;
    // while($row = $order->fetch_assoc()) {
        
    //     $good = $db->query('SELECT * FROM `goods` WHERE `id` IN (SELECT `id_good` FROM `Odder`)');
    //     if ($good->num_rows != 0) {
    //         $good_array = $good->fetch_all(MYSQLI_ASSOC);
    //     }
    //     $customer = $db->query('SELECT * FROM `Customer` WHERE `id` IN (SELECT `id_cust` FROM `Odder`)');
    //     if ($customer->num_rows != 0) {
    //         $customer_array = $customer->fetch_all(MYSQLI_ASSOC);
    //     }
    //     echo $good_array[$k]['name'];
    //     echo $customer_array[$k]['name'];
    //     echo $row['count'];
    //     echo $row['status'];
    //     $k += 1;

        
    // }
        
    ?>
    <body>
        <div class="container d-flex justify-content-center mt-50 mb-50">
            <div class="row">
               <div class="col-md-10">
                    <?php
                                        
                        include 'db_connect.php';
                        $order = $db->query('SELECT * FROM `Odder`');
                        $k = 0;
                        while($row = $order -> fetch_assoc()){
                            $good = $db->query('SELECT * FROM `goods` WHERE `id` IN (SELECT `id_good` FROM `Odder`)');
                            if ($good->num_rows != 0) {
                                $good_array = $good->fetch_all(MYSQLI_ASSOC);
                            }
                            $customer = $db->query('SELECT * FROM `Customer` WHERE `id` IN (SELECT `id_cust` FROM `Odder`)');
                            if ($customer->num_rows != 0) {
                                $customer_array = $customer->fetch_all(MYSQLI_ASSOC);
                            }
                            
                                            
                            echo '<div class="card card-body mt-3">
                            <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                <div class="mr-2 mb-3 mb-lg-0">
                                    <img src="image/'.$good_array[$k]['photo'].'" width="150" height="150" alt="">
                                </div>

                                <div class="media-body">
                                    <h6 class="media-title font-weight-semibold">
                                        <a href="#" data-abc="true">'.$good_array[$k]['name'].'</a>
                                    </h6>';

                                    


                            

                            echo '<ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">'.$customer_array[$k]['name'].'</a></li>
                                <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">'.$customer_array[$k]['surname'].'</a></li>
                            </ul>';
                                        
                            
                            echo'
                            <p class="mb-3">'.$good_array[$k]['about'].'</p>
                            <ul class="list-inline list-inline-dotted mb-0">
                                <li class="list-inline-item">All items from <a href="#" data-abc="true">Mobile point</a></li>
                                <li class="list-inline-item">Add to <a href="#" data-abc="true">wishlist</a></li>
                            </ul>
                                    
                                </div>

                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                <h3 class="mb-0 font-weight-semibold">'.$row['id'].'</h3>
                                    <div class="text-muted">'.$row['status'].'</div>
                                    <a href=change_order.php?id='.$row['id'].'><button type="button" class="btn btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i>Изменить статус</button></a> 
                                    </div>
                                </div>
                            </div>';
                            $k += 1;
                        }
                       //echo '<a href=change_order.php?id='.$row['id'].'><button type="button" class="btn btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i>Изменить статус</button></a>';
// <button type="button" class="btn btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i>Изменить статус товара</button><a href=change_order.php?id='.$row['id'].'>изменить статус товара</a>
                        echo $message;
                        ?>
            </div>
        </div>
    </body>
</html>
<?php
}else{

    header('Location: http://localhost/lab5-6/aut.php');

}
?>