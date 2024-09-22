<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href='css/header.css'>
        <link rel="stylesheet" href='css/footer.css'>
        <link rel="stylesheet" href='css/reg_aut.css'>
    </head>
    
    <style>
        .input{
            width: 25%;
        }

        p {
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        font-weight: 100;
        line-height: 20px;
        letter-spacing: 0.5px;
        }
    </style>
<body>
    <header style="background-image: URL(https://images.drive.ru/i/0/5b06848aec05c4ce4d000070.jpg); background-repeat: no-repeat; background-size: cover; height: 400px;">
            <div class="header">
            <a href="главная страница.html" class="logo"><img src="https://www.pngarts.com/files/3/Ferrari-Logo-Download-PNG-Image.png" alt=""></a>
            <div class="header-right">
            <?php
              include "menu.php";
            ?>

            </div>
            
            </div>

            
            <div class="main-heading">
            <h1 style="font-weight: 600;"><span id="HELLO_THIS_IS_MY_FIRST_HEADER-3">Добавить автомобиль</span></h1>
            </div>
        </header>
        
        <?php
        include "db_connect.php";
        ?>
        <form action='' method='post' style="margin-left:30px;">     
            <h1 style="font-weight: 600; text-align:center;"><span>Добавление новой модели автомобиля</span></h1>                  
            <br>
            <input class="input" type="text" name='name_car' value="" placeholder="Название модели автомобиля" />
            <input class="input" type="text" name='description' value="" placeholder="Информация" />
            <input class="input" type="text" name='photo' value="" placeholder="адрес фотографии" />
            <br><br>
            <input class="input" type="text" name='engine_size' value="" placeholder="оюбъем двигателя" />
            <input class="input" type="text" name='power' value="" placeholder="мощность двигателя" />
            <input class="input" type="text" name='max_speed' value="" placeholder="максимальная скорость" />
            <br><br>
            <input class="input" type="text" name='weight' value="" placeholder="вес автомобиля" />
            <input class="input" type="text" name='fuel_consumption' value="" placeholder="Расход топлива" />
            <br><br>
            <input type='submit' value='Добавить'>
        </form>
        <?php
        if(isset($_POST['name_car']) || isset($_POST['description']) || isset($_POST['photo'])) {
            $name_car = $_POST['name_car'];
            $description = $_POST['description'];
            $photo = $_POST['photo'];
            $db -> query("INSERT INTO `Cars`(`id`, `name_car`, `description`, `photo`) VALUES (null,'$name_car','$description','$photo')");
            
            }
        if(isset($_POST['engine_size']) || isset($_POST['power']) || isset($_POST['max_speed']) || isset($_POST['weight']) || isset($_POST['fuel_consumption'])){
            $engine_size = $_POST['engine_size'];
            $power = $_POST['power'];
            $max_speed = $_POST['max_speed'];
            $weight = $_POST['weight'];
            $fuel_consumption = $_POST['fuel_consumption'];
            $db -> query("INSERT INTO `Specification`(`id`, `engine_size`, `power`, `max_speed`, `weight`, `fuel_consumption`) VALUES (null, '$engine_size','$power','$max_speed', '$weight', '$fuel_consumption')");
            $path = 'index.php';
            header('Location: '.$path);
            die();
        }
        $db->close();
        ?>
        
    <?php
        include "footer.html";
    ?>
</body>
</html>
