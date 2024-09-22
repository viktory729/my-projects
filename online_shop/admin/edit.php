<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDIT</title>
</head>
<body >
<?php
include "db_connect.php";

$category = $db->query("SELECT * FROM `category`");
if ($category->num_rows != 0) {
    $category_array = $category->fetch_all(MYSQLI_ASSOC);
}
?>

<form action="" method="POST">
<p>Изменение категорий</p>
<p><input type='text' name='category1' value="<?php echo $category_array[0]['category']; ?>"/></p>
<p><input type='text' name='category2' value="<?php echo $category_array[1]['category']; ?>"/></p>
<p><input type='text' name='category3' value="<?php echo $category_array[2]['category']; ?>"/></p>
<input type="submit" value="Сохранить изменение">
</form>

<a href="index.php">Вернуться</a>

<?php
if(isset($_POST['category1']) || isset($_POST['category2']) || isset($_POST['category3'])) {
//из данных собираем соответствующие переменные
    $category1 = $_POST['category1'];
    $category2 = $_POST['category2'];
    $category3 = $_POST['category3'];
    $db->query("UPDATE `Category` SET `category`='$category1' WHERE `id` = 1");
    $db->query("UPDATE `Category` SET `category`='$category2' WHERE `id` = 2");
    $db->query("UPDATE `Category` SET `category`='$category3' WHERE `id` = 3");
    $path = 'index.php';
    header('Location: '.$path);
    die();
    }

$db->close();
?>
</body>
</html>