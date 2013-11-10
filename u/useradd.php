<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <title>College Info</title>
        <link rel="shortcut icon" href="http://www.clker.com/cliparts/2/5/8/b/136130882740104470Black Graduation Cap.svg.thumb.png" />
</head>

<?php
$lastName = $_POST['lastName'];
$firstName = $_POST['firstName'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$host = 'localhost';
$dbname = 'college';
$user = 'dba';
$pass = 'pcs';

try {
  $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
}  catch (PDOException $e) {

   echo $e->getMessage();

}
$query = "INSERT INTO users(lastName, firstName, password, email, phone_num) VALUES('$lastName', '$firstName', '$password', '$email', '$phone')";
$insert_ct =  $DBH->exec($query);
//$DBH = NULL;

if($insert_ct == 1){
echo '<h1><br>Thank you, we have received your information!</h1>';
}
?>
