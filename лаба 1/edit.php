<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href='css/header.css'>
        <link rel="stylesheet" href='css/footer.css'>
        <link rel="stylesheet" href='css/reg_aut.css'>
    </head>
    
    <style>
        .input{
            width: 40%;
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
            <h1 style="font-weight: 600;"><span id="HELLO_THIS_IS_MY_FIRST_HEADER-3">Редактировать информацию</span></h1>
            </div>
        </header>
    <?php
        include "db_connect.php";
        $cars = $_GET["id"];
        $information = $db->query('SELECT * FROM `Cars` WHERE `id`='.$cars.'');
        $specification = $db->query('SELECT * FROM `Specification` WHERE `id`='.$cars.'');
        if ($information->num_rows != 0) {
            $information_array = $information->fetch_all(MYSQLI_ASSOC);
        }
        if ($specification->num_rows != 0) {
            $specification_array = $specification->fetch_all(MYSQLI_ASSOC);
        }

    ?>
    <!--В inpute DESCRIPTION необоходимо увеличить поле ввода, чтобы описание было полностью видно. Всё остальное на твое усмотрение. И ещё надо сделать к каждому полю надпись сбоку,
    что за что отвечает.-->
        <form action="" method="POST" style="margin-left:20px">
        <h1>Изменение информации о машине</h1>
        <p><input class="input" type='text' name='name_car' value="<?php echo $information_array[0]['name_car']; ?>"/> Название машины</p>
        <p><input class="input" type='text' name='description' value="<?php echo $information_array[0]['description']; ?>"/> Описание</p>
        <p><input class="input" type='text' name='photo' value="<?php echo $information_array[0]['photo']; ?>"/> Адрес фото</p>
        <h1>Изменение характеристик машины</h1>
        <p><input class="input" type='text' name='engine_size' value="<?php echo $specification_array[0]['engine_size']; ?>"/> Объем двигателя</p>
        <p><input class="input" type='text' name='power' value="<?php echo $specification_array[0]['power']; ?>"/> Мощность двигателя</p>
        <p><input class="input" type='text' name='max_speed' value="<?php echo $specification_array[0]['max_speed']; ?>"/> Максимальная скорость</p>
        <p><input class="input" type='text' name='weight' value="<?php echo $specification_array[0]['weight']; ?>"/> Вес автомобиля</p>
        <p><input class="input" type='text' name='fuel_consumption' value="<?php echo $specification_array[0]['fuel_consumption']; ?>"/> Расход топлива</p>
        <input type="submit" value="Сохранить изменение">
        </form>



    <?php
        if(isset($_POST['name_car']) || isset($_POST['description']) || isset($_POST['photo'])) {
        //из данных собираем соответствующие переменные
            $name_car = $_POST['name_car'];
            $description = $_POST['description'];
            $photo = $_POST['photo'];
            
            $db->query("UPDATE `Cars` SET `name_car`='$name_car', `description`='$description', `photo`='$photo' WHERE `id` =".$cars."");
            
            }
        if(isset($_POST['engine_size']) || isset($_POST['power']) || isset($_POST['max_speed']) || isset($_POST['weight']) || isset($_POST['fuel_consumption'])){
            $engine_size = $_POST['engine_size'];
            $power = $_POST['power'];
            $max_speed = $_POST['max_speed'];
            $weight = $_POST['weight'];
            $fuel_consumption = $_POST['fuel_consumption'];
            $db->query("UPDATE `Specification` SET `engine_size`='$engine_size', `power`='$power', `max_speed`='$max_speed', `weight`='$weight', `fuel_consumption`='$fuel_consumption' WHERE `id` =".$cars."");
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