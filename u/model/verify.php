<?php
  //include('database.php');
  //!!updated for index!!
class verify extends dbManage {

  function __construct() {
   // include('../view/header.php');
    $userName = $_POST['username'];
    $password = $_POST['password'];

    $success = $this->dbConnect('college', 'dba', 'pcs');
    $params = array("$userName", "$password", "on");
    $STH=$this->select('*', 'users',"userName= ? AND password= ? AND active = ?", $params);
    
    $row = $STH->fetch(); 
   
    if($row ==0 ){
      echo "We're sorry, we can not verify your information.  Please try again or <a href='index.php?page=userForm'>create a new account</a>.";$obj = new logInForm(); 
    } else {
        echo "<h2><br> Welcome back " .  $row['firstName'] . '!</h2><br><a href= "index.php?page=showInfoToChange">Change your information</a>'; 
        session_start();
        $_SESSION['userID'] = $row['userID'];
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['loggedIn'] = 1;      
        header("Location: index.php?page=home");
     }
    //include('../view/footer.php');
  }
}  
//$obj = new verify();



?>
