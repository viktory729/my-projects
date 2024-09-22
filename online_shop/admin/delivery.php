<?php
include "db_connect.php";
$delivery = $_GET["id"];
$brand = $db->query('SELECT brand FROM `Brand` WHERE `id`='.$delivery.'');
while($row = $brand->fetch_assoc()){
    echo $row['brand'];
}

?>
<form action="" method="POST">
<p>Сколько товаров этого бренда нужно поставить?</p>
</p><input type='text' name='count' value=0></p>
<input type="submit" value="Сохранить изменение">
</form>

<a href="index.php">Вернуться</a>

<?php
if(isset($_POST['count'])) {
//из данных собираем соответствующие переменные
    $count = $_POST['count'];
    $db->query("UPDATE `goods` SET `count`= `count` + '$count' WHERE `id_brand`=".$delivery."");
    $path = 'index.php';
    header('Location: '.$path);
    die();
    }

$db->close();


?>