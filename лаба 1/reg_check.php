<?php
session_start();
// include "email.php";
include "db_connect.php";

$name = $_POST['user_name'];
$pass = $_POST['user_password'];
$email = $_POST['user_email'];
// $rand_number = $_POST['rand_number'];
$rand_number_user = $_POST['secret_code'];

if($_SESSION['code'] != $rand_number_user){
    echo "<script type=\"text/javascript\">".
        "alert('Код не сходится');".
        "</script>";
    echo '<script>window.location="registration.php"</script>';  
}else{
    
    $_SESSION['user_data'] = [
        "name" => $name,
        "email" => $email,
        "password" => $pass
    ];
    $_SESSION['user_name'] = $name;
    $pass = md5($pass);
    $db -> query("INSERT INTO `users`(`id`, `name`, `password`, `email`) VALUES (null,'$name','$pass','$email')");
    $sql = $db -> query("SELECT `id` FROM `users` WHERE `email` = '$email' AND `password` = '$pass'");
    $id = $sql -> fetch_assoc();
    $_SESSION['id'] = $id['id'];
    echo "<script type=\"text/javascript\">".
        "alert('Пользователь зарегестрирован');".
        "</script>";
    echo '<script>window.location="index.php"</script>';  
    
}
?>