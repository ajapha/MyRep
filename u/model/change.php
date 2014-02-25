<?php

//include("../model/useradd.php");
//!!updated for index!!

class changeInfo extends addUser {
	function __construct() {
		//include("../view/header.php");
		 if(!isset($_SESSION)) session_start();
		
		 try{
		     foreach($_POST as $k=>$v) {
               if(!empty($v)) {
                 $this->dbConnect('college', 'dba', 'pcs');
                 if(!empty($_POST['email']))  $this->emailCheck($_POST['email']);
                 if(!empty($_POST['userName']))  $this->usernameCheck($_POST['userName']);
                 $this->checkPasswordConfSet();
                 if(!empty($_POST['password']))  $this->passwordCheck($_POST['password'], $_POST['passwordconf']);
                 $success =  $this->update('users', $k, "$v", "userID = $_SESSION[userID]");
                 if($success==1) header("Location:index.php?page=infoChanged");echo $success;
               }
             }
         }
              catch (Exception $e) {
	             echo "<h4 id ='error'>" . $e->getMessage() . '</h4>';
	             echo "<div>"; include_once('view/changeInfo.php');$obj = new showInfoToChange;echo "</div>";
	            include('view/footer.php');
              }  
           
       // include('../view/footer.php');
    }
    
  function checkPasswordConfSet(){
	if((!empty($_POST['password']) && empty($_POST['passwordconf']))  || (empty($_POST['password']) && !empty($_POST['passwordconf']))) {
		throw new Exception("To change your password, please set both the password and password conformation"); 
    }
  }
}
//$obj = new changeInfo();

?>
