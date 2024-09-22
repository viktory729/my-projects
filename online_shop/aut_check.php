<?php
session_start();
include_once "db_connect.php";

$email = $_POST['email'];
$pass = md5($_POST['password']);

//$check_user = mysqli_query($db, "SELECT * FROM `registration` WHERE `email` = '$email' AND `password` = '$pass'");
$query = "SELECT * FROM `Customer` WHERE `email` = '$email' AND `password` = '$pass'";
$result = mysqli_query($db, $query);
$bd_user = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) > 0){

    //$user = mysqli_fetch_assoc($check_user);
    

    $_SESSION['user'] = [
        "email" => $bd_user['email'],
        "password" => $bd_user['password']
    ];
    $_SESSION['name'] = $bd_user['name'];
    $_SESSION['id'] = $bd_user['id'];

    if($_SESSION['id'] == 13){
        header('Location: admin/index.php');
    }else{
        header('Location: index.php');
    }
    

} else{
    $_SESSION['message'] = "Пароли не совпадают";
    header('Location: aut.php');
}


?>