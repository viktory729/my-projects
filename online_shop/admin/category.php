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

    <body>
        <div class="container d-flex justify-content-center mt-50 mb-50">
            <div class="row">
               <div class="col-md-10">

                                    <?php
                                        
                                        include 'db_connect.php';
                                        if($_GET['id']){
                                            $cat = $_GET["id"]; 
                                            $goods = $db->query('SELECT * FROM `goods` WHERE `id_cat` = '.$cat);
                                        } else{
                                            $cat = $_GET["id"]; 
                                            $brand = $_GET['id_brand'];
                                            $brand_cat = $_GET["id_cat"];
                                            
                                            $goods = $db->query('SELECT * FROM `goods` WHERE `id_brand` = '.$brand.' AND `id_cat` = '.$brand_cat);
                                        }

                                        
                                        while($row = $goods -> fetch_assoc()){
                                            $brand1 = $db->query('SELECT `brand` FROM `Brand` WHERE `id` IN (SELECT `id_brand` FROM `Brand_Cat` WHERE `id_brand` =' .$row['id_brand'].')');
                                            $cat1 = $db->query('SELECT `category` FROM `Category` WHERE `id` IN (SELECT `id_cat` FROM `Brand_Cat` WHERE `id_cat` =' .$row['id_cat'].')');
                                           
                                        echo '<div class="card card-body mt-3">
                                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                        <div class="mr-2 mb-3 mb-lg-0">
                                        
                                        <a href = "full_good.php?id='.$row['id'].'"><img src="image/'.$row['photo'].'" width="150" height="150" alt=""></a>
                                   
                                </div>

                                <div class="media-body">
                                    <h6 class="media-title font-weight-semibold">
                                        <a href="#" data-abc="true">'.$row['name'].'</a>
                                    </h6>';

                                    


                                    while($ct1 = $brand1->fetch_assoc()){
                                        $ct2 = $cat1->fetch_assoc();

                                        echo '<ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                        <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">'.$ct2['category'].'</a></li>
                                        <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">'.$ct1['brand'].'</a></li>
                                    </ul>';
                                        
                                      }
                                      echo'
                                      <p class="mb-3">'.$row['about'].'</p>
                                      <ul class="list-inline list-inline-dotted mb-0">
                                        <li class="list-inline-item">All items from <a href="#" data-abc="true">Mobile point</a></li>
                                        <li class="list-inline-item">Add to <a href="#" data-abc="true">wishlist</a></li>
                                    </ul>
                                    
                                </div>

                                <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                    <h3 class="mb-0 font-weight-semibold">'.$row['price'].'</h3>

                                    <div>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>

                                    </div>

                                    <div class="text-muted">1985 reviews</div>

                                    <button type="button" class="btn btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i> Add to cart</button>
                                </div>
                            </div>
                        </div>';
                                        }

                        echo $message;
                        ?>
            </div>
        </div>
    </body>
</html>
