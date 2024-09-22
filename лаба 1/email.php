<?php
session_start();


$name = $_POST['user_name'];
$pass = $_POST['user_password'];
$email = $_POST['user_email'];
$user_code = $_POST['secret_code'];


$to = $email;
$subject = "Подтверждение регистрации";
$message[] = $name." подтверждаем вашу регистрацию на сайте.";
// $message[] = "Код для регистрации ".$rand_number;
$headers = "От: ferrarioffical@mail.com" ."\r\n". "Reply-To: ".$email;


    // $rand_number = rand(1000, 9999);
    $message[] = "Код для регистрации ".$_SESSION['code'];
    // $message[] = "Код для регистрации ".$rand_number;
    mail($to, $subject, implode("\r\n", $message), $headers);


?>