<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <title>College Info</title>
        <link rel="shortcut icon" href="http://www.clker.com/cliparts/2/5/8/b/136130882740104470Black Graduation Cap.svg.thumb.png" />
</head>

<?php

$email = $_POST['email'];
$password = $_POST['password'];

$dbName = "college";
$host = "localhost";
$username = "dba";
$pass = "pcs";
$STH = ' ';
try{
    $DBH = new PDO("mysql:host=$host;dbname=$dbName", $username, $pass);
} catch(PDOException $e) {
    echo $e->getMessage();
  }
$STH = $DBH->query("SELECT * FROM users WHERE email = '$email' AND password = $password");
$row = $STH->fetch();
if($row == 0 ){
  echo "We're sorry, we can not verify your information.  Please <a href='logIn.php'>try again</a> or <a href='userform.php'>create a new account</a>.";
} else {
echo "<br> Welcome back " .  $row['firstName'] . '!'; 
}

?>
