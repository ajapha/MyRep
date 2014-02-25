<?php
class welcomePage {
  function __construct() {
    //include("view/header.php");
      echo '
        <h1>Welcome to collegeinfo.com</h1>
        <h2>Your source for comparing colleges</h2>
        <h3>Please <a href = "index.php?page=logInForm">log in</a> <br> or <a href = "index.php?page=userForm">create a new account.</a>';
        include("view/footer.php"); 
  }  
/*function insert() {
	try {
	$DBH = new PDO("mysql:host=localhost;dbname=college", 'dba', 'pcs');
      $STH = $DBH->query('show columns from users');
      $info = $STH->fetchAll(PDO::FETCH_COLUMN);
      array_shift($info);
      $columns = implode(',', $info);echo $columns;  
      
      //print_r($info);
} catch (PDOException $e) {
	echo $e->getMessage() . ':' . $e->getCode();
}

}*/
}
//$obj= new welcomePage();
//$obj-> get();
//$obj->insert();
?>