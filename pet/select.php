<?php

$dbName = "employees";
$host = "localhost";
$username = "dba";
$password = "pcs";
$results =  " ";
try{
    $DBH = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
} catch(PDOException $e) {
    echo $e->getMessage();
  }
$STH = 12345;
$STH = $DBH->query('SELECT * FROM employees WHERE emp_no = 10001');
$row = $STH->fetch();  
 print_r($row); 
   echo $row;


//print_r($results);
//  }
//}
//$new = new file;


?>


