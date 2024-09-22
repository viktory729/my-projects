<?php
session_start();
include_once "db_connect.php";

//админ пароль - 123456789, почта adminmail@gmail.com, имя - admin

$email = $_POST['user_email'];
$pass = md5($_POST['user_password']);

$query = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$pass'";
$result = mysqli_query($db, $query);
$bd_user = mysqli_fetch_assoc($result);
if(empty($email) || empty($pass)){
    echo "<script type=\"text/javascript\">".
        "alert('Поля не заполнены');".
        "</script>";
    echo '<script>window.location="authorization.php"</script>'; 
}
if(mysqli_num_rows($result) > 0){    

    $_SESSION['user_data'] = [
        "email" => $bd_user['email'],
        "password" => $bd_user['password']
    ];
    $_SESSION['name'] = $bd_user['name'];
    $_SESSION['id'] = $bd_user['id'];

    if($_SESSION['id'] == 1){
        header('Location: Cars.php');
    }else{
        echo "<script type=\"text/javascript\">".
        "alert('Пользователь авторизироован');".
        "</script>";
        echo '<script>window.location="index.php"</script>'; 
    }
    

} else{
    echo "<script type=\"text/javascript\">".
        "alert('Пользователь не найден');".
        "</script>";
    echo '<script>window.location="authorization.php"</script>'; 
}


?>