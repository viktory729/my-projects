

<!DOCTYPE html>
<html>
    <body>
    <?php
    include "db_connect.php";
    $status = $_GET["id"];
    $order = $db->query('SELECT `status` FROM `odder` WHERE `id`='.$status.'');
    if ($order->num_rows != 0) {
        $order_array = $order->fetch_all(MYSQLI_ASSOC);
    }

    if($order_array[0]['status'] == 'Новый'){
    echo '<form action="" method="POST">
            <p>Этот товар прошел проверку? Можно оформлять?</p>
            <input type="submit" name="status" value="Оформлено">
            <p>Этот товар не прошел проверку? Если нет указате причину и отмените заказ</p>
            </p><input type="text" name="count" value=></p>
            <input type="submit" name="status" value="Отменено">
        </form>';
    }

    echo "<a href='index.php'>Вернуться</a>";
    if($order_array[0]['status'] == 'Оформлено'){
        echo '<form action="" method="POST">
            <p>Этот товар пришел на точку выдачи можно уведомить клиента</p>
            <input type="submit" name="status" value="Доставленно">
            <p>С товаром произошли проблемы. Указате причину и отмените заказ</p>
            </p><input type="text" name="count" value=></p>
            <input type="submit" name="status" value="Отменено">
        </form>';
    }
    ?>
    </body>
</html>


<?php
if(isset($_POST['status'])) {
//из данных собираем соответствующие переменные
    $stas = $_POST['status'];
    $db->query("UPDATE `Odder` SET `status`= '$stas' WHERE `id`=".$status."");
    $path = 'order.php';
    header('Location: '.$path);
    die();
    }

$db->close();


?>