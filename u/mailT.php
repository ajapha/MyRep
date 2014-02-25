<?php
$email = $_GET['email'];
$c = $_GET['c'];
$d = $_GET['d'];
$message = "Thank you for creating a new account on collegeinfo.com.\r\n  To activate your account, please click on the link below,\r\n then enter your username and password. <br> http://10.0.0.3/php_mysql/MyRep/u/model/activate.php?c=$c&d=$d";
$test = mail($email, 'Activating yor new collegeinfo.com account', $message);
echo "<br>" . $test;
echo "<br>" . $message . ":" . $email;
header("Location: http://10.0.0.3/php_mysql/MyRep/u/index.php?page=emailSent");           

?>

