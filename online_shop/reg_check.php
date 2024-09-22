<?php
session_start();
include "db_connect.php";

$name = $_POST['name'];
$surname = $_POST['surname'];
$pass = $_POST['password'];
$email = $_POST['email'];


if(mb_strlen($pass) < 3){
    $_SESSION['message'] = "Пароль должен быть больше 3-х символов";
    header('Location: reg.php');
}else{
    $_SESSION['user'] = [
        "email" => $email,
        "password" => $pass
    ];
    $_SESSION['name'] = $name;
    $pass = md5($pass);
    $db -> query("INSERT INTO `Customer`(`id`, `name`, `surname`, `email`, `password`) VALUES (null, '$name','$surname','$email','$pass')");
    $sql = $db -> query("SELECT `id` FROM `Customer` WHERE `email` = '$email' AND `password` = '$pass'");
    $id = $sql -> fetch_assoc();
    $_SESSION['id'] = $id['id'];
    header('Location: index.php');
}



?>