<?php
echo "why is this not printing";

$email = $_GET['email'];
$c = $_GET['c'];
$d = $_GET['d'];
echo $c . "  :  " . $d;echo 'hello';
$message = "Thank you for creating a new account on collegeinfo.com.  To activate your account, please click on the link below, then enter your username and pasoword. <br> http://10.0.0.3/php_mysql/MyRep/u/model/activate.php?c=$c&d=$d";
mail($email, 'Activating yor new collegeinfo.com account', $message);

header("Location: http:10.0.0.3/php_mysql/MyRep/u/view/emailSent.php");           
?>

