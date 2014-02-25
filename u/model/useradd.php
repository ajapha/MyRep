<?php
//!!updated for index!!
//include('database.php');
//include('user.php');
class addUser extends dbManage {
	protected $userName;
	protected $lastName;
	protected $firstName;
	protected $password;
	protected $passwordconf;
	protected $email;
	protected $phone;
	protected $user;
	
	function set_getUser(){
		$this->user = new user();
		$this->setUserInfo($this->user);
		$this->getUserInfo($this->user);
	}
	function setUserInfo($user) {
	  $user->setUserName($_POST['userName']);
	  $user->setLastName($_POST['lastName']);
	  $user->setFirstName($_POST['firstName']);
	  $user->setPassword($_POST['password']);
	  $user->setPasswordconf($_POST['passwordconf']);
	  $user->setEmail($_POST['email']);
	  $user->setPhone($_POST['phone']);
	}
	function getUserInfo($user) {
		$this->userName = $user->getUserName();
	    $this->lastName = $user->getLastName();
	    $this->firstName = $user->getFirstName();
	    $this->password = $user->getPassword();
	    $this->passwordconf = $user->getPasswordconf();
	    $this->email = $user->getEmail();
	    $this->phone = $user->getPhone();
	}
		
	function __construct() {
      //include("../view/header.php");
      
      try {
      	$this->set_getUser();
      	$this->dbConnect('college', 'dba', 'pcs');
        $this->usernameCheck($this->userName);
        $this->emptyCheck();
        $this->passwordCheck($this->password, $this->passwordconf);
        $this->emailCheck($this->email);
        $this->addToDB();
      } catch (Exception $e) {
	      echo "<h4 id ='error'>" . $e->getMessage() . '</h4>';
	      echo "<div>"; include_once('view/userform.php');$obj = new userForm;echo "</div>";
	      include('view/footer.php');
        }
      //include("../view/footer.php");
	}
  
    function usernameCheck($userName) {
      $params = array($userName);
  	  $this->select('userName', 'users', "userName = ?", $params);
      $row = $this->STH->fetch(PDO::FETCH_ASSOC);
      if(isset($row['userName'])) {
  		throw new Exception("That username is not available. Please choose another one.");
  	}
  }
    function emptyCheck() {
	  if (empty($_POST['userName']) || empty($_POST['lastName']) || empty($_POST['firstName']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['phone'])) {
			throw new Exception("Required information is missing please re-enter your information<br>");
	  }
    }
    function passwordCheck($password, $passwordconf) {
	  if ($password != $passwordconf) {
	    throw  new Exception("Your passwords do not match. Please try again.<br>");
	  }
    }
    function emailCheck($email) {
	  if(!strchr($email, "@") || !strchr($email, ".") || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
	    throw new Exception("The email address entered is not valid. Please try again.<br>");
	  }
    }
    function addToDB() {
  	    $values = array($this->userName, $this->lastName, $this->firstName, $this->password, $this->email, $this->phone);
    	$insert_ct = $this->insert('users', $values);
        if($insert_ct == 1){
  		    $this->sendToMail();
        } else { throw new Exception('something is wrong');
        }
    }
    function sendToMail() {
    	$c = hash('ripemd160', $this->lastName);
    	$d = hash('ripemd160', $this->phone);
    	header("Location: http://10.0.0.3/php_mysql/MyRep/u/mailT.php?email=$this->email&c=$c&d=$d");
        //www.mywebclass.org/~ajapha/mail.php?email=$this->email&c=$c&d=$d");
    	
    }
    
}

//$obj = new addUser();

?>
